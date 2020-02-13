<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\blogComment;
use App\model\blog;
use Validator;
use Session;
use App\model\Cart;

class BlogCommentController extends Controller {

    public function store(Request $request, $id) {

        $blog = blog::find($id);
        $comment = new blogComment();
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->comment = $request->input('comment');
        $comment->approved = true;
        $comment->blog()->associate($blog);
        $comment->created_at = date("Y-m-d h:i:s");
        $comment->updated_at = date("Y-m-d h:i:s");
        
        $result = $comment->save();

        if ($result) {
            $return['status'] = 'success';
            $return['message'] = 'Comment Added successfully.';
            $return['redirect'] = route('viewblog', $blog->id);
        } else {
            $return['status'] = 'error';
            $return['message'] = 'Record Not Added.';
        }
        echo json_encode($return);
        exit;
    }

}
