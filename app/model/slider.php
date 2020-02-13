<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;

class slider extends Model {

    protected $table = 'slider';

    public function addSlider($request) {

        if ($request->file()) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/Slider/');
            $image->move($destinationPath, $name);

            $objSlider = new slider();
            $objSlider->img = $name;
            $objSlider->title = $request->input('title');
            $objSlider->text = $request->input('text');
            $objSlider->sliderdescription = $request->input('sliderdescription');
            $objSlider->created_at = date("Y-m-d h:i:s");
            $objSlider->updated_at = date("Y-m-d h:i:s");

            return $objSlider->save();
        } else {
            return false;
        }
    }

    public function editSlider($request, $id) {

        $objSlider = new slider();
        $objSlider = slider::find($id);
        if ($request->file()) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/Slider/');
            $image->move($destinationPath, $name);
            $objSlider->img = $name;
        }
        $objSlider->title = $request->input('title');
        $objSlider->text = $request->input('text');
        $objSlider->sliderdescription = $request->input('sliderdescription');
        $objSlider->updated_at = date("Y-m-d h:i:s");
        return $objSlider->save();
    }

    public function get($request, $id) {
        $result = DB::table("slider")
                ->where('id', $id)
                ->get();
        return $result;
    }
    
    public function getSlider($request) {
        $result = DB::table("slider")
                ->get();
        return $result;
    }
    
    public function deleteSlider($data) {
        $result = DB::table("slider")
                ->where('id', $data['id'])
                ->delete();
        return $result;
    }

    public function getdatatable() {

        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name

            0 => 'img',
            1 => 'title',
            2 => 'text',
            3 => 'sliderdescription',
        );

        $query = slider::from('slider');

        if (!empty($requestData['search']['value'])) {
            // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                $flag = 0;
                foreach ($columns as $key => $value) {
                    $searchVal = $requestData['search']['value'];
                    if ($requestData['columns'][$key]['searchable'] == 'true') {
                        if ($flag == 0) {
                            $query->where($value, 'like', '%' . $searchVal . '%');
                            $flag = $flag + 1;
                        } else {
                            $query->orWhere($value, 'like', '%' . $searchVal . '%');
                        }
                    }
                }
            });
        }
        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                ->take($requestData['length'])
                ->select('id', 'img', 'text', 'title', 'sliderdescription')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $i++;
            $imagepath = url('public/uploads/slider/' . $row['img']);
            $id = $row['id'];
            $text = $row['text'];
            $title = $row['title'];
            $sliderdescription = $row['sliderdescription'];

            $actionhtml = '';

            $actionhtml = '<center><a href="' . route("updateslider", $id) . '"><button class="btn btn-xs btn-info"><i class="fa fa-edit"></i></button></a>  '
                    . '<a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-xs btn-danger deleteSlider" data-id="' . $row["id"] . '"><i class="fa fa-trash"></i></a>'
                    . '</center>';

            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center><img src="' . $imagepath . '"  alt="Slider-img" title="Slider-img" class="rounded mr-3" height="50"></center>';
            $nestedData[] = '<center>' . $text . '</center>';
            $nestedData[] = '<center>' . $title . '</center>';
            $nestedData[] = '<center>' . $sliderdescription . '</center>';
            $nestedData[] = $actionhtml;
            $data[] = $nestedData;
        }
        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

}
