<?php


namespace TrainingManish\LoginPopup\Block\Form;


use Magento\Customer\Model\Registration;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Http\Context;
use Magento\Framework\View\Element\Template;

class Login extends Template
{
    protected $customerSession;
    protected $httpContext;
    protected $registration;

    public function __construct(
        Template\Context $context,
        Session $customerSession,
        Context $httpContext,
        Registration $registration,
        array $data = [])
    {
        $this->customerSession = $customerSession;
        $this->httpContext = $httpContext;
        $this->registration = $registration;

        parent::__construct($context, $data);
    }

    /**
     * Return registration
     *
     * @return \Magento\Customer\Model\Registration
     */
    public function getRegistration()
    {
        return $this->registration;
    }
    /**
     * Retrieve form posting url
     *
     * @return string
     */
    public function getPostActionUrl()
    {
        return $this->getUrl('customer/ajax/login');
    }
    /**
     * Check if autocomplete is disabled on storefront
     *
     * @return bool
     */
    public function isAutocompleteDisabled()
    {
        return (bool)!$this->_scopeConfig->getValue(
            \Magento\Customer\Model\Form::XML_PATH_ENABLE_AUTOCOMPLETE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Checking customer login status
     *
     * @return bool
     */
    public function customerIsAlreadyLoggedIn()
    {
        return (bool)$this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
    }
    /**
     * Retrieve registering URL
     *
     * @return string
     */
    public function getCustomerRegistrationUrl()
    {
        return $this->getUrl('customer/account/create');
    }
}