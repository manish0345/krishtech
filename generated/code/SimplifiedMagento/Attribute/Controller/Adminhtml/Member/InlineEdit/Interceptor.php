<?php
namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member\InlineEdit;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\InlineEdit
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\InlineEdit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\SimplifiedMagento\Database\Model\AffiliateMember $affiliateMember, \Magento\Framework\Controller\Result\JsonFactory $jsonFactory, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($affiliateMember, $jsonFactory, $context);
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
