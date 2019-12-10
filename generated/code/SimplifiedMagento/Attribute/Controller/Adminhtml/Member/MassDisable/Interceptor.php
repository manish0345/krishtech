<?php
namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassDisable;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassDisable
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassDisable implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory $collectionFactory, \Magento\Ui\Component\MassAction\Filter $filter, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($collectionFactory, $filter, $context);
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
