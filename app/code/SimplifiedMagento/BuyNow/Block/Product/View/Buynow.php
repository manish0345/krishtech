<?php


namespace SimplifiedMagento\BuyNow\Block\Product\View;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class Buynow extends Template
{
    private $scopeConfig;
    protected $_registry;

    public function __construct(
        Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = [],
        ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        $this->_registry = $registry;

        parent::__construct($context, $data);
    }

    public function getProductType()
    {
        return $this->scopeConfig->getValue('FirstCart/FirstCartGroup/ProductTypeField');
    }

    public function getCurrentProduct()
    {
        $product = $this->_registry->registry('current_product');
        return $product;
    }
}