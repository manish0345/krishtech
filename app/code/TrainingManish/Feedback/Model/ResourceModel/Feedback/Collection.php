<?php


namespace TrainingManish\Feedback\Model\ResourceModel\Feedback;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use TrainingManish\Feedback\Model\ResourceModel\Feedback as FeedbackResource;
use TrainingManish\Feedback\Model\Feedback;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        parent::_construct(); // TODO: Change the autogenerated stub
        $this->_init(Feedback::CLASS, FeedbackResource::class);
    }
}