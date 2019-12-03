<?php


namespace SimplifiedMagento\Attribute\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'sort_order' => 30,
            'on_click' => 'location.reload()'
        ];
    }
}