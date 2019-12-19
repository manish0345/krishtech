<?php


namespace TrainingManish\Feedback\Model;

use TrainingManish\Feedback\Api\Data;
use TrainingManish\Feedback\Api\FeedbackRepositoryInterface;
use TrainingManish\Feedback\Model\ResourceModel\Feedback;
use TrainingManish\Feedback\Model\FeedbackFactory;
use TrainingManish\Feedback\Model\ResourceModel\Feedback\CollectionFactory;

class FeedbackRepository implements FeedbackRepositoryInterface
{
    private $feedback;
    private $feedbackFactory;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        Feedback $feedback,
        FeedbackFactory $feedbackFactory
    )
    {
        $this->feedback = $feedback;
        $this->feedbackFactory = $feedbackFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param \TrainingManish\Feedback\Api\Data\FeedbackInterface $feedback
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function saveFeedback(\TrainingManish\Feedback\Api\Data\FeedbackInterface $feedback)
    {
        if($feedback->getId() == null) {
            $this->feedback->save($feedback);
            return $feedback;
        } else {
            $newFeedback = $this->feedbackFactory->create()->load($feedback->getId());
            foreach ($feedback->getData() as $key => $value) {
                $newFeedback->setData($key, $value);
            }
            $this->feedback->save($newFeedback);
            return $newFeedback;
        }
    }

    /**
     * @param int $id
     * @return \TrainingManish\Feedback\Api\Data\FeedbackInterface
     */
    public function getFeedbackById($id)
    {
        $feedback = $this->feedbackFactory->create()->load($id);
        return $feedback;
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteFeedbackById($id)
    {
        $feedback = $this->feedbackFactory->create()->load($id);
        $feedback->delete();
    }
}