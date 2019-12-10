<?php
namespace SimplifiedMagento\ContactUs\Controller\Index\Submit;

/**
 * Interceptor class for @see \SimplifiedMagento\ContactUs\Controller\Index\Submit
 */
class Interceptor extends \SimplifiedMagento\ContactUs\Controller\Index\Submit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\Escaper $escaper)
    {
        $this->___init();
        parent::__construct($context, $transportBuilder, $inlineTranslation, $scopeConfig, $storeManager, $escaper);
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
