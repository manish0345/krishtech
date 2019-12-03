define(['jquery'], function ($) {
    'use strict';

    return {
        adminAutologin:  adminAutologin
    };

    /**
     * Performs automatic login process
     * @param {String} username
     * @param {String} password
     */
    function adminAutologin(username, password) {
        $('#username').val(username);
        $('#login').val(password);
        $('.action-login').click();
        $('#login-form').hide();
        $('#autologin-message').show();
    }
});