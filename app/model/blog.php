<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\blogComment;

class blog extends Model {

    protected $table = 'blog';

    public function addBlog($request) {

        if ($request->file()) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/Blog/');
            $image->move($destinationPath, $name);

            $objBlog = new blog();
            $objBlog->img = $name;
            $objBlog->title = $request->input('title');
            $objBlog->category = $request->input('category');
            $objBlog->author = $request->input('author');
            $objBlog->content = $request->input('content');
            $objBlog->created_at = date("Y-m-d h:i:s");
            $objBlog->updated_at = date("Y-m-d h:i:s");

            return $objBlog->save();
        } else {
            return false;
        }
    }
    
    public function comments() {
        return $this->hasMany('App\model\blogComment');
    }

    public function editBlog($request, $id) {

        $objBlog = new blog();
        $objBlog = blog::find($id);

        if ($request->file()) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/Blog/');
            $image->move($destinationPath, $name);
            $objBlog->img = $name;
        }
        $objBlog->title = $request->input('title');
        $objBlog->category = $request->input('category');
        $objBlog->author = $request->input('author');
        $objBlog->content = $request->input('content');
        $objBlog->updated_at = date("Y-m-d h:i:s");
        return $objBlog->save();
    }

    public function getBlog() {
        $result = blog::select('blog.id', 'blog.img', 'blog.title', 'blog.author', 'blog.content', 'blogcategory.blogcategory_name')
                ->leftjoin("blogcategory", "blogcategory.id", "=", "blog.category")
                
                ->get();
        return $result;
    }
    
    public function getIndexBlog() {
        $result = blog::select('id', 'img', 'title', 'author','created_at')
                ->limit(3)
                ->orderBy('id', 'DESC')
                ->get();
        return $result;
    }

    public function get($request, $id) {
        $result = blog::select('blog.id', 'blog.img', 'blog.title', 'blog.author', 'blog.content', 'blogcategory.blogcategory_name', 'blog.category', 'blog.updated_at')
                ->leftjoin("blogcategory", "blogcategory.id", "=", "blog.category")
                ->where('blog.id', $id)
                ->get();
        return $result;
    }

    public function getdatatable() {

        $requestData = $_REQUEST;
        $columns = array(
            // datatable column index  => database column name
            0 => 'blog.img',
            1 => 'blog.title',
            2 => 'blog.category',
            3 => 'blog.author',
            5 => 'blogcategory.blogcategory_name',
        );

        $query = product::from('blog')
                ->leftjoin("blogcategory", "blogcategory.id", "=", "blog.category")
                ->orderBy('blog.id', 'DESC');
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
                ->select('blog.id', 'blog.img', 'blog.title', 'blog.author', 'blog.content', 'blogcategory.blogcategory_name')
                ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $i++;
            $imagepath = url('public/uploads/Blog/' . $row['img']);
            $id = $row['id'];
            $title = $row['title'];
            $author = $row['author'];
            $content = $row['content'];
            $blogcategory_name = $row['blogcategory_name'];

            $actionhtml = '';

            $actionhtml = '<center><a href="' . route("updateblog", $id) . '"><button class="btn btn-xs btn-info"><i class="fa fa-edit"></i></button></a>  '
                    . '<a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-xs btn-danger deleteBlog" data-id="' . $row["id"] . '"><i class="fa fa-trash"></i></a>'
                    . '</center>';

            $nestedData = array();
            $nestedData[] = '<center>' . $i . '</center>';
            $nestedData[] = '<center><img src="' . $imagepath . '"  alt="blog-img" title="blog-img" class="rounded mr-3" height="50"></center>';
            $nestedData[] = '<center>' . $title . '</center>';
            $nestedData[] = '<center>' . $blogcategory_name . '</center>';
            $nestedData[] = '<center>' . $author . '</center>';
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
