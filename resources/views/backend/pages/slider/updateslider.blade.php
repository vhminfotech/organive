@extends('backend.layout.app')
@section('content')

@foreach($sliders as $slider)
@endforeach

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Update User</h3>
        </div>
        <div class="box-body">
            <form id="addSlider" name="addSlider" method="post" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <img src="{{asset('public/uploads/slider/'.$slider->img )}}" alt="Product-profile" title="Product-profile" class="rounded mr-3" height="50">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="img" name="img">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$slider->title}}" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Text</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$slider->text}}" id="text" name="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="sliderdescription" name="sliderdescription" placeholder="Slider Description...">{{$slider->sliderdescription}}</textarea>
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