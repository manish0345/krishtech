<?php


namespace TrainingManish\CustomerAttribute\ViewModel;


use Magento\Customer\Model\SessionFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ViewNickName implements ArgumentInterface
{
    protected $scopeConfig;
    protected $_customerSession;

    public function __construct(ScopeConfigInterface $scopeConfig, SessionFactory $sessionFactory)
    {
        $this->scopeConfig = $scopeConfig;
        $this->_customerSession = $sessionFactory;
    }

    public function CustomNickName() {
        $isEnabled = $this->scopeConfig->getValue('customer/custom_group/is_enabled');
        if($isEnabled == '1') {
            $customerData = $this->_customerSession->create();
            return $customerData->getCustomer()->getNickName();
        }
    }
}