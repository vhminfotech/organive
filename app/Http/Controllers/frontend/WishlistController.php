<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\model\Cart;
use App\model\wishlist;

class WishlistController extends Controller {

    public function wishlist(Request $request) {

        $items = Session::get('logindata');
        $userid = $items[0]['id'];

        $data['title'] = 'CrudAjax || Wishlist';
        $data['plugincss'] = array();
        $data['pluginjs'] = array();

        $data['js'] = array('wishlist.js','product.js');
        $data['funinit'] = array('Wishlist.removeFromWishlist()','Product.addToCartFromAnyWhere()');

        $data['css'] = array();

        $objWishlist = new wishlist();
        $data['wishlist'] = $objWishlist->getWishlistItem($userid);

        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);

        return view('frontend.pages.wishlist', $data);
    }

    function ajaxaction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'addtowishlist':
                $data = $request->input('data');
                $items = Session::get('logindata');
                $userid = $items[0]['id'];
                $id = $data['id'];
                $objWishlist = new wishlist();
                $result = $objWishlist->addtowishlist($userid, $id);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Product Added to Wishlist';
                    $return['redirect'] = route('wishlist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Product already in Wishlist';
                }
                return json_encode($return);
                break;


            case 'removeFromWishlist':
                $data = $request->input('data');
                $objWishlist = new wishlist();
                $result = $objWishlist->deleteWishlist($data);
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Product Removed successfully from Wishlist';
                    $return['redirect'] = route('wishlist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Product Not Remove';
                }

                return json_encode($return);
                break;

            case 'removeWishlistFromAnywhere':
                $data = $request->input('data');
                $objWishlist = new wishlist();
                $result = $objWishlist->deleteWishlist($data);
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Product Removed successfully from Wishlist';
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Product Not Remove';
                }

                return json_encode($return);
                break;

            case 'ClearWishlist':

                $data = $request->input('data');

                $items = Session::get('logindata');
                $userid = $items[0]['id'];

                $objWishlist = new wishlist();
                $result = $objWishlist->clearWishlist($userid);
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Wishlist Cleared successfully';
                    $return['redirect'] = route('wishlist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Wishlist Not Cleared';
                }

                return json_encode($return);
                break;
        }
    }

}
