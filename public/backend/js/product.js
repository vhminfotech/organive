var Product = function () {
    
    var addcategory = function () {
        
        var form = $('#addProduct');
        var rules = {
            label: {required: true},
            name: {required: true},
            description: {required: true},
            price: {required: true},
            category: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
        
    }
    
    return{
        init: function () {
            addcategory();
        },
    }
}();