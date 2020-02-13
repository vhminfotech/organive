@extends('backend.layout.app')
@section('content')

@foreach($products as $product)
@endforeach

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Update User</h3>
        </div>
        <div class="box-body">
            <form id="addProduct" name="addProduct" method="post" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <img src="{{asset('public/uploads/product/'.$product->img )}}" alt="Product-profile" title="Product-profile" class="rounded mr-3" height="50">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="img" name="img">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$product->name}}" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$product->price}}" id="price" name="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Label</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$product->label}}" id="label" name="label">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description...">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category" id="category">
                                    @foreach ($Categories as $category)  
                                    <option value="{{$category->id}}" {{$category->id == $product->category ? 'selected' : ''}}>{{$category->category_name}}</option>
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