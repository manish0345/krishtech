var config = {
    config: {
        mixins: {
            'Magento_Catalog/js/catalog-add-to-cart': {
                'SimplifiedMagento_HelloWorld/js/add-to-cart-mixin': true
            }
        }
    },
    map: {
        '*': {
            coffee: 'SimplifiedMagento_HelloWorld/js/script-example'
        }
    },
    shim: {
        'Magento_Catalog/js/view/compare-products': {
            deps: ['SimplifiedMagento_HelloWorld/js/script-example']
        }
    }
}