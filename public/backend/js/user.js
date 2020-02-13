var User = function () {
    
    var adduser = function () {
        
         $('body').on('change', '#country', function () {
            var id = $(this).val();
            
             $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "user-ajaxAction",
                data: {'action': 'getstate', 'id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var subcategoryhtml = '<option value="">Select State</option>';
                    for (var i = 0; i < output.length; i++) {
                        var temp_html = "";
                        temp_html = '<option value="' + output[i].id + '">' + output[i].state + '</option>';
                        subcategoryhtml = subcategoryhtml + temp_html;
                    }
                    $("#state").html(subcategoryhtml);
                }
            });
        });

        $('body').on('change', '#state', function () {
            
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "user-ajaxAction",
                data: {'action': 'getcity', 'id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var subcategoryhtml = '<option value="">Select City</option>';
                    for (var i = 0; i < output.length; i++) {
                        var temp_html = "";
                        temp_html = '<option value="' + output[i].id + '">' + output[i].city + '</option>';
                        subcategoryhtml = subcategoryhtml + temp_html;
                    }
                    $("#city").html(subcategoryhtml);
                }
            });
        });
    
        var form = $('#userlist');
        var rules = {
            username: {required: true},
            firstname: {required: true},
            lastname: {required: true},
            email: {required: true},
            phn: {required: true},
            country: {required: true},
            state: {required: true},
            city: {required: true},
            password: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }
    
    return{
        init: function () {
            adduser();
        },
    }
}();