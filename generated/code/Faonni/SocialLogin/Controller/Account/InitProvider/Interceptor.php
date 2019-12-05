<?php
namespace Faonni\SocialLogin\Controller\Account\InitProvider;

/**
 * Interceptor class for @see \Faonni\SocialLogin\Controller\Account\InitProvider
 */
class Interceptor extends \Faonni\SocialLogin\Controller\Account\InitProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Faonni\SocialLogin\Helper\Data $helper, \Faonni\SocialLogin\Model\ProviderFactory $providerFactory, \Magento\Framework\DataObjectFactory $dataObjectFactory, \Magento\Customer\Model\Session $customerSession, \Magento\Framework\Math\Random $mathRandom, \Psr\Log\LoggerInterface $logger, \Magento\Framework\Url\DecoderInterface $urlDecoder, \Magento\Framework\Url\HostChecker $hostChecker)
    {
        $this->___init();
        parent::__construct($context, $helper, $providerFactory, $dataObjectFactory, $customerSession, $mathRandom, $logger, $urlDecoder, $hostChecker);
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
