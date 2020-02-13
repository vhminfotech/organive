@extends('frontend.layout.app')
@section('content')

@if(count($cart) == 0)
<div class="bg0 p-t-30 p-b-50">{{ csrf_field() }}
    <div class="container">
        <div class="how-bor4 p-t-35 p-b-40 p-rl-30 m-t-5">


            <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                <span>
                    Please add some product and come again
                </span>
            </div>
            <a href="{{route('shop')}}" <button class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10">
                    Shop Now
                </button></a>
        </div>
    </div>
    @else

    <!-- content page -->
    <div class="bg0 p-t-30 p-b-50">{{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-lg-12 p-b-50">
                    <div class="how-bor4 p-t-35 p-b-40 p-rl-30 m-t-5">
                        <h4 class="txt-m-124 cl3 p-b-11">
                            Your order
                        </h4>
                        <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                            <span>
                                Product
                            </span>
                        </div>
                        <!--  -->
                        @php $subtotal = 0; $ship = 50; @endphp
                        @for($i=0; $i < count($cart); $i++)
                        @php
                        $total = "";
                        $total = ($cart[$i]->price)*($cart[$i]->quantity);
                        $subtotal = ($subtotal + $total);
                        @endphp
                        <style>
                            a{color:#666666;}
                        </style>
                        <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                            <span>
                                <img class="m-rl-3" src="{{asset('public/uploads/product/'.$cart[$i]->img )}}" style="hight:100px; width: 100px;" alt="icon">
                            </span>
                            <span>
                                <a href="{{ route('viewProduct', $cart[$i]->id) }}">{{$cart[$i]->name}}</a>
                            </span>
                            <span>
                                <div class="pro-qty wrap-num-product flex-w flex-m bg12 p-rl-10 m-r-30 m-b-30"
                                     id='multiple' data-productid ="{{ $cart[$i]->id }}" data-productrate="{{ $cart[$i]->price }}">
                                    <div class="btn-num-product-down flex-c-m fs-29 qtybtn"></div>
                                    <input type="text" min="0.00000001" class="txt-m-102 cl6 txt-center num-product quantity" value="{{ $cart[$i]->quantity }}">
                                    <div class="btn-num-product-up flex-c-m fs-16 qtybtn"></div>
                                </div>
                            </span>
                            <span>
                                {{$total}}$
                            </span>
                            <div class="size-w-14 flex-b">
                                <a data-toggle="modal" data-target="#deletemodal" data-id="{{$cart[$i]->id}}" class="lh-10 delete">
                                    <img src="{{asset('public/frontend/images/icons/icon-close.png')}}" alt="CLOSE">
                                </a>
                            </div>
                        </div>
                        @endfor

                        <div class="flex-w flex-m txt-m-103 p-tb-23">
                            <span class="size-w-61 cl6">
                                Total
                            </span>
                            <span class="size-w-62 cl10">
                                {{$subtotal}}$
                            </span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="post" id="checkoutform">{{ csrf_field() }}
                    <div class="col-md-11 col-lg-12 p-b-50">
                        <div>
                            <h4 class="txt-m-124 cl3 p-b-28"> Billing details </h4>
                            <div class="row p-b-50">
                                <div class="col-sm-6 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">First Name <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="firstname" id="firstname">
                                </div>
                                <div class="col-sm-6 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">Last Name <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="lastname" id="lastname">
                                </div>
                                <div class="col-12 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">Address <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="address" id="address">
                                </div>
                                <div class="col-12 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">Town/City <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="city" id="city">
                                </div>
                                <div class="col-12 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">State <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="state" id="state">
                                </div>
                                <div class="col-12 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">Country <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="country" id="country">
                                </div>
                                <div class="col-12 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">Postcode / Zip <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="pincode" id="pincode">
                                </div>
                                <div class="col-sm-6 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">Phone <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="phone" id="phone">
                                </div>
                                <div class="col-sm-6 p-b-23">
                                    <div class="txt-s-101 cl6 p-b-10">Email Address <span class="cl12">*</span></div>
                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 form-control" type="text" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <button class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10" type="submit" >Place order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
