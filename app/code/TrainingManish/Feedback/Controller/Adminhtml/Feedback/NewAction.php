<?php


namespace TrainingManish\Feedback\Controller\Adminhtml\Feedback;


use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\ResponseInterface;

class NewAction extends Action
{
    /**
     * @var ForwardFactory
     */
    protected $forwardFactory;

    public function __construct(ForwardFactory $forwardFactory, Action\Context $context)
    {
        parent::__construct($context);
        $this->forwardFactory = $forwardFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('TrainingManish_Feedback::parent');
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
        $resultForward = $this->forwardFactory->create();
        return $resultForward->forward('edit');
    }
}