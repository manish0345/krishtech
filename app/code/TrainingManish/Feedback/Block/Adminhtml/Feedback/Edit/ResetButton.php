<?php


namespace TrainingManish\Feedback\Block\Adminhtml\Feedback\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
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