<?php


namespace TrainingManish\SalesCustomField\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface;

class Emailtemplatevars implements ObserverInterface
{
    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $transport = $observer->getEvent()->getTransport();

        $order = $transport->getOrder();
        $customComment = $order->getData(CustomFieldsInterface::CHECKOUT_COMMENT);

        $transport['customComment'] = $customComment;
    }
}