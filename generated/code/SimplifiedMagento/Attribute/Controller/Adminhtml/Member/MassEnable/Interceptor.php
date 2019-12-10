<?php
namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassEnable;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassEnable
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassEnable implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Ui\Component\MassAction\Filter $filter, \SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory $collectionFactory, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($filter, $collectionFactory, $context);
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
