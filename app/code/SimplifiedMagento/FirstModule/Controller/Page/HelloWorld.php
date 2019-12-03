<?php
namespace SimplifiedMagento\FirstModule\Controller\Page;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use SimplifiedMagento\FirstModule\Api\PencilInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use SimplifiedMagento\FirstModule\Model\PencilFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Request\Http;
use SimplifiedMagento\FirstModule\Model\HeavyService;

class HelloWorld extends \Magento\Framework\App\Action\Action
{
    protected $pencilInterface;
    protected $productInterface;
    protected $pencilFactory;
    protected $productFactory;
    protected $http;
    protected $heavyService;

    public function __construct(Context $context, PencilInterface $pencilInterface,
                                ProductRepositoryInterface $productInterface,
                                PencilFactory $pencilFactory,
                                ProductFactory $productFactory,
                                HeavyService $heavyService,
                                Http $http)
    {
        $this->pencilInterface = $pencilInterface;
        $this->productInterface = $productInterface;
        $this->pencilFactory = $pencilFactory;
        $this->productFactory = $productFactory;
        $this->http = $http;
        $this->heavyService = $heavyService;

        parent::__construct($context);
    }
    public function execute() {
        //echo $this->pencilInterface->getPencilType();
        //echo get_class($this->productInterface);
        //$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        //$student = $objectManager->create('SimplifiedMagento\FirstModule\Model\Student');

        //$pencil = $this->pencilFactory->create(array('name' => 'Alex', 'school' => 'T John School'));
        //var_dump($pencil);

        //$product = $this->productFactory->create()->load(1);
        //$product->setName("Iphone 6");
        //echo $productName = $product->getName();

        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza Second'));
        $this->_eventManager->dispatch('mageplaza_helloworld_display_text_second', ['mp_text' => $textDisplay]);

        echo $textDisplay->getText().'<br/>';

        //$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
        //$this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);

        //echo $textDisplay->getText().'<br/>';

        //$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza First'));
        $this->_eventManager->dispatch('mageplaza_helloworld_display_text_first', ['mp_text' => $textDisplay]);

        echo $textDisplay->getText().'<br/>';
        exit;

//        $getId = $this->http->getParam('id', '0');
//        if($getId == '1') {
//            $this->heavyService->printProxyMessage();
//        } else {
//            echo "Heavy Service not been instantiated";
//        }
    }
}
?>