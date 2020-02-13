@extends('backend.layout.app')
@section('content')

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Add Product</h3>
        </div>
        <div class="box-body">
            <form id="addSlider" name="addSlider" method="post" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="img" name="img">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Text</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="text" name="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="sliderdescription" name="sliderdescription" placeholder="Slider Description..."></textarea>
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