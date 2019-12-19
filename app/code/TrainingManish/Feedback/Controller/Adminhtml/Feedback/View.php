<?php


namespace TrainingManish\Feedback\Controller\Adminhtml\Feedback;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class View extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;

    public function __construct(\Magento\Framework\View\Result\PageFactory $pageFactory, Action\Context $context)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
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
        return $this->pageFactory->create();
    }
}