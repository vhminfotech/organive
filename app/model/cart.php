<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cart extends Model {

    protected $table = 'cart';

    public function addtocartnew($userid, $id, $quantity) {

        $findCart = Cart::where('productid', $id)->where('userid', $userid)->first();
        if (!empty($findCart)) {
            $return = false;
        } else {
            $objCart = new Cart();
            $objCart->productid = $id;
            $objCart->userid = $userid;
            $objCart->quantity = $quantity;
            $return = $objCart->save();
        }
        return $return;
    }
    
    public function addtoCartFromAnywhere($userid, $id) {

        $findCart = Cart::where('productid', $id)->where('userid', $userid)->first();
        if (!empty($findCart)) {
            $return = false;
        } else {
            $objCart = new Cart();
            $objCart->productid = $id;
            $objCart->userid = $userid;
            $return = $objCart->save();
        }
        return $return;
    }

    public function Addquantity($data) {
        $return = DB::table('cart')
                ->where('productid', $data['id'])
                ->update(['quantity' => $data['quantity']]);
        return $return;
    }

    public function getCartitem($userid) {

        $result = Cart::select('products.img', 'products.price', 'products.description', 'products.name', 'products.id', 'cart.quantity')
                ->leftjoin('products', 'products.id', '=', 'cart.productid')
                ->where('cart.userid', $userid)
                ->orderBy('cart.id', 'asc')
                ->get();
        return $result;
    }

    public function getCartDetails($userid) {

        $result = Cart::select('cart.id', 'cart.productid', 'cart.userid', 'cart.quantity')
                ->where('cart.userid', $userid)
                ->get();
        return $result;
    }

    public function deleteProduct($data) {

        $data = DB::table('cart')
                        ->where('productid', $data['id'])->delete();
        return $data;
    }

    public function deleteOrder($userid) {

        $data = DB::table('cart')
                        ->where('userid', $userid)->delete();
        return $data;
    }

}
