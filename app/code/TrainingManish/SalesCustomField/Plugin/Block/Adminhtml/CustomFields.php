<?php


namespace TrainingManish\SalesCustomField\Plugin\Block\Adminhtml;


use Magento\Sales\Block\Adminhtml\Order\View\Info;
use TrainingManish\SalesCustomField\Api\CustomFieldsRepositoryInterface;

class CustomFields
{
    protected $customFieldsRepository;

    public function __construct(CustomFieldsRepositoryInterface $customFieldsRepository)
    {
        $this->customFieldsRepository = $customFieldsRepository;
    }

    public function afterToHtml(Info $subject, $result) {
        $block = $subject->getLayout()->getBlock('order_custom_fields');
        if($block !== false) {
            $block->setOrderCustomFields(
                $this->customFieldsRepository->getCustomFields($subject->getOrder())
            );
            $result = $result .$block->toHtml();
        }

        return $result;
    }
}