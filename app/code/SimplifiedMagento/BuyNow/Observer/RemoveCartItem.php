<?php


namespace SimplifiedMagento\BuyNow\Observer;


use Magento\Checkout\Model\Cart;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RemoveCartItem implements ObserverInterface
{
    protected $cart;
    protected $checkoutSession;

    public function __construct(Cart $cart, CheckoutSession $checkoutSession)
    {
        $this->cart = $cart;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Add To cart Click Event Disptach');

        $params = $this->getRequest()->getParams();
//        print_r($params);
//        exit;

        foreach ($this->cart->getQuote()->getAllItems() as $item) {
            /** @var \Magento\Quote\Model\Quote\Item $item */
            $item->delete();
        }

//        $allItems = $this->checkoutSession->getQuote()->getItemsCollection();
//
//        foreach ($allItems as $item) {
//            $itemId = $item->getItemId();
//            $this->cart->removeItem($itemId)->save();
//        }

    }
}