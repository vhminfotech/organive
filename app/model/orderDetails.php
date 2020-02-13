<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model {

    protected $table = "order_detail";

    public function createOrder($request, $cart) {

        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $orderid = substr(str_shuffle($data), 0, 6);

        $objOrderdetails = new OrderDetails();

        $objOrderdetails->orderid = $orderid;
        $objOrderdetails->firstname = $request->input('firstname');
        $objOrderdetails->lastname = $request->input('lastname');
        $objOrderdetails->address = $request->input('address');
        $objOrderdetails->city = $request->input('city');
        $objOrderdetails->state = $request->input('state');
        $objOrderdetails->country = $request->input('country');
        $objOrderdetails->pincode = $request->input('pincode');
        $objOrderdetails->phone = $request->input('phone');
        $objOrderdetails->email = $request->input('email');
        $objOrderdetails->created_at = date("Y-m-d h:i:s");
        $objOrderdetails->updated_at = date("Y-m-d h:i:s");
        $result = $objOrderdetails->save();
        if ($result) {
            for ($i = 0; $i < count($cart); $i++) {
                $objOrder = new Order();
                $objOrder->orderid = $orderid;
                $objOrder->productid = $cart[$i]->productid;
                $objOrder->userid = $cart[$i]->userid;
                $objOrder->quantity = $cart[$i]->quantity;
                $objOrder->created_at = date("Y-m-d h:i:s");
                $objOrder->updated_at = date("Y-m-d h:i:s");
                $result = $objOrder->save();
            }
        }
        return $result;
    }

}
