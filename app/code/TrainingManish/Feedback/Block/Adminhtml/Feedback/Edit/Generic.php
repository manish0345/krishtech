<?php


namespace TrainingManish\Feedback\Block\Adminhtml\Feedback\Edit;


use Magento\Framework\Registry;
use TrainingManish\Feedback\Model\Feedback;

class Generic
{
    protected $urlBuilder;
    protected $registry;

    public function __construct(\Magento\Backend\Block\Widget\Context $context, Registry $registry)
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    public function getId()
    {
        /** @var Feedback $feedback */
        $feedback = $this->registry->registry('feedback');
        return $feedback ? $feedback->getId() : null;
    }

    public function getUrl($route = '', $param = []) {
        return $this->urlBuilder->getUrl($route, $param);
    }
}