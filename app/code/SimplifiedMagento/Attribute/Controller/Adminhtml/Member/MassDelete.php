<?php


namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;

class MassDelete extends Action
{
    protected $filter;
    protected $collectionFactory;
    protected $resultRedirectFactory;

    public function __construct(
        Filter $filter,
        RedirectFactory $redirectFactory,
        CollectionFactory $collectionFactory,
        Action\Context $context)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirectFactory = $redirectFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->collectionFactory->create();
        $collection = $this->filter->getCollection($collection);

        $size = $collection->getSize();

        foreach ($collection as $item) {
            $item->delete();
        }

        $this->messageManager->addSuccessMessage(__('A total of '.$size.' have been deleted successfully.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index');
    }
}