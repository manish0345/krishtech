<?php


namespace TrainingManish\Feedback\Model;


use Magento\Framework\Model\AbstractModel;
use TrainingManish\Feedback\Api\Data\FeedbackInterface;
use TrainingManish\Feedback\Model\ResourceModel\Feedback as FeedbackResource;

class Feedback extends AbstractModel implements FeedbackInterface
{
    protected function _construct()
    {
        $this->_init(FeedbackResource::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(FeedbackInterface::ID);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getData(FeedbackInterface::FNAME);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getData(FeedbackInterface::LNAME);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(FeedbackInterface::EMAIL);
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->getData(FeedbackInterface::RATING);
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getData(FeedbackInterface::MESSAGE);
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->getData(FeedbackInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(FeedbackInterface::CREATED_AT);
    }

    /**
     * @param string $fname
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setFirstName($fname)
    {
        return $this->setData(FeedbackInterface::FNAME, $fname);
    }

    /**
     * @param string $lname
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setLastName($lname)
    {
        return $this->setData(FeedbackInterface::LNAME, $lname);
    }

    /**
     * @param string $email
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setEmail($email)
    {
        return $this->setData(FeedbackInterface::EMAIL, $email);
    }

    /**
     * @param int $rating
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setRating($rating)
    {
        return $this->setData(FeedbackInterface::RATING, $rating);
    }

    /**
     * @param string $message
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setMessage($message)
    {
        return $this->setData(FeedbackInterface::MESSAGE, $message);
    }

    /**
     * @param boolean $status
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setStatus($status)
    {
        return $this->setData(FeedbackInterface::STATUS, $status);
    }
}