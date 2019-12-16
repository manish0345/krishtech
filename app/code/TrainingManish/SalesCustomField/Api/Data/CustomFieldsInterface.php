<?php


namespace TrainingManish\SalesCustomField\Api\Data;


interface CustomFieldsInterface
{
    const CHECKOUT_COMMENT = 'checkout_comment';

    /**
     * @return string|null
     */
    public function getCheckoutComment();

    /**
     * @param string|null $comment Comment
     * @return CustomFieldsInterface
     */
    public function setCheckoutComment(string $comment = null);
}