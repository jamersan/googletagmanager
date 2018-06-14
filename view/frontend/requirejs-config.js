var config = {
    map: {
        '*': {
            jamersanGtmDatalayer: 'Jamersan_GoogleTagManager/js/datalayer'
        }
    },
    shim: {
        'Jamersan_GoogleTagManager/js/datalayer': ['Magento_Customer/js/customer-data']
    }
};
