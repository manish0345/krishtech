<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Paypal\Test\Block\Sandbox;

use Magento\Mtf\Block\Form;

/**
 * Register to PayPal.
 */
class ExpressLogin extends Form
{
    /**
     * Register button on PayPal side.
     *
     * @var string
     */
    protected $loginButton = '#btnLogin';

    /**
     * Register to PayPal Sandbox.
     *
     * @return void
     */
    public function sandboxLogin()
    {
        $this->_rootElement->find($this->loginButton)->click();
    }
}
