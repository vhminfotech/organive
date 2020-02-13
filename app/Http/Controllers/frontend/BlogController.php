<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\blog;
use DB;
use Session;
use App\model\Cart;

class BlogController extends Controller {

    public function __construct() {
        
    }

    public function blog(Request $request) {


        $data['title'] = 'Organive || Blog';
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        $data['css'] = array();
        
        $items = Session::get('logindata');
        $userid = $items[0]['id'];
        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);

        $data2 = DB::table('blog')->orderBy('id', 'DESC')->paginate(2);

        return view('frontend.pages.blog', ['blog' => $data2], $data);
    }

    public function viewBlog(Request $request, $id) {
        $data['title'] = "Organive || Blog";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('comment.js');
        $data['funinit'] = array('Comment.init();');

        $objBlog = new blog();
        $data['blogs'] = $objBlog->get($request, $id);
        
        $items = Session::get('logindata');
        $userid = $items[0]['id'];
        $objCart = new Cart();
        $data['cart'] = $objCart->getCartitem($userid);

        return view('frontend.pages.singleblog', $data);
    }

}
