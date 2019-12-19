<?php


namespace TrainingManish\Feedback\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Feedback extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('mage_feedback', 'entity_id');
    }
}