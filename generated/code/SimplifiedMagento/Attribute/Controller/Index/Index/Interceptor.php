<?php
namespace SimplifiedMagento\Attribute\Controller\Index\Index;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Index\Index
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Index\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Framework\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($scopeConfig, $context);
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
