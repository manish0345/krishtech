<?php
namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassDelete;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassDelete
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\MassDelete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Ui\Component\MassAction\Filter $filter, \Magento\Backend\Model\View\Result\RedirectFactory $redirectFactory, \SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory $collectionFactory, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($filter, $redirectFactory, $collectionFactory, $context);
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
