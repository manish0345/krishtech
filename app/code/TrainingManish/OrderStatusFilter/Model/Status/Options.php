<?php


namespace TrainingManish\OrderStatusFilter\Model\Status;


use Magento\Framework\Data\OptionSourceInterface;

class Options implements OptionSourceInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $options = [];
        $options[] = ['label' => 'VIP Group', 'value' => '1'];
        $options[] = ['label' => 'Premium Type', 'value' => '2'];
        return $options;
    }
}