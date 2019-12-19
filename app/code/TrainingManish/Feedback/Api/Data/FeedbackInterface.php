<?php


namespace TrainingManish\Feedback\Api\Data;


interface FeedbackInterface
{
    const ID = 'entity_id';
    const FNAME = 'first_name';
    const LNAME = 'last_name';
    const EMAIL = 'email';
    const RATING = 'rating';
    const MESSAGE = 'message';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return int
     */
    public function getRating();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return boolean
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param int $id
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setId($id);

    /**
     * @param string $fname
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setFirstName($fname);

    /**
     * @param string $lname
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setLastName($lname);

    /**
     * @param string $email
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setEmail($email);

    /**
     * @param int $rating
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setRating($rating);

    /**
     * @param string $message
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setMessage($message);

    /**
     * @param boolean $status
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function setStatus($status);

}