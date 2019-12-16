<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Sales\Test\Block\Adminhtml\Order\Create;

use Magento\Mtf\Block\Block;

/**
 * Class Totals
 * Adminhtml sales order create totals block
 *
 */
class Totals extends Block
{
    /**
     * 'Submit order' button
     *
     * @var string
     */
    protected $submitOrder = '.order-totals-actions button';

    /**
     * order Totals rows locator.
     *
     * @var string
     */
    private $totalsRowsLocator = '.data-table tr';

    /**
     * order Totals Item label locator.
     *
     * @var string
     */
    private $totalsRowKeyLocator = '.admin__total-mark';

    /**
     * order Totals Item amount locator.
     *
     * @var string
     */
    private $totalsRowValueLocator = '.price';

    /**
     * Click 'Submit order' button
     */
    public function submitOrder()
    {
        $this->_rootElement->find($this->submitOrder)->click();
    }

    /**
     * Get order totals.
     *
     * @return array
     */
    public function getOrderTotals()
    {
        $totals = [];
        $elements = $this->_rootElement->getElements($this->totalsRowsLocator);
        foreach ($elements as $row) {
            if ($row->isVisible()) {
                $key = trim($row->find($this->totalsRowKeyLocator)->getText());
                $value = $row->find($this->totalsRowValueLocator)->getText();
                $totals[$key] = $value;
            }
        }
        return $totals;
    }
}
