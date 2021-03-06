<?php


namespace SimplifiedMagento\Attribute\Model\Config;


use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class Validation extends AbstractBackend
{
    public function validate($object)
    {
        if($object->getData($this->getAttribute()->getAttributeCode()) < 10)
            throw new LocalizedException(__('Custom EAV must be greater then or equal 10'));
        return parent::validate($object); // TODO: Change the autogenerated stub
    }
}