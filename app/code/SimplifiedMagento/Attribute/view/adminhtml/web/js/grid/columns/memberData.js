define([
    'Magento_Ui/js/grid/columns/column',
    'jquery',
    'mage/template',
    'text!SimplifiedMagento_Attribute/templates/grid/cells/custom.html',
    'Magento_Ui/js/modal/modal'
], function (Column, $, mageTemplate, sendmailPreviewTemplate) {
    'use strict';

    return Column.extend({
        defaults: {
            bodyTmpl: 'SimplifiedMagento_Attribute/templates/grid/cells/custom',
            fieldClass: {
                'data-grid-html-cell': true
            }
        },
        getLabel: function (row) {
            return row[this.index + '_html']
        },
        preview: function (row) {
            var modalHtml = mageTemplate(
                sendmailPreviewTemplate,
                {
                    label: this.getLabel(row),
                    linkText: $.mage.__('Go to Details Page')
                }
            );
            var previewPopup = $('<div/>').html(modalHtml);
            previewPopup.modal({
                title: this.getLabel(row),
                innerScroll: true,
                modalClass: '_image-box',
                buttons: []}).trigger('openModal');
        },
        getFieldHandler: function (row) {
            return this.preview.bind(this, row);
        }
    });
});