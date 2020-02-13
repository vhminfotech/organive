<?php

Route::get('clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode1 = Artisan::call('route:clear');
    $exitCode2 = Artisan::call('config:clear');
    $exitCode3 = Artisan::call('view:clear');
    return '<h1>cache route config view cleared</h1>';
});

Route::match(['get', 'post'], '/', ['as' => 'home', 'uses' => 'frontend\IndexController@index']);
Route::match(['get', 'post'], 'login', ['as' => 'login', 'uses' => 'frontend\LoginController@login']);
Route::match(['get', 'post'], 'register', ['as' => 'register', 'uses' => 'frontend\LoginController@register']);
Route::match(['get', 'post'], 'forgot-password', ['as' => 'forgot-password', 'uses' => 'frontend\LoginController@forgotpassword']);
Route::match(['get', 'post'], 'shop', ['as' => 'shop', 'uses' => 'frontend\ShopController@shop']);
Route::match(['get', 'post'], 'blog', ['as' => 'blog', 'uses' => 'frontend\BlogController@blog']);
Route::match(['get', 'post'], 'viewblog/{id}', ['as' => 'viewblog', 'uses' => 'frontend\BlogController@viewBlog']);
Route::match(['get', 'post'], 'viewProduct/{id}', ['as' => 'viewProduct', 'uses' => 'frontend\IndexController@viewProduct']);

$userPrefix = "user";
Route::group(['prefix' => $userPrefix, 'middleware' => ['user']], function () {

    Route::match(['get', 'post'], 'userlogout', ['as' => 'userlogout', 'uses' => 'frontend\LoginController@userLogout']);
    Route::match(['get', 'post'], 'comments/{blog_id}', ['as' => 'comments', 'uses' => 'frontend\BlogCommentController@store']);
    Route::match(['get', 'post'], 'blogpage/{id}', ['as' => 'blogpage', 'uses' => 'frontend\BlogController@art']);
    Route::match(['get', 'post'], 'cart', ['as' => 'cart', 'uses' => 'frontend\CartController@cart']);
    Route::match(['get', 'post'], 'checkout', ['as' => 'checkout', 'uses' => 'frontend\CheckoutController@checkout']);
    Route::match(['get', 'post'], 'myorder', ['as' => 'myorder', 'uses' => 'frontend\CartController@myorder']);
    Route::match(['get', 'post'], 'wishlist', ['as' => 'wishlist', 'uses' => 'frontend\WishlistController@wishlist']);
});

