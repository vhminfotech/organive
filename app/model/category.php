<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;

class category extends Model {

    protected $table = 'category';

    public function addCategory($request) {

        $objCategory = new category();
        $objCategory->category_name = $request->input('category_name');
        $objCategory->created_at = date("Y-m-d h:i:s");
        $objCategory->updated_at = date("Y-m-d h:i:s");

        return $objCategory->save();
    }

    public function updateCategory($request, $id) {

        $objCategory = new category();
        $objCategory = category::find($id);
        $objCategory->category_name = $request->input('category_name');
        $objCategory->updated_at = date("Y-m-d h:i:s");
        return $objCategory->save();
    }

    public function DeleteUser($data) {
        $result = DB::table("category")
                ->where('id', $data['id'])
                ->delete();
        return $result;
    }

    public function get($request, $id) {

        $result = category::select('*')
                ->where('id', $id)
                ->get();
        return $result;
    }

    public function Category() {

        $result = category::select("*")
                ->get();

        return $result;
    }

    public function getdatatable() {

        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name

            0 => 'category_name',
        );

        $query = category::from('category');

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
                ->select('id', 'category_name')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $i++;
            $id = $row['id'];
            $category_name = $row['category_name'];

            $actionhtml = '';

            $actionhtml = '<center><a href="' . route("updatecategory", $id) . '"><button class="btn btn-xs btn-info"><i class="fa fa-edit"></i></button></a>  '
                    . '<a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-xs btn-danger deleteCategory" data-id="' . $row["id"] . '"><i class="fa fa-trash"></i></a>'
                    . '</center>';

            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $category_name . '</center>';
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
