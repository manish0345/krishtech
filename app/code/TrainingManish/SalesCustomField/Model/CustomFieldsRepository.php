<?php


namespace TrainingManish\SalesCustomField\Model;


use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Sales\Model\Order;
use TrainingManish\SalesCustomField\Api\CustomFieldsRepositoryInterface;
use TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface;

class CustomFieldsRepository implements CustomFieldsRepositoryInterface
{
    protected $cartRepository;
    protected $scopeConfig;
    protected $customFields;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        ScopeConfigInterface $scopeConfig,
        CustomFieldsInterface $customFields
    )
    {
        $this->cartRepository = $cartRepository;
        $this->scopeConfig    = $scopeConfig;
        $this->customFields   = $customFields;
    }

    /**
     * @param int $cartId
     * @param \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface $customFields
     * @return \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(int $cartId, CustomFieldsInterface $customFields): CustomFieldsInterface
    {
        $cart = $this->cartRepository->getActive($cartId);
        if (!$cart->getItemsCount()) {
            throw new NoSuchEntityException(__('Cart %1 is empty', $cartId));
        }

        try {
            $cart->setData(
                CustomFieldsInterface::CHECKOUT_COMMENT,
                $customFields->getCheckoutComment()
            );
            $this->cartRepository->save($cart);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Custom order data could not be saved!'));
        }

        return $customFields;
    }

    /**
     * @param Order $order
     * @return CustomFieldsInterface
     */
    public function getCustomFields(Order $order): CustomFieldsInterface
    {
        if (!$order->getId()) {
            throw new NoSuchEntityException(__('order %1 does not exist', $order));
        }

        $this->customFields->setCheckoutComment(
            $order->getData(CustomFieldsInterface::CHECKOUT_COMMENT)
        );

        return $this->customFields;
    }
}