$adminPrefix = "admin";
Route::group(['prefix' => $adminPrefix, 'middleware' => ['admin']], function () {

    Route::match(['get', 'post'], 'index', ['as' => 'index', 'uses' => 'backend\IndexController@index']);
    Route::match(['get', 'post'], 'profile', ['as' => 'profile', 'uses' => 'backend\ProfileController@profile']);

    Route::match(['get', 'post'], 'pagination', ['as' => 'pagination', 'uses' => 'backend\ProductController@pagination']);

    Route::match(['get', 'post'], 'userlist', ['as' => 'userlist', 'uses' => 'backend\UserController@userlist']);
    Route::match(['get', 'post'], 'adduser', ['as' => 'adduser', 'uses' => 'backend\UserController@adduser']);
    Route::match(['get', 'post'], 'updateuser/{id}', ['as' => 'updateuser', 'uses' => 'backend\UserController@updateUser']);

    Route::match(['get', 'post'], 'categorylist', ['as' => 'categorylist', 'uses' => 'backend\CategoryController@categorylist']);
    Route::match(['get', 'post'], 'addcategory', ['as' => 'addcategory', 'uses' => 'backend\CategoryController@addcategory']);
    Route::match(['get', 'post'], 'updatecategory/{id}', ['as' => 'updatecategory', 'uses' => 'backend\CategoryController@updatecategory']);

    Route::match(['get', 'post'], 'productlist', ['as' => 'productlist', 'uses' => 'backend\ProductController@productlist']);
    Route::match(['get', 'post'], 'addproduct', ['as' => 'addproduct', 'uses' => 'backend\ProductController@addproduct']);
    Route::match(['get', 'post'], 'updateproduct/{id}', ['as' => 'updateproduct', 'uses' => 'backend\ProductController@updateproduct']);

    Route::match(['get', 'post'], 'sliderlist', ['as' => 'sliderlist', 'uses' => 'backend\SliderController@sliderlist']);
    Route::match(['get', 'post'], 'addslider', ['as' => 'addslider', 'uses' => 'backend\SliderController@addslider']);
    Route::match(['get', 'post'], 'updateslider/{id}', ['as' => 'updateslider', 'uses' => 'backend\SliderController@updateslider']);


    Route::match(['get', 'post'], 'bloglist', ['as' => 'bloglist', 'uses' => 'backend\BlogController@bloglist']);
    Route::match(['get', 'post'], 'addblog', ['as' => 'addblog', 'uses' => 'backend\BlogController@addblog']);
    Route::match(['get', 'post'], 'updateblog/{id}', ['as' => 'updateblog', 'uses' => 'backend\BlogController@updateblog']);


    Route::match(['get', 'post'], 'blogcategorylist', ['as' => 'blogcategorylist', 'uses' => 'backend\BlogCategoryController@blogCategorylist']);
    Route::match(['get', 'post'], 'addblogcategory', ['as' => 'addblogcategory', 'uses' => 'backend\BlogCategoryController@addblogcategory']);
    Route::match(['get', 'post'], 'updateblogcategory/{id}', ['as' => 'updateblogcategory', 'uses' => 'backend\BlogCategoryController@updateblogcategory']);


    Route::match(['get', 'post'], 'adminlogout', ['as' => 'adminlogout', 'uses' => 'frontend\LoginController@adminlogout']);
    Route::match(['get', 'post'], 'order', ['as' => 'order', 'uses' => 'backend\OrderController@order']);


});

Route::match(['get', 'post'], 'user-ajaxAction', ['as' => 'user-ajaxAction', 'uses' => 'backend\UserController@ajaxAction']);
Route::match(['get', 'post'], 'user-datatable-ajaxAction', ['as' => 'user-datatable-ajaxAction', 'uses' => 'backend\UserController@datatableajaxAction']);
Route::match(['get', 'post'], 'category-datatable-ajaxAction', ['as' => 'category-datatable-ajaxAction', 'uses' => 'backend\CategoryController@datatableajaxAction']);
Route::match(['get', 'post'], 'product-datatable-ajaxAction', ['as' => 'product-datatable-ajaxAction', 'uses' => 'backend\ProductController@datatableajaxAction']);
Route::match(['get', 'post'], 'slider-datatable-ajaxAction', ['as' => 'slider-datatable-ajaxAction', 'uses' => 'backend\SliderController@datatableajaxAction']);
Route::match(['get', 'post'], 'blog-datatable-ajaxAction', ['as' => 'blog-datatable-ajaxAction', 'uses' => 'backend\BlogController@datatableajaxAction']);
Route::match(['get', 'post'], 'blogcategory-datatable-ajaxAction', ['as' => 'blogcategory-datatable-ajaxAction', 'uses' => 'backend\BlogCategoryController@datatableajaxAction']);
Route::match(['get', 'post'], 'cart-ajaxaction', ['as' => 'cart-ajaxaction', 'uses' => 'frontend\CartController@ajaxaction']);
Route::match(['get', 'post'], 'order-ajaxaction', ['as' => 'order-ajaxaction', 'uses' => 'backend\OrderController@ajaxaction']);
Route::match(['get', 'post'], 'wishlist-ajaxaction', ['as' => 'wishlist-ajaxaction', 'uses' => 'frontend\WishlistController@ajaxaction']);
