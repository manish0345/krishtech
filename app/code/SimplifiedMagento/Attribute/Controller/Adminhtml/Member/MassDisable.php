<?php


namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;

class MassDisable extends Action
{
    protected $filter;
    protected $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        Filter $filter,
        Action\Context $context)
    {
        $this->collectionFactory = $collectionFactory;
        $this->filter = $filter;

        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());

        foreach ($collection as $item) {
            $item->setStatus(false);
            $item->save();
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 record(s) have been disabled.', $collection->getSize())
        );

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}