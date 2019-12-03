<?php


namespace SimplifiedMagento\BuyNow\Model;


use Magento\Framework\Option\ArrayInterface;

class ProductArray implements ArrayInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            [ 'value' => 'simple', 'label' => __('Simple')],
            [ 'value' => 'grouped', 'label' => __('Grouped')],
            [ 'value' => 'configurable', 'label' => __('Configurable')],
            [ 'value' => 'bundle', 'label' => __('Bundle')],
            [ 'value' => 'downloadable', 'label' => __('Downloadable')]
        ];
    }
}