<?php


namespace SimplifiedMagento\Attribute\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Catalog\Model\ImageUploader;
use Magento\Framework\App\ResponseInterface;

class Upload extends Action
{
    protected $imageUploader;

    public function __construct(
        ImageUploader $imageUploader,
        Action\Context $context)
    {
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $result = $this->imageUploader->saveFileToTmpDir('my_image');

            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }

        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}