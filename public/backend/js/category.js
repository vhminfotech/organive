var Category = function () {
    
    var addcategory = function () {
        
        var form = $('#categorylist');
        var rules = {
            category_id: {required: true},
            category_name: {required: true},
            
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