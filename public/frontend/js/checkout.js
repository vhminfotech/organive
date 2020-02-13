var Checkout = function () {

    var check = function () {

        var form = $('#checkoutform');
        var rules = {
            firstname: {required: true},
            lastname: {required: true},
            address: {required: true},
            city: {required: true},
            state: {required: true},
            country: {required: true},
            pincode: {required: true},
            phone: {required: true, maxlength: 10, minlength: 10},
            email: {required: true, email: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    }
    return{
        init: function () {
            check();
        }
    }
}();