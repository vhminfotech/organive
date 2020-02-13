<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request) {
        $data['title'] = "CrudAjax || Profile";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        $data['header'] = array(
            'title' => 'Admin Profile',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Admin-Profile' => 'Admin-Profile'));
        
        return view('backend.pages.profile.profile', $data);
    }
}
