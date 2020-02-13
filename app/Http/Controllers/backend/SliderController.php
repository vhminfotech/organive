<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\slider;

class SliderController extends Controller
{
    public function __construct() {
        
    }
    
    public function sliderlist(Request $request) {
        
         $data['title'] = "CrudAjax || Slider-List";
        $data['css'] = array("datatables.min.css");
        $data['plugincss'] = array();
        $data['pluginjs'] = array("vendor_components/datatables.net/js/jquery.dataTables.min.js",
            "vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"
        );
        $data['js'] = array("slider_datatable.js");
        $data['funinit'] = array('Datatable.init();');
        $data['header'] = array(
            'title' => 'Slider List',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Slider-List' => 'Slider-List'));

        return view('backend.pages.slider.sliderlist', $data);
    }
    
    public function addslider (Request $request) {

        if ($request->isMethod('post')) {
            $objSlider = new slider();
            $result = $objSlider->addslider($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Record Added successfully.';
                $return['redirect'] = route('sliderlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Record Not Added.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = "CrudAjax || Add-Slider";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("slider.js");
        $data['funinit'] = array("Slider.init();");
        $data['header'] = array(
            'title' => 'Add Slider',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Slider-List' => route("sliderlist"),
                'Add-Slider' => 'Add-Slider'));

        return view('backend.pages.slider.addslider', $data);
    }
    
    public function updateslider(Request $request, $id) {

        if ($request->isMethod('post')) {

            $objSlider = new slider();
            $result = $objSlider->editSlider($request, $id);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Record Update successfully.';
                $return['redirect'] = route('sliderlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Record Not Added.';
            }
            echo json_encode($return);
            exit;
        }

        $objSlider = new slider();
        $data['sliders'] = $objSlider->get($request, $id);

        $data['title'] = "CrudAjax || Add-Slider";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array("slider.js");
        $data['funinit'] = array("Slider.init();");
        $data['header'] = array(
            'title' => 'Add Slider',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Slider-List' => route("sliderlist"),
                'Add-Slider' => 'Add-Slider'));

        return view('backend.pages.slider.updateslider', $data);
    }
    
     public function datatableajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {

            case 'getdatatable':
                $objSlider = new slider();
                $list = $objSlider->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteSlider':
                $data = $request->input('data');
                $objSlider = new slider();
                $res = $objSlider->deleteSlider($data);
                if ($res) {
                    $return['status'] = 'success';
                    $return['message'] = 'Record Deleted successfully.';
                    $return['redirect'] = route('sliderlist');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Record Not Deleted.';
                }
                echo json_encode($return);
                break;
        }
    }
    
    
}
