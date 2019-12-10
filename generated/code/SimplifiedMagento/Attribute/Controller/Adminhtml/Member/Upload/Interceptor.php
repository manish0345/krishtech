<?php
namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Upload;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Upload
 */
class Interceptor extends \SimplifiedMagento\Attribute\Controller\Adminhtml\Member\Upload implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\ImageUploader $imageUploader, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($imageUploader, $context);
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
