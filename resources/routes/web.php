<?php

//register
Route::match(['get', 'post'], 'reg', ['as' => 'register', 'uses' => 'frontend\LoginController@register']);
//Login
Route::match(['get', 'post'], '/', ['as' => 'login', 'uses' => 'frontend\LoginController@login']);
//logout
Route::match(['get', 'post'], 'userlogout', ['as' => 'userlogout', 'uses' => 'frontend\LoginController@userLogout']);
Route::match(['get', 'post'], 'adminlogout', ['as' => 'adminlogout', 'uses' => 'frontend\LoginController@adminLogout']);


//frontend
$userPrefix = "user";
Route::group(['prefix' => $userPrefix, 'middleware' => ['user']], function() {
//index
Route::match(['get', 'post'], 'home', ['as' => 'home', 'uses' => 'frontend\IndexController@index']);
//view product
Route::match(['get', 'post'], 'viewProduct/{id}', ['as' => 'viewProduct', 'uses' => 'frontend\IndexController@viewProduct']);
});

//backend
$adminPrefix = "admin";
Route::group(['prefix' => $adminPrefix, 'middleware' => ['admin']], function() {
    

//index
Route::match(['get', 'post'], 'index', ['as' => 'index', 'uses' => 'backend\IndexController@index']);

//profile
Route::match(['get', 'post'], 'profile', ['as' => 'profile', 'uses' => 'backend\ProfileController@profile']);

//user
Route::match(['get', 'post'], 'userlist', ['as' => 'userlist', 'uses' => 'backend\UserController@userlist']);
Route::match(['get', 'post'], 'adduser', ['as' => 'adduser', 'uses' => 'backend\UserController@adduser']);
Route::match(['get', 'post'], 'updateuser/{id}', ['as' => 'updateuser', 'uses' => 'backend\UserController@updateUser']);

//category
Route::match(['get', 'post'], 'categorylist', ['as' => 'categorylist', 'uses' => 'backend\CategoryController@categorylist']);
Route::match(['get', 'post'], 'addcategory', ['as' => 'addcategory', 'uses' => 'backend\CategoryController@addcategory']);
Route::match(['get', 'post'], 'updatecategory/{id}', ['as' => 'updatecategory', 'uses' => 'backend\CategoryController@updatecategory']);

//product
Route::match(['get', 'post'], 'productlist', ['as' => 'productlist', 'uses' => 'backend\ProductController@productlist']);
Route::match(['get', 'post'], 'addproduct', ['as' => 'addproduct', 'uses' => 'backend\ProductController@addproduct']);
Route::match(['get', 'post'], 'updateproduct/{id}', ['as' => 'updateproduct', 'uses' => 'backend\ProductController@updateproduct']);

//Slider
Route::match(['get', 'post'], 'sliderlist', ['as' => 'sliderlist', 'uses' => 'backend\SliderController@sliderlist']);
Route::match(['get', 'post'], 'addslider', ['as' => 'addslider', 'uses' => 'backend\SliderController@addslider']);
Route::match(['get', 'post'], 'updateslider/{id}', ['as' => 'updateslider', 'uses' => 'backend\SliderController@updateslider']);

});

Route::match(['get', 'post'], 'user-datatable-ajaxAction', ['as' => 'user-datatable-ajaxAction', 'uses' => 'backend\UserController@datatableajaxAction']);
Route::match(['get', 'post'], 'user-ajaxAction', ['as' => 'user-ajaxAction', 'uses' => 'backend\UserController@ajaxAction']);
Route::match(['get', 'post'], 'category-datatable-ajaxAction', ['as' => 'category-datatable-ajaxAction', 'uses' => 'backend\CategoryController@datatableajaxAction']);
Route::match(['get', 'post'], 'product-datatable-ajaxAction', ['as' => 'product-datatable-ajaxAction', 'uses' => 'backend\ProductController@datatableajaxAction']);
Route::match(['get', 'post'], 'slider-datatable-ajaxAction', ['as' => 'slider-datatable-ajaxAction', 'uses' => 'backend\SliderController@datatableajaxAction']);
