<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use DB;

class product extends Model {

    protected $table = 'products';

    public function addProduct($request) {

        if ($request->file()) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('uploads/Product/');
            $image->move($destinationPath, $name);

            $objProduct = new product();
            $objProduct->img = $name;
            $objProduct->label = $request->input('label');
            $objProduct->name = $request->input('name');
            $objProduct->description = $request->input('description');
            $objProduct->price = $request->input('price');
            $objProduct->category = $request->input('category');

            $objProduct->created_at = date("Y-m-d h:i:s");
            $objProduct->updated_at = date("Y-m-d h:i:s");

            return $objProduct->save();
        } else {
            return false;
        }
    }

    public function editProduct($request, $id) {

        $objProduct = new product();
        $objProduct = product::find($id);
        if ($request->file()) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/Product/');
            $image->move($destinationPath, $name);
            $objProduct->img = $name;
        }
        $objProduct->label = $request->input('label');
        $objProduct->name = $request->input('name');
        $objProduct->description = $request->input('description');
        $objProduct->price = $request->input('price');
        $objProduct->category = $request->input('category');
        $objProduct->updated_at = date("Y-m-d h:i:s");
        return $objProduct->save();
    }

    public function getProduct() {
        $result = product::select('products.id', 'products.img', 'products.label', 'products.name', 'products.description', 'products.price', 'products.category','category.category_name')
                ->leftjoin("category", "category.id", "=", "products.category")
                ->get();
        return $result;
    }
    
    public function getIndexProduct() {
        $result = product::select('products.id', 'products.img', 'products.label', 'products.name', 'products.description', 'products.price', 'category.category_name')
                ->leftjoin("category", "category.id", "=", "products.category")
                ->limit(8)
                ->get();
        return $result;
    }
    
    public function getIndexSpecialProduct() {
        $result = product::select('products.id', 'products.img', 'products.label', 'products.name', 'products.description', 'products.price', 'category.category_name')
                ->leftjoin("category", "category.id", "=", "products.category")
                ->limit(6)
                ->get();
        return $result;
    }
    
    public function getIndexRandomeProduct() {
        $result = product::select('products.id', 'products.img', 'products.label', 'products.name', 'products.description', 'products.price', 'category.category_name')
                ->leftjoin("category", "category.id", "=", "products.category")
                ->inRandomOrder()
                ->limit(6)
                ->get();
        return $result;
    }
    
    public function deleteProduct($data) {
        $result = DB::table("products")
                ->where('id', $data['id'])
                ->delete();
        return $result;
    }

    public function get($request, $id) {
        $result = DB::table("products")
                ->where('id', $id)
                ->get();
        return $result;
    }

    public function getdatatable() {

        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'products.name',
            1 => 'products.label',
            2 => 'products.img',
            3 => 'products.description',
            4 => 'products.price',
            5 => 'category.category_name',
        );

        $query = product::from('products')
                ->leftjoin("category", "category.id", "=", "products.category")
                ->orderBy('products.id', 'ASC');
                
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
                ->select('products.id', 'products.img', 'products.label', 'products.name', 'products.description', 'products.price', 'category.category_name')
                ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $i++;
            $imagepath = url('public/uploads/product/' . $row['img']);
            $id = $row['id'];
            $label = $row['label'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $category_name = $row['category_name'];

            $actionhtml = '';

            $actionhtml = '<center><a href="' . route("updateproduct", $id) . '"><button class="btn btn-xs btn-info"><i class="fa fa-edit"></i></button></a>  '
                    . '<a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-xs btn-danger deleteUser" data-id="' . $row["id"] . '"><i class="fa fa-trash"></i></a>'
                    . '</center>';

            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center><img src="' . $imagepath . '"  alt="product-img" title="product-img" class="rounded mr-3" height="50"></center>';
            $nestedData[] = '<center>' . $label . '</center>';
            $nestedData[] = '<center>' . $name . '</center>';
            $nestedData[] = '<center>' . $description . '</center>';
            $nestedData[] = '<center>' . $price .'$'.'</center>';
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
