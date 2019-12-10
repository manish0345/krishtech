<?php
namespace Faonni\SocialLogin\Controller\Account\Oauth;

/**
 * Interceptor class for @see \Faonni\SocialLogin\Controller\Account\Oauth
 */
class Interceptor extends \Faonni\SocialLogin\Controller\Account\Oauth implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Faonni\SocialLogin\Helper\Data $helper, \Faonni\SocialLogin\Model\ProviderFactory $providerFactory, \Magento\Framework\DataObjectFactory $dataObjectFactory, \Magento\Customer\Model\Session $customerSession, \Magento\Framework\Math\Random $mathRandom, \Psr\Log\LoggerInterface $logger)
    {
        $this->___init();
        parent::__construct($context, $helper, $providerFactory, $dataObjectFactory, $customerSession, $mathRandom, $logger);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
