<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\category;

class CategoryController extends Controller {

    public function __construct() {
    }

    public function categorylist(Request $request) {
        
        $data['title'] = "CrudAjax || Category-List";
        $data['css'] = array("datatables.min.css");
        $data['plugincss'] = array();
        $data['pluginjs'] = array("vendor_components/datatables.net/js/jquery.dataTables.min.js",
            "vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"
        );
        $data['js'] = array("category_datatable.js");
        $data['funinit'] = array('Datatable.init();');
        $data['header'] = array(
            'title' => 'Category List',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Category-List' => 'Category-List'));

        return view('backend.pages.category.categorylist', $data);
    }

    public function addcategory(Request $request) {

        if ($request->isMethod('post')) {
            $objCategory = new category();
            $result = $objCategory->addCategory($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Category Added successfully.';
                $return['redirect'] = route('categorylist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Category Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $data['title'] = "CrudAjax || Add-Category";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("category.js");
        $data['funinit'] = array("Category.init();");
        $data['header'] = array(
            'title' => 'Add Category',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Category-List' => route("categorylist"),
                'Add-Category' => 'Add-Category'));

        return view('backend.pages.category.addcategory', $data);
    }
    
    public function updatecategory (Request $request, $id) {

        if ($request->isMethod('post')) {
            
            $objCategory = new category();
            $result = $objCategory->updateCategory($request, $id);
            
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Category Update successfully.';
                $return['redirect'] = route('categorylist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Category Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $objCategory = new category();
        $data['categories'] = $objCategory->get($request, $id);

        $data['title'] = "CrudAjax || User-List";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("category.js");
        $data['funinit'] = array("Category.init();");
        $data['header'] = array(
            'title' => 'Update Category',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Category-List' => route("categorylist"),
                'Update-Category' => 'Update-Category'));

        return view('backend.pages.category.updatecategory', $data);
    }
    
    public function datatableajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objCategory = new category();
                $list = $objCategory->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteCategory':
                $data = $request->input('data');
                $objCategory = new category();
                $res = $objCategory->deleteUser($data);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Category Deleted successfully.';
                    $return['redirect'] = route('categorylist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Category Not Deleted.';
                }
                echo json_encode($return);
                break;
        }
    }

}
