<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\user;
use App\model\country;
use App\model\state;
use App\model\city;

class UserController extends Controller {

    public function __construct() {
        
    }

    public function userlist(Request $request) {

        $data['title'] = "CrudAjax || User-List";
        $data['css'] = array("datatables.min.css");
        $data['plugincss'] = array();
        $data['pluginjs'] = array("vendor_components/datatables.net/js/jquery.dataTables.min.js",
            "vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"
            );
        $data['js'] = array("user_datatable.js", "user.js");
        $data['funinit'] = array('Datatable.init();');
        $data['header'] = array(
            'title' => 'User List',
            'breadcrumb' => array(
                'Home' => route("index"),
                'User-List' => 'User-List'));

        return view('backend.pages.User.userlist', $data);
    }

    public function adduser(Request $request) {

        if ($request->isMethod('post')) {
            $objUser = new user();
            $result = $objUser->addUser($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Record Added successfully.';
                $return['redirect'] = route('userlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Record Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $objCountry = new country();
        $data['countries'] = $objCountry->Country($request);

        $data['title'] = "CrudAjax || User-List";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("user.js");
        $data['funinit'] = array("User.init();");
        $data['header'] = array(
            'title' => 'Add User',
            'breadcrumb' => array(
                'Home' => route("index"),
                'User-List' => route("userlist"),
                'Add-User' => 'Add-User'));

        return view('backend.pages.User.adduser', $data);
    }

    public function updateUser(Request $request, $id) {

        if ($request->isMethod('post')) {

            $objUser = new user();
            $result = $objUser->editUser($request, $id);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Record Update successfully.';
                $return['redirect'] = route('userlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Record Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $objUser = new User();
        $data['users'] = $objUser->get($request, $id);

        $objCountry = new country();
        $data['countries'] = $objCountry->Country($request, $id);

        $objState = new state();
        $data['states'] = $objState->get($data['users'][0]->country);

        $objCity = new city();
        $data['citys'] = $objCity->get($data['users'][0]->state);

        $data['title'] = "CrudAjax || User-List";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("user.js");
        $data['funinit'] = array("User.init();");
        $data['header'] = array(
            'title' => 'Update User',
            'breadcrumb' => array(
                'Home' => route("index"),
                'User-List' => route("userlist"),
                'Update-User' => 'Update-User'));

        return view('backend.pages.User.updateuser', $data);
    }

    public function ajaxAction(Request $request) {

        $action = $request->input('action');
        switch ($action) {

            case 'getstate':
                $objState = new state();
                $data = $objState->get($request->input('id'));
                echo json_encode($data);
                break;
        }

        switch ($action) {
            case 'getcity':
                $objCity = new city();
                $data = $objCity->get($request->input('id'));
                echo json_encode($data);
                break;
        }
    }

    public function datatableajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objUser = new user();
                $list = $objUser->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteUser':
                $data = $request->input('data');
                $objUser = new user();
                $res = $objUser->deleteUser($data);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Record Deleted successfully.';
                    $return['redirect'] = route('userlist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Record Not Deleted.';
                }
                echo json_encode($return);
                break;
        }
    }

}
