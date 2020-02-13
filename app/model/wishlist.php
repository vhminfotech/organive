<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;

class wishlist extends Model
{
    protected $table = 'wishlist';
    
    public function getWishlistItem($userid) {

        $result = wishlist::select('products.img', 'products.price', 'products.description', 'products.name', 'products.id','wishlist.productid','wishlist.userid')
                ->leftjoin('products', 'products.id', '=', 'wishlist.productid')
                ->where('wishlist.userid', $userid)
                ->get();
        return $result;
    }
    
    public function deleteWishlist($data) {

        $data = DB::table('wishlist')
                        ->where('productid', $data['id'])->delete();
        return $data;
    }
    
    public function clearWishlist($userid) {

        $data = DB::table('wishlist')
                        ->where('userid', $userid)->delete();
        return $data;
    }

    public function addtowishlist($userid, $id) {

        $findWishlist = wishlist::where('productid', $id)->where('userid', $userid)->first();
        if (!empty($findWishlist)) {
            $return = false;
        } else {
            $objWishlist = new wishlist();
            $objWishlist->productid = $id;
            $objWishlist->userid = $userid;
            $return = $objWishlist->save();
        }
        return $return;
    }
}
