@extends('backend.layout.app')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product List</h3>
                </div>
                <div class="box-footer">
                    <a href="{{route('addslider')}}"><button class="btn btn-lg btn-info pull-right">Add Slider</button></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="sliderlist" class="table table-bordered table-striped">{{ csrf_field() }}
                            <thead>
                                <tr align="center">
                                    <th>Id</th>
                                    <th>Slider Image</th>
                                    <th>Slider text</th>
                                    <th>Slider Title</th>
                                    <th>Slider description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection