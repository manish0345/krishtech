<?php


namespace SimplifiedMagento\Attribute\Setup\Patch\Data;


use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InitializeDefaultBrand implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Get array of patches that have to be executed prior to this.
     *
     * Example of implementation:
     *
     * [
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch1::class,
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch2::class
     * ]
     *
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
//        return [
//            \Magento\Store\Setup\Patch\Schema\InitializeStoresAndWebsites::class
//        ];
    }

    /**
     * Get aliases (previous names) for the patch.
     *
     * @return string[]
     */
    public function getAliases()
    {
        return [];
//        return [
//            \SimplifiedMagento\Attribute\Setup\Patch\Data\CreateDefaultBrand::class
//        ];
    }

    /**
     * Run code inside patch
     * If code fails, patch must be reverted, in case when we are speaking about schema - than under revert
     * means run PatchInterface::revert()
     *
     * If we speak about data, under revert means: $transaction->rollback()
     *
     * @return $this
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $setup = $this->moduleDataSetup;

        $data[] = ['name' => 'Value11', 'desc' => 'Value12', 'is_enabled' => '1', 'website_id' => '1'];
        $data[] = ['name' => 'Value21', 'desc' => 'Value22', 'is_enabled' => '1', 'website_id' => '1'];

        $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('magetv_brand'),
            ['name', 'desc', 'is_enabled', 'website_id'],
            $data
        );
        $this->moduleDataSetup->endSetup();

//        $brands = [
//            ['name' => 'Sky', 'desc' => 'This is just example of Tata Sky'],
//            ['name' => 'Dish', 'desc' => 'This is just example of Dish Tv'],
//            ['name' => 'Airtel', 'desc' => 'This is just example of Airtel Dish'],
//            ['name' => 'Airtel 1', 'desc' => 'This is just example of Airtel Dish']
//        ];
//
//        $records = array_map(function ($brands){
//            return array_merge($brands, ['is_enabled' => '1', 'website_id' => '1']);
//        }, $brands);
//
//        $this->moduleDataSetup->getConnection()->insertMultiple('magetv_brand', $records);

        return $this;
    }
}