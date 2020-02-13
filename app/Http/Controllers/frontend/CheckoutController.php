<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Cart;
use App\model\orderDetails;
use Session;
use DB;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {

        $items = Session::get('logindata');
        $userid = $items[0]['id'];
        if ($request->isMethod('post')) {
            $objCart = new Cart();
            $cart = $objCart->getCartDetails($userid);
            
            $objOrderdetails = new orderDetails();
            $result = $objOrderdetails->createOrder($request, $cart);
            
            if ($result) {
                $objCart = new Cart();
                $cart = $objCart->deleteOrder($userid);
                $return['status'] = 'success';
                $return['message'] = 'Thanks for Ordering.';
                $return['redirect'] = route('myorder');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something Wrong';
            }
            return json_encode($return);
            exit;
        }
        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);
        $data['title'] = 'CrudAjax || Checkout';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        
        return view("frontend.pages.checkout", $data);
    }
}
