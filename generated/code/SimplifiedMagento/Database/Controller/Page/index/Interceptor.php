<?php
namespace SimplifiedMagento\Database\Controller\Page\index;

/**
 * Interceptor class for @see \SimplifiedMagento\Database\Controller\Page\index
 */
class Interceptor extends \SimplifiedMagento\Database\Controller\Page\index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \SimplifiedMagento\Database\Model\AffiliateMemberFactory $affiliateMemberFactory)
    {
        $this->___init();
        parent::__construct($context, $affiliateMemberFactory);
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
