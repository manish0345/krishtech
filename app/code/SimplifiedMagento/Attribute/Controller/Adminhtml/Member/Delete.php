<?php


namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMember;

class Delete extends Action
{
    protected $resultRedirectFactory;
    private $pageFactory;
    protected $model;

    public function __construct(
        RedirectFactory $redirectFactory,
        PageFactory $pageFactory,
        AffiliateMember $affiliateMember,
        Action\Context $context)
    {
        $this->model = $affiliateMember;
        $this->pageFactory = $pageFactory;
        $this->resultRedirectFactory = $redirectFactory;

        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('SimplifiedMagento_Attribute::parent');
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        if($id) {
            $model = $this->model;
            $model->load($id);
            try {
                $model->delete();
                $this->messageManager->addSuccessMessage(__('Affiliate Member Deleted.'));
                return $resultRedirect->setPath('*/*/index');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__($e->getMessage()));
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
    }

}