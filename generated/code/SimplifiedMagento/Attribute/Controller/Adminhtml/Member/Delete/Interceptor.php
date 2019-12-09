<?php
namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Delete;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Delete
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Model\View\Result\RedirectFactory $redirectFactory, \Magento\Framework\View\Result\PageFactory $pageFactory, \SimplifiedMagento\Database\Model\AffiliateMember $affiliateMember, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($redirectFactory, $pageFactory, $affiliateMember, $context);
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
