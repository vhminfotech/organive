<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\model\Cart;
use App\model\order;

class CartController extends Controller {

    public function cart(Request $request) {
        $items = Session::get('logindata');
        $userid = $items[0]['id'];
        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);
        $data['title'] = 'Organive || Cart';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('cart.js', 'checkout.js');
        $data['funinit'] = array('Cart.init()', 'Checkout.init()');
        return view("frontend.pages.cart", $data);
    }

    public function myorder() {

        $items = Session::get('logindata');
        $userid = $items[0]['id'];
        $objOrder = new order();
        $data['order'] = $objOrder->getOrder($userid);
        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);
        $data['title'] = 'CrudAjax || My Order';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();

        return view("frontend.pages.myorder", $data);
    }

    function ajaxaction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'addtocart':
                $data = $request->input('data');
                $items = Session::get('logindata');
                $userid = $items[0]['id'];
                $quantity = $data['quantity'];
                $id = $data['id'];
                $objCart = new Cart();
                $result = $objCart->addtocartnew($userid, $id, $quantity);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Product Added to Cart';
                    $return['redirect'] = route('cart');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Product already in cart';
                }

                return json_encode($return);
                break;

            case 'addtoCartFromAnywhere':

                $data = $request->input('data');
                
                $items = Session::get('logindata');
                $userid = $items[0]['id'];
                $id = $data['id'];
                
                $objCart = new Cart();
                $result = $objCart->addtoCartFromAnywhere($userid, $id);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Product Added to Cart';
                    $return['redirect'] = route('cart');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Product already in cart';
                }

                return json_encode($return);
                break;

            case 'addquantity':
                $data = $request->input('data');
                $items = Session::get('logindata');
                $userid = $items[0]['id'];
                $objCart = new Cart();
                $result = $objCart->Addquantity($data);
                if ($result) {
                    $return['redirect'] = route('cart');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Soething Wrong';
                }
                return json_encode($return);
                break;

            case 'deleteProduct':
                $data = $request->input('data');
                
                $objCart = new Cart();
                $result = $objCart->deleteProduct($data);
                
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Product Delete successfully from Cart';
                    $return['redirect'] = route('cart');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Product Not Remove';
                }

                return json_encode($return);
                break;
        }
    }

}
