var Slider = function () {
    
    var addslider = function () {
        
        var form = $('#addSlider');
        var rules = {
            title: {required: true},
            text: {required: true},
            sliderdescription: {required: true},
            
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
        
    }
    
    return{
        init: function () {
            addslider();
        },
    }
}();