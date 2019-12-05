<?php
namespace CustomForm\MailAttachment\Controller\Index\Submit;

/**
 * Interceptor class for @see \CustomForm\MailAttachment\Controller\Index\Submit
 */
class Interceptor extends \CustomForm\MailAttachment\Controller\Index\Submit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory, \Magento\Framework\Filesystem $fileSystem, \Magento\Framework\Escaper $escaper)
    {
        $this->___init();
        parent::__construct($context, $transportBuilder, $inlineTranslation, $scopeConfig, $storeManager, $fileUploaderFactory, $fileSystem, $escaper);
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
