@extends('backend.layout.app')
@section('content')

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Add Product</h3>
        </div>
        <div class="box-body">
            <form id="categorylist" name="categorylist" method="post">@csrf
                <div class="row">
                    <div class="col-12">
                        
<!--                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category Id</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="category_id" name="category_id">
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="category_name" name="category_name">
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