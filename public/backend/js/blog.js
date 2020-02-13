var Blog = function (){
    var addBlog = function (){
        
        
        var form = $('#addBlog');
        var rules = {
            
            img: {required: true},
            title: {required: true},
            category: {required: true},
            content: {required: true},
            author: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    var updateBlog = function (){
        var form = $('#updateBlog');
        var rules = {
            title: {required: true},
            category: {required: true},
            content: {required: true},
            author: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    return {
        init:function (){
            addBlog();
        },
        update:function (){
            updateBlog();
        },
    }
}();