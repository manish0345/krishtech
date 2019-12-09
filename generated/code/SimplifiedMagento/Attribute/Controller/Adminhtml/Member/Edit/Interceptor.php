<?php
namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Edit;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Edit
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Edit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\SimplifiedMagento\Database\Model\AffiliateMember $affiliateMember, \Magento\Framework\View\Result\PageFactory $pageFactory, \Magento\Framework\Registry $registry, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($affiliateMember, $pageFactory, $registry, $context);
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
