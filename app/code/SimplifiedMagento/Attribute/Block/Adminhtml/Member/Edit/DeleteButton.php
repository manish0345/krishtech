<?php


namespace SimplifiedMagento\Attribute\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends Generic implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];

        if($this->getId()) {
            $data = [
                'label' => __('Delete Button'),
                'class' => 'delete',
                'sort_order' => 20,
                'on_click' => 'deleteConfirm(\''.__('Are you sure you want to delete this member?').'\',\''. $this->getDeleteUrl().'\')',
            ];
        }

        return $data;
    }

    public function getDeleteUrl() {
        return $this->getUrl('*/*/delete', ['id' => $this->getId()]);
    }
}