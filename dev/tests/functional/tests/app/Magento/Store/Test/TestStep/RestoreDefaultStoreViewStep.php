<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Store\Test\TestStep;

use Magento\Mtf\TestStep\TestStepInterface;
use Magento\Store\Test\Fixture\Store;

/**
 * Restore DefaultStore view.
 */
class RestoreDefaultStoreViewStep implements TestStepInterface
{
    /**
     * Fixture of Store view.
     *
     * @var Store
     */
    private $storeView;

    /**
     * @param Store $storeView
     */
    public function __construct(Store $storeView)
    {
        $this->storeView = $storeView;
    }

    /**
     * Restore Default Store view.
     *
     * @return void
     */
    public function run()
    {
        $this->storeView->persist();
    }
}
