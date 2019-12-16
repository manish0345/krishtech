<?php


namespace TrainingManish\SalesCustomField\Api;

use Magento\Sales\Model\Order;
use TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface;

interface CustomFieldsRepositoryInterface
{
    /**
     * @param int $cartId
     * @param \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface $customFields
     * @return \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(
        int $cartId,
        CustomFieldsInterface $customFields
    ) : CustomFieldsInterface;

    /**
     * @param Order $order
     * @return CustomFieldsInterface
     */
    public function getCustomFields(Order $order) : CustomFieldsInterface;
}