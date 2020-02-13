@extends('frontend.layout.app')
@section('content')
@php
$items = Session::get('logindata');
$data = Auth()->guard('user')->user();
@endphp
@if(count($wishlist) == 0)

<div class="bg0 p-t-30 p-b-50">{{ csrf_field() }}
    <div class="container">
        <div class="how-bor4 p-t-35 p-b-40 p-rl-30 m-t-5">
            <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                <span>
                    Please add some product and come again...!!!
                </span>
            </div>
            <a href="{{route('shop')}}" <button class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10">
                    Shop Now 
                </button></a>
        </div>
    </div>
</div>
@else
<style>
    a{color:#666666;}
</style>
<div class="bg0 p-t-100 p-b-80">{{ csrf_field() }}
    <div class="container">
        <div class="wrap-table-shopping-cart rs1-table">
            <table class="table-shopping-cart">
                <tr class="table_head bg12">
                    <th class="column-1 p-l-30">Product Name</th>
                    <th class="column-2">Unit Price</th>
                    <th class="column-3">Add to cart</th>
                </tr>

                @for($i=0; $i < count($wishlist); $i++)    

                <tr class="table_row">
                    <td class="column-1">
                        <div class="flex-w flex-m">
                            <div class="wrap-pic-w size-w-50 bo-all-1 bocl12 m-r-30">
                                <img src="{{asset('public/uploads/product/'.$wishlist[$i]->img )}}" style="hight:100px; width: 100px;" alt="IMG">
                            </div>
                            <span>
                                <a href="{{ route('viewProduct', $wishlist[$i]->id) }}">{{$wishlist[$i]->name}}</a>
                            </span>
                        </div>
                    </td>
                    <td class="column-2">
                        {{ $wishlist[$i]->price }}$
                    </td>

                    <td class="column-4">
                        <div class="flex-w flex-sb-m">
                            <a href="javascript:void(0)" data-id="{{ $wishlist[$i]->productid }}"  class="flex-c-m txt-s-103 cl6 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn1 trans-04 addtoCartFromAnywhere">
                                Add to Cart
                                <span class="lnr lnr-chevron-right m-l-7"></span>
                                <span class="lnr lnr-chevron-right"></span>
                            </a>

                            <div class="size-w-14 flex-b">
                                <a data-toggle="modal" data-target="#deletemodal" data-id="{{$wishlist[$i]->id}}" class="lh-10 removefromwishlist">
                                    <img src="{{asset('public/frontend/images/icons/icon-close.png')}}" alt="CLOSE">
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endfor 
            </table>
        </div>

        <div class="flex-w flex-sb-m p-t-30">
            <div class="flex-w flex-m m-r-50 m-tb-10">
                <div data-id="{{$data['id']}}" class="flex-c-m txt-s-103 cl6 size-h-9 how-btn1 bo-all-1 bocl11 hov-btn1 trans-04 pointer p-rl-29 m-tb-10 m-r-30 clear">
                    Clear wishlist
                </div>
            </div>

            <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl0 bg10 size-h-9 hov-btn2 trans-04 pointer p-rl-29 m-tb-10">
                Continue shopping
            </a>
        </div>
    </div>
</div>
@endif
@endsection