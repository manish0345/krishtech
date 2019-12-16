<?php


namespace TrainingManish\SalesCustomField\Model;


use Magento\Quote\Model\QuoteIdMaskFactory;
use TrainingManish\SalesCustomField\Api\CustomFieldsGuestRepositoryInterface;
use TrainingManish\SalesCustomField\Api\CustomFieldsRepositoryInterface;
use TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface;

class CustomFieldsGuestRepository implements CustomFieldsGuestRepositoryInterface
{
    protected $quoteIdMaskFactory;
    protected $customFieldsRepository;

    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        CustomFieldsRepositoryInterface $customFieldsRepository
    )
    {
        $this->quoteIdMaskFactory     = $quoteIdMaskFactory;
        $this->customFieldsRepository = $customFieldsRepository;
    }

    /**
     * @param string $cartId Guest Cart id
     * @param \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface $customFields
     * @return \TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(string $cartId, CustomFieldsInterface $customFields): CustomFieldsInterface
    {
        $quoteMask = $this->quoteIdMaskFactory->create()->load($cartId, 'masked_id');
        return $this->customFieldsRepository->saveCustomFields((int)$quoteMask->getQuoteId(), $customFields);
    }
}