<?php
namespace SimplifiedMagento\HelloWorld\Controller\Custom\AddToCart;

/**
 * Interceptor class for @see \SimplifiedMagento\HelloWorld\Controller\Custom\AddToCart
 */
class Interceptor extends \SimplifiedMagento\HelloWorld\Controller\Custom\AddToCart implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Controller\Result\JsonFactory $jsonFactory, \Magento\Framework\Data\Form\FormKey $formKey, \Magento\Checkout\Model\Cart $cart, \Magento\Catalog\Model\Product $product, \Magento\Framework\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($jsonFactory, $formKey, $cart, $product, $context);
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
