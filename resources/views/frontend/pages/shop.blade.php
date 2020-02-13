@extends('frontend.layout.app')
@section('content')
    @php
        $currRoute = Route::current()->getName();
        $items = Session::get('logindata');
    @endphp
<!-- Content page -->
<section class="bg0 p-t-85 p-b-45">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-9 m-rl-auto p-b-50">
                <div>
                    <!-- Shop grid -->
                    <div class="shop-grid">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-sm-6 col-lg-4 p-b-30">@csrf
                                <!-- Block1 -->
                                <div class="block1">
                                    <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                        <img src="{{asset('public/uploads/product/'.$product->img )}}" alt="IMG">

                                        <div class="block1-content flex-col-c-m p-b-46">
                                            <a href="{{ route('viewProduct', $product->id) }}" class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                                {{$product->name}}
                                            </a>
                                            <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                {{$product->price}}$
                                            </span>
                                            <div class="block1-wrap-icon flex-c-m flex-w trans-05">

                                                @if ($items == '')
                                                    <a href="{{route('login')}}" class="block1-icon flex-c-m wrap-pic-max-w addtoCartFromAnywhere">
                                                        <img src="{{asset('public/frontend/images/icons/icon-cart.png')}}" alt="ICON">
                                                    </a>
                                                    <a href="{{route('login')}}" class="block1-icon flex-c-m wrap-pic-max-w addtowishlist ">
                                                        <img class="icon-addwish-b1" src="{{asset('public/frontend/images/icons/icon-heart.png')}}" alt="ICON">
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" data-id="{{ $product->id }}" class="block1-icon flex-c-m wrap-pic-max-w addtoCartFromAnywhere">
                                                        <img src="{{asset('public/frontend/images/icons/icon-cart.png')}}" alt="ICON">
                                                    </a>
                                                    <a href="javascript:void(0)" data-id="{{ $product->id }}" class="block1-icon flex-c-m wrap-pic-max-w addtowishlist ">
                                                        <img class="icon-addwish-b1" src="{{asset('public/frontend/images/icons/icon-heart.png')}}" alt="ICON">
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="flex-w flex-c-m p-t-85">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
