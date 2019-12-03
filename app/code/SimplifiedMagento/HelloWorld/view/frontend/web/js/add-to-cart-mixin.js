define(['jquery'], function ($) {
    'use strict';

    return function (catalogAddToCart) {
        $.widget('mage.catalogAddToCart', catalogAddToCart, {
            submitForm: function (form) {
                console.log('Add cart mixing successfully.');
                console.log('Form Data', form);
                return this._super(form);
            }
        });
        return $.mage.catalogAddToCart;
    };
});