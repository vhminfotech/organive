@extends('frontend.layout.app')
@section('content')
    @php
        $currRoute = Route::current()->getName();
        $items = Session::get('logindata');
    @endphp

    @foreach($products as $product)
    @endforeach

    <section class="sec-product-detail bg0 p-t-105 p-b-70">@csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <div class="m-r--5 m-r-0-lg">
                        <!-- Slide 100 -->
                        <div id="slide100-01">
                            <div class="wrap-main-pic-100 bo-all-1 bocl12 pos-relative">
                                <div class="main-frame">
                                    <div class="wrap-main-pic">
                                        <div class="main-pic">
                                            <img src="{{asset('public/uploads/product/'.$product->img )}}"
                                                 style="width: 350px; height: 500px; " alt="IMG-Product">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-lg-6">
                    <div class="p-l-70 p-t-35 p-l-0-lg">
                        <h4 class="js-name1 txt-l-104 cl3 p-b-16">
                            {{$product->name}}
                        </h4>

                        <span class="txt-m-117 cl9">
                        {{$product->price}}$
                    </span>
                        <br>
                        <br>
                        <p class="txt-s-101 cl6">
                            {{$product->description}}
                        </p>

                        <div class="flex-w flex-m p-t-55 p-b-30">
                            <div class="wrap-num-product flex-w flex-m bg12 p-rl-10 m-r-30 m-b-30 quantity">
                                <div class="btn-num-product-down flex-c-m fs-29 pro-qty"></div>

                                <input class="txt-m-102 cl6 txt-center num-product" type="number" id="quantity"
                                       value="1">

                                <div class="btn-num-product-up flex-c-m fs-16"></div>
                            </div>

                            @if ($items == '')
                                <a href="{{route('login')}}"
                                   class="flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 m-b-30">
                                    Add to cart
                                </a>
                            @else
                                <a href="javascript:void(0)" data-id="{{ $product->id }}"
                                   class="flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 m-b-30 addtocart">
                                    <!--js-addcart1-->
                                    Add to cart
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab01 -->
            <div class="tab02 p-t-80">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#info" role="tab">Additional Information</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="p-t-30">
                            <p class="txt-s-112 cl9">
                                {{$product->description}}
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="info" role="tabpanel">
                        <ul class="p-t-21">
                            <li class="txt-s-101 flex-w how-bor2 p-tb-14">
                            <span class="cl6 size-w-54">
                                Weight
                            </span>

                                <span class="cl9 size-w-55">
                                0.5 kg
                            </span>
                            </li>

                            <li class="txt-s-101 flex-w how-bor2 p-tb-14">
                            <span class="cl6 size-w-54">
                                Counrty of Origin
                            </span>

                                <span class="cl9 size-w-55">
                                Imported
                            </span>
                            </li>

                            <li class="txt-s-101 flex-w how-bor2 p-tb-14">
                            <span class="cl6 size-w-54">
                                Quality
                            </span>

                                <span class="cl9 size-w-55">
                                Oraganic
                            </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
