<?php
namespace MagePal\GmailSmtpApp\Controller\Adminhtml\Testemail\Index;

/**
 * Interceptor class for @see \MagePal\GmailSmtpApp\Controller\Adminhtml\Testemail\Index
 */
class Interceptor extends \MagePal\GmailSmtpApp\Controller\Adminhtml\Testemail\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($context);
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
