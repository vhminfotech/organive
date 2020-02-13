<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\order;

class OrderController extends Controller {

    public function order() {

        $objOrder = new Order();
        $data['order'] = $objOrder->getOrdernew();

        $data['title'] = "CrudAjax || Order";
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('vendor_components/datatables.net/js/jquery.dataTables.min.js',
            'vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
            'vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js');
        $data['js'] = array('pages/data-table.js','order.js');
        $data['funinit'] = array('Order.init()');
        $data['header'] = array(
            'title' => 'Order List',
            'breadcrumb' => array(
                'Home' => route("index"),
                'Order-List' => 'Order-List'));

        return view('backend.pages.order.order', $data);
    }

    public function ajaxaction(Request $request) {

        $orderid = $request->input('data');
        $action = $request->input('action');
        switch ($action) {
            case 'updatestatus':
                $orderid = $request->input('data');
                $objOrder = new order();
                $result = $objOrder->changestatusOrder($orderid);
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Order Confirm successfully';
                    $return['redirect'] = route('order');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Order Not Confirm';
                }
                return json_encode($return);
                break;

            case 'confirmstatus':
                $orderid = $request->input('data');
                $objOrder = new Order();
                $result = $objOrder->confirmStatus($orderid);
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Order Is Ready For Delevery...';
                    $return['redirect'] = route('order');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Order Not Confirm For Delevery';
                }

                return json_encode($return);
                break;
        }
    }

}
