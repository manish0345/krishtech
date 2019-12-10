<?php


namespace TrainingManish\HeaderBlock\Block;


use Magento\Framework\View\Element\Template;

class StaticBlock extends Template
{
    protected $_customerSession;

    public function __construct(
        \Magento\Customer\Model\SessionFactory $customerSession,
        Template\Context $context, array $data = [])
    {
        $this->_customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function headerStaticBlock() {
        $customerData = $this->_customerSession->create();
        if($customerData->isLoggedIn()) {
            return $this->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId('header_content_after_login')->toHtml();
        } else {
            return $this->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId('header_content_before_login')->toHtml();
        }
    }
}