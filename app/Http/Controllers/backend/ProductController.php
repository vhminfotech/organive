<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\product;
use App\model\category;
use DB;

class ProductController extends Controller {

    public function __construct() {
    }
    
    public function pagination() {
        
        $data['title'] = "CrudAjax || Pagination";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        $data['header'] = array(
            'title' => 'Pagination',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Pagination' => 'Pagination'));
        
        $data2 =  DB::table('products')->paginate(1);

        return view('backend.pages.pagination', ['data'=>$data2], $data);
    }

    public function productlist(Request $request) {

        $data['title'] = "CrudAjax || Product-List";
        $data['css'] = array("datatables.min.css");
        $data['plugincss'] = array();
        $data['pluginjs'] = array("vendor_components/datatables.net/js/jquery.dataTables.min.js",
            "vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"
        );
        $data['js'] = array("product_datatable.js");
        $data['funinit'] = array('Datatable.init();');
        $data['header'] = array(
            'title' => 'Product List',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Product-List' => 'Product-List'));

        return view('backend.pages.product.productlist', $data);
    }

    public function addproduct(Request $request) {

        $objCategory = new category();
        $data['Categories'] = $objCategory->Category($request);

        if ($request->isMethod('post')) {
            $objProduct = new product();
            $result = $objProduct->addProduct($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'product Added successfully.';
                $return['redirect'] = route('productlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Record Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $data['title'] = "CrudAjax || Add-Product";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("product.js");
        $data['funinit'] = array("Product.init();");
        $data['header'] = array(
            'title' => 'Add Product',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Product-List' => route("productlist"),
                'Add-Product' => 'Add-Product'));

        return view('backend.pages.product.addproduct', $data);
    }

    public function updateProduct(Request $request, $id) {

        if ($request->isMethod('post')) {

            $objProduct = new product();
            $result = $objProduct->editProduct($request, $id);

            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Product Update successfully.';
                $return['redirect'] = route('productlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Product Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $objProduct = new product();
        $data['products'] = $objProduct->getProduct($request);

        $objCategory = new category();
        $data['Categories'] = $objCategory->Category($request);

        $data['title'] = "CrudAjax || Update-Product";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("product.js");
        $data['funinit'] = array("Product.init();");
        $data['header'] = array(
            'title' => 'Update Product',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Product-List' => route("productlist"),
                'Update-Product' => 'Update-Product'));

        return view('backend.pages.product.updateproduct', $data);
    }

    public function datatableajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objProduct = new product();
                $list = $objProduct->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteProduct':
                $data = $request->input('data');
                $objProduct = new product();
                $res = $objProduct->deleteProduct($data);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Product Deleted successfully.';
                    $return['redirect'] = route('productlist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Product Not Deleted.';
                }
                echo json_encode($return);
                break;
        }
    }

}
