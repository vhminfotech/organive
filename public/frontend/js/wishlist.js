var Wishlist = function () {

    var addToWishlistt = function () {

        $('body').on('click', '.addtowishlist', function () {
            var id = $(this).attr('data-id');

            var data = {'id': id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "wishlist-ajaxaction",
                data: {'action': 'addtowishlist', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        $('body').on('click', '.removefromwishlist', function () {

            var id = $(this).attr('data-id');

            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "wishlist-ajaxaction",
                data: {'action': 'removeWishlistFromAnywhere', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
    }

    var removeFromWishlistt = function () {
       
        
        $('body').on('click', '.removefromwishlist', function () {
           
            var id = $(this).data('id');

            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        });

        $('body').on('click', '.yes-sure', function () {

            var id = $(this).attr('data-id');

            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "wishlist-ajaxaction",
                data: {'action': 'removeFromWishlist', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });

        //this is clear



        $('body').on('click', '.clear', function () {

            var id = $(this).attr('data-id');

            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "wishlist-ajaxaction",
                data: {'action': 'ClearWishlist', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });

    }
    return{
        addToWishlist: function () {
            addToWishlistt();
        },
        removeFromWishlist: function () {
            removeFromWishlistt();
        }
    }
}();