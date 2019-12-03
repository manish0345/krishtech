<?php


namespace SimplifiedMagento\Database\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember as AffiliateMemberResource;
use SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface;

class AffiliateMember extends AbstractExtensibleModel implements AffiliateMemberInterface
{

    protected function _construct()
    {
        $this->_init(AffiliateMemberResource::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        // TODO: Implement getName() method.
        return $this->getData(AffiliateMemberInterface::ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->getData(AffiliateMemberInterface::NAME);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        // TODO: Implement getAddress() method.
        return $this->getData(AffiliateMemberInterface::ADDRESS);
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        // TODO: Implement getStatus() method.
        return $this->getData(AffiliateMemberInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        // TODO: Implement getCreatedAt() method.
        return $this->getData(AffiliateMemberInterface::CREATED_AT);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        // TODO: Implement getUpdatedAt() method.
        return $this->getData(AffiliateMemberInterface::UPDATED_AT);
    }

    /**
     * @param string $name
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
        return $this->setData(AffiliateMemberInterface::NAME, $name);
    }

    /**
     * @param string $address
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setAddress($address)
    {
        // TODO: Implement setAddress() method.
        return $this->setData(AffiliateMemberInterface::ADDRESS, $address);
    }

    /**
     * @param boolean $status
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setStatus($status)
    {
        // TODO: Implement setStatus() method.
        return $this->setData(AffiliateMemberInterface::STATUS, $status);
    }

    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface
     */
    public function getExtensionAttributes()
    {
        // TODO: Implement getExtensionAttributes() method.
        return $this->_getExtensionAttributes();
    }

    /**
     * @param SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension
     * @return $this
     */
    public function setExtensionAttributes(\SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension)
    {
        // TODO: Implement setExtensionAttributes() method.
        return $this->_setExtensionAttributes($affiliateMemberExtension);
    }

}