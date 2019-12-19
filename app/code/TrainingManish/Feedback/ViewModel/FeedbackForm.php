<?php


namespace TrainingManish\Feedback\ViewModel;


use Magento\Customer\Model\SessionFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class FeedbackForm implements ArgumentInterface
{
    protected $scopeConfig;
    protected $customerSession;

    public function __construct(ScopeConfigInterface $scopeConfig, SessionFactory $sessionFactory)
    {
        $this->scopeConfig = $scopeConfig;
        $this->customerSession = $sessionFactory;
    }

    public function getFormPermission() {
        $customer = $this->customerSession->create();

        $isEnabled = $this->scopeConfig->getValue('customer/feedback_group/guest_enabled');
        if($isEnabled == '1' && $customer->isLoggedIn()) {
            return true;
        }

        return false;
    }
}