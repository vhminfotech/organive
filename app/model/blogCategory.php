<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;

class blogCategory extends Model
{
    protected $table = 'blogcategory';

    public function addBlogCategory($request) {

        $objBlogCategory = new blogCategory();
        $objBlogCategory->blogcategory_name = $request->input('blogcategory_name');
        $objBlogCategory->created_at = date("Y-m-d h:i:s");
        $objBlogCategory->updated_at = date("Y-m-d h:i:s");
        return $objBlogCategory->save();
    }
    
    public function updateBlogCategory($request, $id) {

        $objBlogCategory = new blogCategory();
        $objBlogCategory = blogCategory::find($id);
        $objBlogCategory->blogcategory_name = $request->input('blogcategory_name');
        $objBlogCategory->updated_at = date("Y-m-d h:i:s");
        return $objBlogCategory->save();
    }
    
    public function DeleteBlogCategory($data) {
        $result = DB::table("blogcategory")
                ->where('id', $data['id'])
                ->delete();
        return $result;
    }
    
     public function get($request, $id) {

        $result = blogCategory::select('*')
                ->where('id', $id)
                ->get();
        
        return $result;
    }
    
    public function blogCategory() {

        $result = blogCategory::select("*")
                ->get();
        return $result;
    }
    
    public function getdatatable() {

        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name

            0 => 'blogcategory_name',
        );

        $query = blogCategory::from('blogcategory');

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
                ->select('id', 'blogcategory_name')
                ->get();

        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $i++;
            $id = $row['id'];
            $blogcategory_name = $row['blogcategory_name'];

            $actionhtml = '';

            $actionhtml = '<center><a href="' . route("updateblogcategory", $id) . '"><button class="btn btn-xs btn-info"><i class="fa fa-edit"></i></button></a>  '
                    . '<a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-xs btn-danger deleteBlogCategory" data-id="' . $row["id"] . '"><i class="fa fa-trash"></i></a>'
                    . '</center>';

            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center>' . $blogcategory_name . '</center>';
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
