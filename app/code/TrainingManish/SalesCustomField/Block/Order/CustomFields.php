<?php


namespace TrainingManish\SalesCustomField\Block\Order;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Sales\Model\Order;
use TrainingManish\SalesCustomField\Api\CustomFieldsRepositoryInterface;

class CustomFields extends Template
{
    protected $coreRegistry = null;
    protected $customFieldsRepository;

    public function __construct(
        Registry $registry,
        CustomFieldsRepositoryInterface $customFieldsRepository,
        Template\Context $context,
        array $data = [])
    {
        $this->coreRegistry = $registry;
        $this->customFieldsRepository = $customFieldsRepository;
        $this->_isScopePrivate = true;
        $this->_template = 'order/view/custom_fields.phtml';
        parent::__construct($context, $data);
    }

    public function getOrder() : Order
    {
        return $this->coreRegistry->registry('current_order');
    }

    public function getCustomFields(Order $order) {
        return $this->customFieldsRepository->getCustomFields($order);
    }
}