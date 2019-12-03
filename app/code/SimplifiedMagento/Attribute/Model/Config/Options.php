<?php


namespace SimplifiedMagento\Attribute\Model\Config;


use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Options extends AbstractSource
{

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $this->_options = [
            ['label' => __('Please Select'), 'value' => ''],
            ['label' => __('Gold'), 'value' => 'gold'],
            ['label' => __('Sliver'), 'value' => 'silver'],
            ['label' => __('Bronze'), 'value' => 'bronze'],
        ];

        return $this->_options;
    }
}