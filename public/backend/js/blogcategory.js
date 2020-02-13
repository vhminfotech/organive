var BlogCategory = function (){
    var addBlogCategory = function (){
        
        var form = $('#addBlogCategory');
        var rules = {
            blogcategory_name: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    return {
        init:function (){
            addBlogCategory();
        },
    }
}();