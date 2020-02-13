var Login = function () {
    
    var login = function () {
        
        var form = $('#login');
        var rules = {
            email: {required: true},
            password: {required: true},
            
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
        
        var form = $('#register');
        var rules = {
            email: {required: true},
            username: {required: true},
            firstname: {required: true},
            lastname: {required: true},
            email: {required: true},
            password: {required: true},
            
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
        
        var form = $('#forgetpass');
        var rules = {
            email: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
        
    }

    
    return{
        init: function () {
            login();
        },
        
    }
}();