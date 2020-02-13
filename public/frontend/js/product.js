var Product = function () {

    var getdata = function () {

        $('body').on('click', '.addtocart', function () {
            var id = $(this).attr('data-id');
            var quantity = $('#quantity').val();
            var data = {quantity: quantity, 'id': id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "cart-ajaxaction",
                data: {'action': 'addtocart', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }

    var getdata2 = function () {
        
        $('body').on('click', '.addtoCartFromAnywhere', function () {

            var id = $(this).attr('data-id');

            var data = {'id': id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "cart-ajaxaction",
                data: {'action': 'addtoCartFromAnywhere', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }
    return{
        addToCart: function () {
            getdata();
        },
        addToCartFromAnyWhere: function () {
            getdata2();
        }
    }
}();