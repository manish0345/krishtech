<?php


namespace TrainingManish\Feedback\Api;


interface FeedbackRepositoryInterface
{
    /**
     * @param int $id
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function getFeedbackById($id);

    /**
     * @param Data\FeedbackInterface $feedback
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function saveFeedback(\TrainingManish\Feedback\Api\Data\FeedbackInterface $feedback);

    /**
     * @param int $id
     * @return void
     */
    public function deleteFeedbackById($id);
}