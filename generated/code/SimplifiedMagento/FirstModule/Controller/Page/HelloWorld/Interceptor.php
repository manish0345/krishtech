<?php
namespace SimplifiedMagento\FirstModule\Controller\Page\HelloWorld;

/**
 * Interceptor class for @see \SimplifiedMagento\FirstModule\Controller\Page\HelloWorld
 */
class Interceptor extends \SimplifiedMagento\FirstModule\Controller\Page\HelloWorld implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \SimplifiedMagento\FirstModule\Api\PencilInterface $pencilInterface, \Magento\Catalog\Api\ProductRepositoryInterface $productInterface, \SimplifiedMagento\FirstModule\Model\PencilFactory $pencilFactory, \Magento\Catalog\Model\ProductFactory $productFactory, \SimplifiedMagento\FirstModule\Model\HeavyService $heavyService, \Magento\Framework\App\Request\Http $http)
    {
        $this->___init();
        parent::__construct($context, $pencilInterface, $productInterface, $pencilFactory, $productFactory, $heavyService, $http);
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
