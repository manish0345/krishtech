<?php


namespace TrainingManish\Feedback\Block\Adminhtml\Feedback\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Feedback'),
            'class' => 'save primary',
            'sort_order' => 50
        ];
    }
}