define(['ko', 'jquery'], function (ko, $) {
    'use strict';

    //Observable and subscriber knockout example
    // return function (config) {
    //     const title = ko.observable("This is just for khonckout js bind event testing.");
    //     title.subscribe(function (newValue) {
    //         console.log('Change To', newValue);
    //     });
    //     title.subscribe(function (oldValue) {
    //         console.log('Default value is: ', oldValue);
    //     }, this, 'beforeChange');
    //     return {
    //         title: title,
    //         config: config
    //     }
    // }

    //Computed knockout example
    // return function (config) {
    //     let currencyInfo = ko.observable();
    //     $.getJSON(config.base_url + 'rest/V1/directory/currency', currencyInfo);
    //
    //     const viewModel = {
    //         label: ko.observable('Currency Info')
    //     };
    //     viewModel.output = ko.computed(function () {
    //         if(currencyInfo())
    //             return this.label() + ':\n' + JSON.stringify(currencyInfo(), null, 2);
    //
    //         return '...Loading';
    //     }.bind(viewModel));
    //
    //     return viewModel;
    // }

    //Observable array example
    // return function (config) {
    //     const viewModel = {
    //         exchange_rate: ko.observableArray([
    //             {
    //                 currency_to: 'USD',
    //                 rate: '1.50'
    //             },
    //             {
    //                 currency_to: 'EUR',
    //                 rate: '1.80'
    //             }
    //         ])
    //     };
    //
    //     const viewModel = {
    //         exchange_rate: ko.observableArray([
    //             100, 200, 300, 400, 500
    //         ])
    //     };
    //
    //     return viewModel;
    // }


    //ES5 ko.track
    return function (config) {
        const viewModel = ko.track({
            label: 'View Model with Knockout ES5',
            additional_charge: 2,
            items: [
                {name: "Product 1", qty: 4, price: 12},
                {name: "Product 2", qty: 2, price: 2.5}
            ],
            rowTotal: item => item.qty * item.price,
            total: function () {
                const sum = this.items.map(this.rowTotal)
                    .reduce((acc, curr) => acc + curr);
                return sum + this.additional_charge;
            }
        });

        ko.getObservable(viewModel, 'additional_charge').subscribe(function (newValue) {
            console.log('Additional Charges', newValue);
        });

        return viewModel;
    }

});