<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Adminhtml\Order\Create;

use Magento\TestFramework\Helper\Bootstrap;

/**
 * @magentoAppArea adminhtml
 */
class HeaderTest extends \PHPUnit\Framework\TestCase
{
    /** @var \Magento\Sales\Block\Adminhtml\Order\Create\Header */
    protected $_block;

    protected function setUp()
    {
        $this->_block = Bootstrap::getObjectManager()->create(
            \Magento\Sales\Block\Adminhtml\Order\Create\Header::class
        );
        parent::setUp();
    }

    /**
     * @param int|null $customerId
     * @param int|null $storeId
     * @param string $expectedResult
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @dataProvider toHtmlDataProvider
     */
    public function testToHtml($customerId, $storeId, $expectedResult)
    {
        /** @var \Magento\Backend\Model\Session\Quote $session */
        $session = Bootstrap::getObjectManager()->get(\Magento\Backend\Model\Session\Quote::class);
        $session->setCustomerId($customerId);
        $session->setStoreId($storeId);
        $this->assertEquals($expectedResult, $this->_block->toHtml());
    }

    public function toHtmlDataProvider()
    {
        $customerIdFromFixture = 1;
        $defaultStoreView = 1;
        return [
            'Customer and store' => [
                $customerIdFromFixture,
                $defaultStoreView,
                'Create New order for John Smith in Default Store view',
            ],
            'No store' => [$customerIdFromFixture, null, 'Create New order for John Smith'],
            'No customer' => [null, $defaultStoreView, 'Create New order in Default Store view'],
            'No customer, no store' => [null, null, 'Create New order for New Customer']
        ];
    }
}
