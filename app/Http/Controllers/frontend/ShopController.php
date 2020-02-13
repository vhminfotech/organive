<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facade\Ignition\Http\Requests;
use App\model\product;
use DB;
use Session;
use App\model\Cart;
use App\model\wishlist;

class ShopController extends Controller {

    public function __construct() {

    }

    public function shop(Request $request) {

        $data2 = DB::table('products')->paginate(6);
        $data['title'] = 'CrudAjax || Shop';
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('wishlist.js','product.js');
        $data['funinit'] = array('Wishlist.addToWishlist();', 'Product.addToCartFromAnyWhere();');
        $data['css'] = array();

        $items = Session::get('logindata');
        $userid = $items[0]['id'];

        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);

        $objWishlist = new wishlist();
        $data['wishlist'] = $objWishlist->getWishlistItem($userid);

        return view('frontend.pages.shop', ['products'=>$data2], $data);
    }
}
