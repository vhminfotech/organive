<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\slider;
use App\model\category;
use App\model\product;
use App\model\blog;
use Session;
use App\model\Cart;
use App\model\wishlist;

class IndexController extends Controller
{
    public function index(Request $request) {
        
        $items = Session::get('logindata');
        $userid = $items[0]['id'];
        
        $data['title'] = "Organive || Index";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        
        $data['js'] = array('wishlist.js','product.js');
        $data['funinit'] = array('Wishlist.addToWishlist();', 'Product.addToCartFromAnyWhere();');
        
        $objProduct = new product();
        $data['products'] = $objProduct->getIndexProduct($request);
        
        $objProduct = new product();
        $data['randomeproducts'] = $objProduct->getIndexRandomeProduct($request);
        
        $objProduct = new product();
        $data['specialproducts'] = $objProduct->getIndexSpecialProduct($request);
        
        $objCategory = new category();
        $data['categories'] = $objCategory->Category($request);
        
        $objSlider = new slider();
        $data['sliders'] = $objSlider->getSlider($request);
        
        $objBlog = new blog();
        $data['blog'] = $objBlog->getIndexBlog($request);
        
        $objWishlist = new wishlist();
        $data['wishlist'] = $objWishlist->getWishlistItem($userid);
        
        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);
        
        return view('frontend.pages.index',$data);
    }
    
    public function viewProduct(Request $request, $id) {
        $data['title'] = "Organive || Index";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('product.js');
        $data['funinit'] = array('Product.addToCart()');
        
        $objProduct = new product();
        $data['products'] = $objProduct->get($request, $id);
        
        $items = Session::get('logindata');
        $userid = $items[0]['id'];
        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);
        
        return view('frontend.pages.singleproduct',$data);
}
}
