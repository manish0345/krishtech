<?php


namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMember;

class SaveAction extends Action
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
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if($data) {
            $member = $this->getRequest()->getParam('member');
            if(array_key_exists('entity_id', $member)) {
                $id = $member['entity_id'];
                $model = $this->model->load($id);
            }

            $model = $this->model->setData($data['member']);
        }

        try {
            $model->save();
            $this->messageManager->addSuccessMessage(__('Affiliate Member Saved Successfully.'));
            $this->_getSession()->setFormData(false);
            if($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
            }
            return $resultRedirect->setPath('*/*/index');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/index');
    }
}