<?php


namespace SimplifiedMagento\Attribute\Model;


use Magento\Framework\Option\ArrayInterface;

class AdminArray implements ArrayInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            [ 'value' => '0', 'label' => __('Please Select')],
            [ 'value' => '1', 'label' => __('Gold')],
            [ 'value' => '2', 'label' => __('Sliver')],
            [ 'value' => '3', 'label' => __('Bronze')]
        ];
    }
}