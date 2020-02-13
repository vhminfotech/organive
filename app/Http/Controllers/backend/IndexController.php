<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller {

    public function __construct() {
        
    }

    public function index(Request $request) {
        $data['title'] = "CrudAjax || Index";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array("vendor_components/raphael/raphael.min.js","vendor_components/morris.js/morris.min.js");
        $data['js'] = array("pages/dashboard.js");
        $data['funinit'] = array();
        $data['header'] = array(
            'title' => 'Dashboard',
            'breadcrumb' => array(
                'Home' => "Home"));

        return view('backend.pages.index', $data);
    }

}
