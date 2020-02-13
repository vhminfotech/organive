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
                    <a href="{{route('addproduct')}}"><button class="btn btn-lg btn-info pull-right">Add Product</button></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="productlist" class="table table-bordered table-striped">{{ csrf_field() }}
                            <thead>
                                <tr align="center">
                                    <th>Id</th>
                                    <th>Product Image</th>
                                    <th>label</th>
                                    <th>Product Name</th>
                                    <th>description</th>
                                    <th>price</th>
                                    <th>category</th>
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