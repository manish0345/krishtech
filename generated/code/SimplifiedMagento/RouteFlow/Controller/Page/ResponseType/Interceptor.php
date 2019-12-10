<?php
namespace SimplifiedMagento\RouteFlow\Controller\Page\ResponseType;

/**
 * Interceptor class for @see \SimplifiedMagento\RouteFlow\Controller\Page\ResponseType
 */
class Interceptor extends \SimplifiedMagento\RouteFlow\Controller\Page\ResponseType implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory, \Magento\Framework\Controller\Result\JsonFactory $jsonFactory, \Magento\Framework\Controller\Result\Raw $raw, \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory, \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory)
    {
        $this->___init();
        parent::__construct($context, $pageFactory, $jsonFactory, $raw, $forwardFactory, $redirectFactory);
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
