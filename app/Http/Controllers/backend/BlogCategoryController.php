<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\blogCategory;

class BlogCategoryController extends Controller {

    public function __construct() {
        
    }

    public function blogCategorylist(Request $request) {

        $data['title'] = "CrudAjax || BlogCategorylist";
        $data['css'] = array("datatables.min.css");
        $data['plugincss'] = array();
        $data['pluginjs'] = array("vendor_components/datatables.net/js/jquery.dataTables.min.js",
            "vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js");
        $data['js'] = array("blogcategory_datatable.js");

        $data['funinit'] = array('Datatable.init();');
        $data['header'] = array(
            'title' => 'Blog-List',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Blog-List' => 'Blog-List'));

        return view('backend.pages.blogcategory.blogcategorylist', $data);
    }

    public function addblogcategory(Request $request) {

        if ($request->isMethod('post')) {
            $objBlogCategory = new blogCategory();
            $result = $objBlogCategory->addBlogCategory($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Blog Category Added successfully.';
                $return['redirect'] = route('blogcategorylist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Blog Category Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $data['title'] = "CrudAjax || Add-Category";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("blogcategory.js");
        $data['funinit'] = array("BlogCategory.init();");

        $data['header'] = array(
            'title' => 'Add Blog Category',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Category-List' => route("blogcategorylist"),
                'Add-Blog-Category' => 'Add-Blog-Category'));

        return view('backend.pages.blogcategory.addblogcategory', $data);
    }

    public function updateblogcategory(Request $request, $id) {

        if ($request->isMethod('post')) {

            $objBlogCategory = new blogCategory();
            $result = $objBlogCategory->updateBlogCategory($request, $id);

            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Blog Category Update successfully.';
                $return['redirect'] = route('blogcategorylist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Blog Category Not Added.';
            }
            echo json_encode($return);
            exit;
        }
        $objBlogCategory = new blogCategory();
        $data['blogcategories'] = $objBlogCategory->get($request, $id);

        $data['title'] = "CrudAjax || User-List";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("blogcategory.js");
        $data['funinit'] = array("BlogCategory.init();");
        $data['header'] = array(
            'title' => 'Update Category',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Category-List' => route("blogcategorylist"),
                'Update-Category' => 'Update-Category'));

        return view('backend.pages.blogcategory.updateblogcategory', $data);
    }

    public function datatableajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objBlogCategory = new blogCategory();
                $list = $objBlogCategory->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteBlogCategory':
                $data = $request->input('data');
                $objBlogCategory = new blogCategory();
                $res = $objBlogCategory->DeleteBlogCategory($data);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Category Deleted successfully.';
                    $return['redirect'] = route('blogcategorylist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Category Not Deleted.';
                }
                echo json_encode($return);
                break;
        }
    }

}
