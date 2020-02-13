@extends('backend.layout.app')
@section('content')
<div class="col-12">
    <div class="box">
        <div class="box-body">{{ csrf_field() }}
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
<!--                            <th style="width: 10px">Id</th>-->
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Order ID</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i =0;
                        @endphp
                        @foreach($order as $value)
                        @php
                        $i++;
                        @endphp
                        <tr>
                            <td><img src="{{asset('public/uploads/product/'.$value->img )}}"  alt="order-img" title="order-img" class="rounded mr-3" height="100"></td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->orderid }}</td>
                            <td>{{ $value->price }}$</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ ($value->price)*($value->quantity) }}$</td>
                            @if($value->status == 'pending')
                            <td class="center">
                                <div class="btn-group">
                                    <a class='btn btn-info YES' style="color: white;" order-id='{{ $value->orderid }}'>Accept</a>
                                </div>
                            </td>
                            @elseif($value->status == 'confirm')
                            <td class="center">
                                <div class="btn-group">
                                    <a class='btn btn-success confirm' style="color: white;" order-id='{{ $value->orderid }}'>confirm</a>
                                </div>
                            </td>
                            @else
                            <td class="center">
                                <div class="btn-group">
                                    <a class='btn btn-danger' style="color: white;" order-id='{{ $value->orderid }}'>Delivered</a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 		 

@endsection