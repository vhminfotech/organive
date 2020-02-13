@extends('backend.layout.app')
@section('content')

@foreach($blogs as $blog)
@endforeach

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Update User</h3>
        </div>
        <div class="box-body">
            <form id="updateBlog" name="updateBlog" method="post" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Blog Image</label>
                            <div class="col-sm-10">
                                <img src="{{asset('public/uploads/Blog/'.$blog->img )}}" alt="Product-profile" title="Product-profile" class="rounded mr-3" height="50">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Change Blog Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="img" name="img">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$blog->title}}" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$blog->author}}" id="author" name="author">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="content" name="content" placeholder="content...">{{$blog->content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category" id="category">
                                    @foreach ($BlogCategories as $category) 
                                    <option value="{{$category->id}}" {{$category->id == $blog->category ? 'selected' : ''}}>{{$category->blogcategory_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-lg btn-info pull-right">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</div>

@endsection