<?php


namespace TrainingManish\SalesCustomField\Api;

use TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface;

interface CustomFieldsGuestRepositoryInterface
{
    /**
     * @param string $cartId Guest Cart id
     * @param \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface $customFields
     * @return \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(
        string $cartId,
        CustomFieldsInterface $customFields
    ) : CustomFieldsInterface;
}