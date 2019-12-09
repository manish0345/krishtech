<?php


namespace TrainingManish\CustomerAttribute\Setup;


use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Model\Customer;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class UpgradeData implements UpgradeDataInterface
{
    private $customerFactory;
    private $attributeSetFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory, AttributeSetFactory $attributeSetFactory)
    {
        $this->customerFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();
        /** @var $attributeSet AttributeSet */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        $customerSetup->addAttribute(Customer::ENTITY,'nick_name',	[
            'type'         => 'varchar', // attribute with varchar type
            'label'        => 'Nick Name',
            'input'        => 'text',  // attribute input field is text
            'required'     => false,  // field is not required
            'visible'      => true,
            'user_defined' => true,
            'position'     => 999,
            'sort_order'  => 999,
            'system'       => 0,
            'is_used_in_grid' => 1,   //setting grid options
            'is_visible_in_grid' => 1,
            'is_filterable_in_grid' => 1,
            'is_searchable_in_grid' => 1,
        ]);

        $sampleAttribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'nick_name')
            ->addData(
                [
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => ['adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_account_create','customer_register_address'],
                ]
            );

        $sampleAttribute->save();
    }
}