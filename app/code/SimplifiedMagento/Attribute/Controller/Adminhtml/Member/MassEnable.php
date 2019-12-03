<?php


namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;

class MassEnable extends Action implements HttpPostActionInterface
{

    protected $filter;
    protected $collectionFactory;
    protected $model;

    public function __construct(
        Filter $filter,
        CollectionFactory $collectionFactory,
        Action\Context $context)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->collectionFactory->create();
        $collection = $this->filter->getCollection($collection);

        foreach ($collection as $item) {
            $item->setStatus(true);
            $item->save();
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 record(s) have been enabled.', $collection->getSize())
        );

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}