<?php


namespace TrainingManish\CustomerAttribute\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class NickNameFiled extends Template
{
    protected $scopeConfig;

    public function __construct(Template\Context $context, array $data = [], ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getFieldValue() {
        return $this->scopeConfig->getValue('customer/custom_group/is_enabled');
    }
}