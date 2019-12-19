<?php


namespace TrainingManish\Feedback\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use TrainingManish\Feedback\Model\FeedbackFactory;
use TrainingManish\Feedback\Model\FeedbackRepository;

class Submit extends Action
{
    protected $feedbackFactory;
    /**
     * @var FeedbackRepository
     */
    protected $feedbackRepository;

    private static $_siteVerifyUrl = "https://www.google.com/recaptcha/api/siteverify?";
    private $_secret;
    private static $_version = "php_1.0";

    public function __construct(
        FeedbackFactory $feedbackFactory,
        FeedbackRepository $feedbackRepository,
        Context $context
    )
    {
        parent::__construct($context);
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackRepository = $feedbackRepository;
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
        $captcha = $this->getRequest()->getParam('g-recaptcha-response');
        $secret = "6LcQjMgUAAAAABuoXATMtlYYHbht7TDIy4N0ySoR"; //Replace with your secret key
        $response = null;
        $path = self::$_siteVerifyUrl;
        $dataC = array (
            'secret' => $secret,
            'remoteip' => $_SERVER["REMOTE_ADDR"],
            'v' => self::$_version,
            'response' => $captcha
        );
        $req = "";
        foreach ($dataC as $key => $value) {
            $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
        }

        $req = substr($req, 0, strlen($req)-1);
        $response = file_get_contents($path . $req);
        $answers = json_decode($response, true);

        if(trim($answers ['success']) == true) {
            $feedback = $this->feedbackFactory->create();

            $data = $this->getRequest()->getPostValue();
            $newData = $data;
            if (!$data) {
                $this->_redirect('*/*/');
                return;
            }

            unset($newData['feedback_frm']);
            unset($newData['form_key']);

            $feedback->setData($newData);
            if ($this->feedbackRepository->saveFeedback($feedback)) {
                $this->messageManager->addSuccessMessage(__('Feedback saved successfully.'));
            } else {
                $this->messageManager->addErrorMessage(__('There is some error, please try again.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Captcha Issue'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/');
        return $resultRedirect;
    }
}