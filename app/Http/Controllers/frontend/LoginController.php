<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\user;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\model\sendMail;
use App\model\SendSMS;

class LoginController extends Controller {

    public function __construct() {

    }
    public function login(Request $request) {
        if ($request->isMethod('post')) {

            if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'usertype' => 'admin'])) {
                $loginData = array(
                    'name' => Auth::guard('admin')->user()->name,
                    'email' => Auth::guard('admin')->user()->email,
                    'type' => Auth::guard('admin')->user()->type,
                    'userimg' => Auth::guard('admin')->user()->user_image,
                    'id' => Auth::guard('admin')->user()->id
                );
                Session::push('logindata', $loginData);
                $return['status'] = 'success';
                $return['message'] = "Well Done login Successfully!";
                $return['redirect'] = route('index');
            } else if (Auth::guard('user')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'usertype' => 'user'])) {
                $loginData = array(
                    'name' => Auth::guard('user')->user()->name,
                    'email' => Auth::guard('user')->user()->email,
                    'type' => Auth::guard('user')->user()->type,
                    'userimg' => Auth::guard('user')->user()->user_image,
                    'id' => Auth::guard('user')->user()->id
                );
                Session::push('logindata', $loginData);
                $return['status'] = 'success';
                $return['message'] = "Well Done login Successfully!";
                $return['redirect'] = route('home');
            } else {
                $return['status'] = 'error';
                $return['message'] = "Invaild Id Or Password";
            }
            return json_encode($return);
            exit();
        }
        $data['title'] = 'Organive || Login';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init()');
        return view('frontend.pages.login', $data);
    }

    public function register(Request $request) {
        if ($request->isMethod('post')) {
            $objUser = new user();
            $result = $objUser->register($request);

            if ($result) {
                $objSendSms = new SendSMS();
                $sendSMS = $objSendSms->sendMailltesting($request);

                $return['status'] = 'success';
                $return['message'] = 'Register successfully.';
                $return['redirect'] = route('login');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Record Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $data['title'] = "Organive || Register";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init();');

        return view('frontend.pages.register', $data);
    }

    public function forgotpassword(Request $request) {

        if ($request->isMethod('post')) {
            $objUser = new user();
            $getCustomer = $objUser->passwordReset($request->input('email'));

            if ($getCustomer) {
                $return['status'] = 'success';
                $return['message'] = 'Password sent to your e-mail, check and login with it.';
                $return['redirect'] = route('login');
            } else {
                $return['status'] = 'error';
                $return['message'] = "E-mail doesn't exists!";
            }
            echo json_encode($return);
            exit;
        }

        $data['title'] = 'Forget-password';
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.init()');
        $data['css'] = array('');

        return view('frontend.pages.forget-password', $data);
    }

    public function userLogout() {
        $this->resetUserGuard();
        return redirect()->route('login');
    }

    public function adminLogout() {
        $this->resetAdminGuard();
        return redirect()->route('login');
    }

    public function resetUserGuard() {
        Auth::logout();
        Auth::guard('user')->logout();
        Session::forget('logindata');
        Session::forget('cart');
    }

    public function resetAdminGuard() {
        Auth::logout();
        Auth::guard('admin')->logout();
        Session::forget('logindata');
    }
}
