define(['jquery', 'Magento_Ui/js/modal/modal'], function ($, modal) {
    'use strict';

    //creating jquery widget
    $.widget('vendor.modalForm', {
        options: {
            modalForm: '#modal-form',
            modalButton: '.add'
        },
        _create: function () {
            this.options.modalOption = this._getModalOptions();
            this._bind();

            this._resetStyleCss();
        },
        /**
         * Set width of the popup
         * @private
         */
        _setStyleCss: function(width) {
            width = width || 400;
            if (window.innerWidth > 786) {
                this.element.parent().parent('.modal-inner-wrap').css({'max-width': width+'px'});
            }
        },

        /**
         * Reset width of the popup
         * @private
         */
        _resetStyleCss: function() {
            var self = this;
            $( window ).resize(function() {
                if (window.innerWidth <= 786) {
                    self.element.parent().parent('.modal-inner-wrap').css({'max-width': 'initial'});
                } else {
                    self._setStyleCss(self.options.innerWidth);
                }
            });
        },
        _getModalOptions: function () {
            /**
             * Modal options
             */
            var options = {
                type: 'popup',
                responsive: true,
                innerScroll: true,
                buttons: false,
                title: '',
            };

            return options;
        },
        _bind: function () {
            var modalOption = this.options.modalOption;
            var modalForm = this.options.modalForm;

            $(document).on('click', '.reviews-actions .add', function () {
                //Initialize modal
                $(modalForm).modal(modalOption);
                //open modal
                $(modalForm).trigger('openModal');
            });
        }
    });

    return $.vendor.modalForm;
});