define(['uiElement'], function (uiElement) {
    'use strict';

    return uiElement.extend({
        defaults: {
            label: "This is default ui component",
            value: [100, 200, 300, 400, 500]
        },
        label: "My Ui Component for Testing."
    })
});