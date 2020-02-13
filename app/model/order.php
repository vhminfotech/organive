<?php

namespace App\model;

use DB;
use Illuminate\Database\Eloquent\Model;

class order extends Model {

    protected $table = 'order';

    public function getOrdernew() {

        $result = Order::select('order.id', 'products.name', 'products.img', 'products.price', 'products.description', 'order.orderid', 'order.quantity', 'order.status')
                ->join('products', 'products.id', '=', 'order.productid')
                //->groupBy('order.orderid')
                ->orderBy('order.id', 'ASC')
                ->get();
        return $result;
    }

    public function changestatusOrder($orderid) {

        $result = DB::table('order')
                ->where('orderid', $orderid['id'])
                ->update(['status' => "confirm"]);
        return $result;
    }

    public function confirmStatus($orderid) {

        $result = DB::table('order')
                ->where('orderid', $orderid['id'])
                ->update(['status' => "delivered"]);
        return $result;
    }

    public function getOrder($userid) {
        $result = Order::select('products.name', 'products.img', 'products.price', 'products.description', 'order.orderid', 'order.quantity', 'order.status')
                ->join('products', 'products.id', '=', 'order.productid')
                ->where('order.userid', $userid)
                ->get();
        return $result;
    }
}