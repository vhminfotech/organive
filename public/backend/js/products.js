var Products = function (){
    var addProduct = function (){
        
        var form = $('#addproduct');
        var rules = {
            product_name: {required: true},
            img: {required: true},
            category: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    var updateProduct = function (){
        var form = $('#updateproduct');
        var rules = {
            product_name: {required: true},
            img: {required: true},
            category: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    return {
        init:function (){
            addProduct();
        },
        update:function (){
            updateProduct();
        },
    }
}();