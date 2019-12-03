<?php

namespace SimplifiedMagento\BuyNow\Controller\Custom;

use Magento\Checkout\Controller\Cart\Add as AddAlias;

class AddToCart extends AddAlias
{
    public function execute()
    {

//        $params = $this->getRequest()->getParam('buy-now');
//        //$params11 = $this->getRequest()->getPostValue();
//
//        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
//        $logger = new \Zend\Log\Logger();
//        $logger->addWriter($writer);
//        $logger->info(print_r($params, true));

        foreach ($this->cart->getQuote()->getAllItems() as $item) {
            /** @var \Magento\Quote\Model\Quote\Item $item */
            $item->delete();
        }

        return parent::execute();
    }
}
?>