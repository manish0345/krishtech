<?php
namespace SimplifiedMagento\HelloWorld\Controller\Custom\Index;

/**
 * Interceptor class for @see \SimplifiedMagento\HelloWorld\Controller\Custom\Index
 */
class Interceptor extends \SimplifiedMagento\HelloWorld\Controller\Custom\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\View\Result\PageFactory $pageFactory, \Magento\Framework\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($pageFactory, $context);
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
