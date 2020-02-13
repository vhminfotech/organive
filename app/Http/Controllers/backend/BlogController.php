<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\blog;
use App\model\blogCategory;

class BlogController extends Controller {

    public function __construct() {
        
    }

    

    public function bloglist(Request $request) {

        $data['title'] = "CrudAjax || Bloglist";
        $data['css'] = array("datatables.min.css");
        $data['plugincss'] = array();
        $data['pluginjs'] = array("vendor_components/datatables.net/js/jquery.dataTables.min.js",
            "vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js");
        $data['js'] = array("blog_datatable.js");

        $data['funinit'] = array('Datatable.init();');
        $data['header'] = array(
            'title' => 'Blog-List',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Blog-List' => 'Blog-List'));

        return view('backend.pages.blog.bloglist', $data);
    }

    public function addBlog(Request $request) {

        $objBlogCategory = new blogCategory();
        $data['Categories'] = $objBlogCategory->blogCategory($request);

        if ($request->isMethod('post')) {
            $objBlog = new blog();
            $result = $objBlog->addBlog($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Blog Added successfully.';
                $return['redirect'] = route('bloglist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Blog Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $data['title'] = "CrudAjax || User-List";
        $data['css'] = array();
        $data['plugincss'] = array("vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css");
        $data['pluginjs'] = array("vendor_components/ckeditor/ckeditor.js","vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js");
        $data['js'] = array("blog.js", "pages/editor.js");
        $data['funinit'] = array("Blog.init();");
        $data['header'] = array(
            'title' => 'Add Blog',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Blog-List' => route("bloglist"),
                'Add-Blog' => 'Add-Blog'));

        return view('backend.pages.blog.addblog', $data);
    }

    public function updateblog(Request $request, $id) {

        if ($request->isMethod('post')) {

            $objBlog = new blog();
            $result = $objBlog->editBlog($request, $id);

            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Blog Update successfully.';
                $return['redirect'] = route('bloglist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Product Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $objBlog = new blog();
        $data['blogs'] = $objBlog->get($request, $id);

        $objBlogCategory = new blogCategory();
        $data['BlogCategories'] = $objBlogCategory->blogCategory($request, $id);

        $data['title'] = "CrudAjax || Update-Product";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("blog.js");
        $data['funinit'] = array("Blog.update();");
        $data['header'] = array(
            'title' => 'Update Blog',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Blog-List' => route("bloglist"),
                'Update-Blog' => 'Update-Blog'));

        return view('backend.pages.blog.updateblog', $data);
    }

    public function datatableajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objBlog = new blog();
                $list = $objBlog->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteBlogCategory':
                $data = $request->input('data');
                $objBlogCategory = new blogCategory();
                $res = $objBlogCategory->DeleteBlogCategory($data);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Blog Deleted successfully.';
                    $return['redirect'] = route('bloglist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Blog Not Deleted.';
                }
                echo json_encode($return);
                break;
        }
    }

}
