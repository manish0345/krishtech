<?php


namespace TrainingManish\Feedback\Block\Adminhtml\Feedback\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class BackButton extends Generic implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'class' => 'back',
            'sort_order' => 10,
            'on_click' => sprintf("location.href = '%s;'", $this->getBackUrl())
        ];
    }

    public function getBackUrl() {
        return $this->getUrl('*/*');
    }
}