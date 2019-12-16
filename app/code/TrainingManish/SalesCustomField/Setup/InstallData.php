<?php


namespace TrainingManish\SalesCustomField\Setup;


use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Sales\Setup\SalesSetupFactory;
use TrainingManish\SalesCustomField\Api\Data\CustomFieldsInterface;

class InstallData implements InstallDataInterface
{
    protected $salesSetupFactory;
    protected $quoteSetupFactory;

    public function __construct(SalesSetupFactory $salesSetupFactory, QuoteSetupFactory $quoteSetupFactory)
    {
        $this->quoteSetupFactory = $quoteSetupFactory;
        $this->salesSetupFactory = $salesSetupFactory;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->setUp = $setup->startSetup();
        $this->installQuoteData();
        $this->installSalesData();
        $this->setUp = $setup->endSetup();
    }

    public function installQuoteData()
    {
        $quoteInstaller = $this->quoteSetupFactory->create(
            [
                'resourceName' => 'quote_setup',
                'setup' => $this->setUp
            ]
        );
        $quoteInstaller
            ->addAttribute(
                'quote',
                CustomFieldsInterface::CHECKOUT_COMMENT,
                ['type' => Table::TYPE_TEXT, 'length' => '64k', 'nullable' => true]
            );
    }

    /**
     * Install sales custom data
     *
     * @return void
     */
    public function installSalesData()
    {
        $salesInstaller = $this->salesSetupFactory->create(
            [
                'resourceName' => 'sales_setup',
                'setup' => $this->setUp
            ]
        );
        $salesInstaller
            ->addAttribute(
                'order',
                CustomFieldsInterface::CHECKOUT_COMMENT,
                ['type' => Table::TYPE_TEXT, 'length' => '64k', 'nullable' => true, 'grid' => false]
            );
    }
}