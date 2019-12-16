<?php


namespace TrainingManish\SalesCustomField\Model\Data;


use Magento\Framework\Api\AbstractExtensibleObject;
use TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface;

class CustomFields extends AbstractExtensibleObject implements CustomFieldsInterface
{

    /**
     * @return string|null
     */
    public function getCheckoutComment()
    {
        return $this->_get(self::CHECKOUT_COMMENT);
    }

    /**
     * @param string|null $comment Comment
     * @return CustomFieldsInterface
     */
    public function setCheckoutComment(string $comment = null)
    {
        return $this->setData(self::CHECKOUT_COMMENT, $comment);
    }
}