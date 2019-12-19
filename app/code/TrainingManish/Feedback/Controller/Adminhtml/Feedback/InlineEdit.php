<?php


namespace TrainingManish\Feedback\Controller\Adminhtml\Feedback;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use TrainingManish\Feedback\Model\Feedback;

class InlineEdit extends Action
{
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;
    /**
     * @var Feedback
     */
    protected $feedback;

    public function __construct(
        JsonFactory $jsonFactory,
        Feedback $feedback,
        Action\Context $context
    )
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->feedback = $feedback;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $resultJson = $this->jsonFactory->create();

        $error = false;

        $message = [];

        if($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);

            if(!count($postItems)) {
                $message[] = __('Please correct data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $modelId) {
                    $model = $this->feedback->load($modelId);
                    try{
                        $model->setData(array_merge($model->getData(), $postItems[$modelId]));
                        $model->save();
                    } catch (\Exception $e) {
                        $message[] = $e->getMessage();
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'message' => $message,
            'error' => $error
        ]);
    }
}