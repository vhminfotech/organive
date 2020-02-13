var Comment = function () {
    
    var comment = function () {
        
        var form = $('#comment');
        var rules = {
            name: {required: true},
            email: {required: true},
            comment: {required: true},
            
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }

    
    return{
        init: function () {
            comment();
        },
        
    }
}();