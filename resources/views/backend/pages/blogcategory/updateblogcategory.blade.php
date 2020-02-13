@extends('backend.layout.app')
@section('content')

@foreach($blogcategories as $category)
@endforeach

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Update Blog Category</h3>
        </div>
        <div class="box-body">
            <form id="addBlogCategory" name="addBlogCategory" method="post">@csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$category->blogcategory_name}}" id="blogcategory_name" name="blogcategory_name">
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