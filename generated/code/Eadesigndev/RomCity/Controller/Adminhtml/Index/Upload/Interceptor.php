<?php
namespace Eadesigndev\RomCity\Controller\Adminhtml\Index\Upload;

/**
 * Interceptor class for @see \Eadesigndev\RomCity\Controller\Adminhtml\Index\Upload
 */
class Interceptor extends \Eadesigndev\RomCity\Controller\Adminhtml\Index\Upload implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\File\Csv $csvProccesor, \Magento\Framework\Module\Dir\Reader $moduleReader, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\App\Filesystem\DirectoryList $directoryList, \Eadesigndev\RomCity\Model\ResourceModel\Collection\CollectionFactory $collectionFactory, \Magento\Framework\Controller\ResultFactory $resultRedirect, \Eadesigndev\RomCity\Model\RomCityFactory $romCityFactory, \Eadesigndev\RomCity\Model\RomCityRepository $romCityRepository, \Eadesigndev\RomCity\Helper\Data $dataHelper)
    {
        $this->___init();
        parent::__construct($context, $csvProccesor, $moduleReader, $resultPageFactory, $directoryList, $collectionFactory, $resultRedirect, $romCityFactory, $romCityRepository, $dataHelper);
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
