@extends('frontend.layout.app')
@section('content')

    @php
        $currRoute = Route::current()->getName();
        $items = Session::get('logindata');
    @endphp

    <!-- Slider -->
    <section class="sec-slider">@csrf
        <div class="rev_slider_wrapper fullwidthbanner-container">
            <div id="rev_slider_2" class="rev_slide fullwidthabanner" data-version="5.4.5" style="display:none">
                <ul>
                @foreach($sliders as $slider)
                    <!-- Slide 1 -->
                        <li data-transition="fade">
                            <!--  -->
                            <img src="{{asset('public/uploads/slider/'.$slider->img )}}" alt="IMG-BG" class="rev-slidebg">

                            <!--  -->
                            <div class="tp-caption tp-resizeme layer1"
                                 data-frames='[{"delay":1300,"speed":1300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-visibility="['on', 'on', 'on', 'on']"
                                 data-fontsize="['30', '30', '30', '30']"
                                 data-lineheight="['42', '42', '42', '42']"
                                 data-color="['#333']"
                                 data-textAlign="['left', 'left', 'center', 'center']"
                                 data-x="['left']"
                                 data-y="['center']"
                                 data-hoffset="['250', '80', '0', '0']"
                                 data-voffset="['-158', '-158', '-158', '-190']"
                                 data-width="['650','650','768','576']"
                                 data-height="['auto']"
                                 data-whitespace="['normal']"
                                 data-paddingtop="[0, 0, 0, 0]"
                                 data-paddingright="[15, 15, 15, 15]"
                                 data-paddingbottom="[0, 0, 0, 0]"
                                 data-paddingleft="[15, 15, 15, 15]"
                                 data-basealign="slide"
                                 data-responsive_offset="on">
                                {{$slider->title}}
                            </div>

                            <!--  -->
                            <h2 class="tp-caption tp-resizeme layer2"
                                data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                data-visibility="['on', 'on', 'on', 'on']"
                                data-fontsize="['80', '80', '80', '80']"
                                data-lineheight="['82', '82', '82', '82']"
                                data-color="['#333']"
                                data-textAlign="['left', 'left', 'center', 'center']"
                                data-x="['left']"
                                data-y="['center']"
                                data-hoffset="['250', '80', '0', '0']"
                                data-voffset="['-77', '-77', '-77', '-107']"
                                data-width="['650','650','768','576']"
                                data-height="['auto']"
                                data-whitespace="['normal']"
                                data-paddingtop="[0, 0, 0, 0]"
                                data-paddingright="[15, 15, 15, 15]"
                                data-paddingbottom="[0, 0, 0, 0]"
                                data-paddingleft="[15, 15, 15, 15]"
                                data-basealign="slide"
                                data-responsive_offset="on">
                                {{$slider->text}}
                            </h2>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- Product -->
    <div class="sec-product bg0 p-t-145 p-b-25">
        <div class="container">
            <div class="size-a-1 flex-col-c-m p-b-48">
                <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
                    Featured Products
                    <div class="how-pos1">
                        <img src="{{asset('public/frontend/images/icons/symbol-02.png')}}" alt="IMG">
                    </div>
                </div>
                <h3 class="txt-center txt-l-101 cl3 respon1">
                    Our products
                </h3>
            </div>
            <div class="p-b-46">
                <div class="flex-w flex-c-m filter-tope-group">
                    <button class="txt-m-104 cl9 hov2 trans-04 p-rl-27 p-b-10 how-active1" data-filter="*">
                        All Products
                    </button>
                    @foreach($categories as $category)
                        <button class="txt-m-104 cl9 hov2 trans-04 p-rl-27 p-b-10" data-filter=".{{$category->category_name}}">
                            {{$category->category_name}}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="row isotope-grid">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-75 isotope-item {{$product->category_name}}">
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
                                    <!--<a href="{{ route('viewProduct', $product->id) }}" class="block1-icon flex-c-m wrap-pic-max-w">
                                    <img src="{{asset('public/frontend/images/icons/icon-view.png')}}" alt="ICON">
                                    </a>-->
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
    </div>
    <!-- Flavors -->
    <section class="sec-flavors bg-img1 p-t-145 p-b-45" style="background-image: url({{asset('public/frontend/images/bg-02.jpg);')}}">
        <div class="container">
            <div class="size-a-1 flex-col-c-m p-b-48">
                <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
                    Bring Freshness
                    <div class="how-pos1">
                        <img src="{{asset('public/frontend/images/icons/symbol-02.png')}}" alt="IMG">
                    </div>
                </div>
                <h3 class="txt-center txt-l-101 cl3 respon1">
                    Flavors from the farm
                </h3>
            </div>
            <div class="flex-c-m wrap-pic-w p-t-10 p-b-38">
                <img src="{{asset('public/frontend/images/other-06.png')}}" alt="IMG">
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-8 col-lg-4 p-b-50">
                    <div class="p-r-30 p-rl-0-xl">
                        <div class="flex-w flex-str p-b-20">
                            <div class="flex-l-m size-w-18 m-r-28">
                                <img src="{{asset('public/frontend/images/icons/symbol-12.png')}}" alt="IMG">
                            </div>
                            <div class="size-w-19">
                                <div class="how-bor1 p-b-6 m-b-13">
                                <span class="txt-l-107 cl10">
                                    01
                                </span>
                                    <span class="txt-m-112 cl10">
                                    / 100%
                                </span>
                                </div>
                                <span class="txt-m-301 cl3">
                                100% Organic
                            </span>
                            </div>
                        </div>
                        <p class="txt-s-101 cl6">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                        </p>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-4 p-b-50">
                    <div class="p-rl-15 p-rl-0-xl">
                        <div class="flex-w flex-str p-b-20">
                            <div class="flex-l-m size-w-18 m-r-28">
                                <img src="{{asset('public/frontend/images/icons/symbol-13.png')}}" alt="IMG">
                            </div>
                            <div class="size-w-19">
                                <div class="how-bor1 p-b-6 m-b-13">
                                <span class="txt-l-107 cl10">
                                    02
                                </span>
                                    <span class="txt-m-112 cl10">
                                    / 100%
                                </span>
                                </div>
                                <span class="txt-m-301 cl3">
                                Family Healthy
                            </span>
                            </div>
                        </div>
                        <p class="txt-s-101 cl6">
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-4 p-b-50">
                    <div class="p-l-30 p-rl-0-xl">
                        <div class="flex-w flex-str p-b-20">
                            <div class="flex-l-m size-w-18 m-r-28">
                                <img src="{{asset('public/frontend/images/icons/symbol-14.png')}}" alt="IMG">
                            </div>
                            <div class="size-w-19">
                                <div class="how-bor1 p-b-6 m-b-13">
                                <span class="txt-l-107 cl10">
                                    03
                                </span>
                                    <span class="txt-m-112 cl10">
                                    / 100%
                                </span>
                                </div>
                                <span class="txt-m-301 cl3">
                                Always Fresh
                            </span>
                            </div>
                        </div>
                        <p class="txt-s-101 cl6">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product2 -->
    <section class="sec-product2 bg0 p-t-110 p-b-50">
        <div class="size-w-20 m-rl-auto p-rl-15">
            <div class="row">
                <div class="col-lg-6 p-b-100">
                    <div class="p-rl-15 p-rl-0-xl">
                        <div class="size-a-1 flex-col-c-m p-b-44">
                            <div class="txt-center txt-m-202 cl10 how-pos1-parent m-b-8">
                                New Form The Farm
                                <div class="how-pos1 p-b-3">
                                    <img src="{{asset('public/frontend/images/icons/symbol-02.2.png')}}" alt="IMG">
                                </div>
                            </div>
                            <h3 class="txt-center">
                            <span class="txt-l-109 cl6">
                                organic
                            </span>
                                <span class="txt-l-108 cl3">
                                special
                            </span>
                            </h3>
                        </div>
                        <!-- slide4 -->

                        <div class="wrap-slick4 bo-all-1 bocl12">

                            <div class="slick4">
                                @foreach($specialproducts as $product)
                                    <div class="item-slick4">

                                        <!-- Block1 -->
                                        <div class="block1">
                                            <div class="block1-bg wrap-pic-w">
                                                <img src="{{asset('public/uploads/product/'.$product->img )}}" alt="IMG">

                                                <div class="block1-content flex-col-c-m p-b-46">
                                                    <a href="{{ route('viewProduct', $product->id) }}" class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                                        {{$product->name}}
                                                    </a>

                                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                {{$product->price}}$
                                            </span>

                                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                                    <!--<a href="{{ route('viewProduct', $product->id) }}" class="block1-icon flex-c-m wrap-pic-max-w">
                                                    <img src="{{asset('public/frontend/images/icons/icon-view.png')}}" alt="ICON">
                                                    </a>-->

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

                            <div class="wrap-arrow-slick4 flex-w">
                                <button class="arrow-slick4 prev-slick4">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                </button>
                                <button class="arrow-slick4 next-slick4">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 p-b-100">
                    <div class="p-rl-15 p-rl-0-xl">
                        <div class="size-a-1 flex-col-c-m p-b-44">
                            <div class="txt-center txt-m-202 cl10 how-pos1-parent m-b-8">
                                Costumer Needs

                                <div class="how-pos1 p-b-3">
                                    <img src="{{asset('public/frontend/images/icons/symbol-02.2.png')}}" alt="IMG">
                                </div>
                            </div>

                            <h3 class="txt-center">
                            <span class="txt-l-109 cl6">
                                organic
                            </span>

                                <span class="txt-l-108 cl3">
                                random
                            </span>
                            </h3>
                        </div>

                        <!-- slide4 -->
                        <div class="wrap-slick4 bo-all-1 bocl12">
                            <div class="slick4">
                                @foreach($randomeproducts as $product)
                                    <div class="item-slick4">

                                        <!-- Block1 -->
                                        <div class="block1">
                                            <div class="block1-bg wrap-pic-w">
                                                <img src="{{asset('public/uploads/product/'.$product->img )}}" alt="IMG">

                                                <div class="block1-content flex-col-c-m p-b-46">
                                                    <a href="{{ route('viewProduct', $product->id) }}" class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                                        {{$product->name}}
                                                    </a>

                                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                {{$product->price}}$
                                            </span>

                                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                                    <!--<a href="{{ route('viewProduct', $product->id) }}" class="block1-icon flex-c-m wrap-pic-max-w">
                                                    <img src="{{asset('public/frontend/images/icons/icon-view.png')}}" alt="ICON">
                                                    </a>-->

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

                            <div class="wrap-arrow-slick4 flex-w">
                                <button class="arrow-slick4 prev-slick4">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                </button>

                                <button class="arrow-slick4 next-slick4">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Item -->
    <div class="sec-item container-brick">
        <div class="wrap-brick">
            <div class="brick1" style="background: #ecadb4;">
                <div class="s-full pos-relative hov5-parent">
                    <img class="ab-c-m size-a-13" src="{{asset('public/frontend/images/item-01.png')}}" alt="IMG">
                    <div class="s-full ab-t-l bg14 flex-col-c-m p-all-15 hov5 trans-04">
                    <span class="txt-l-104 cl14 txt-center p-b-18">
                        Beetroot
                    </span>
                        <p class="txt-s-101 cl14 txt-center size-w-21 m-b-35 size-h-3 of-hidden">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                        </p>

                        <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl14 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn2 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="brick2" style="background: #aed1e2;">
                <div class="s-full pos-relative hov5-parent">
                    <img class="ab-c-m size-a-13" src="{{asset('public/frontend/images/item-02.png')}}" alt="IMG">

                    <div class="s-full ab-t-l bg14 flex-col-c-m p-all-15 hov5 trans-04">
                    <span class="txt-l-104 cl14 txt-center p-b-18">
                        Coconut
                    </span>

                        <p class="txt-s-101 cl14 txt-center size-w-21 m-b-35 size-h-3 of-hidden">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                        </p>

                        <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl14 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn2 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="brick3" style="background: #cacea6;">
                <div class="s-full pos-relative hov5-parent">
                    <img class="ab-c-m size-a-13" src="{{asset('public/frontend/images/item-03.png')}}" alt="IMG">

                    <div class="s-full ab-t-l bg14 flex-col-c-m p-all-15 hov5 trans-04">
                    <span class="txt-l-104 cl14 txt-center p-b-18">
                        Asparagus
                    </span>

                        <p class="txt-s-101 cl14 txt-center size-w-21 m-b-35 size-h-3 of-hidden">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                        </p>

                        <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl14 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn2 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="brick4" style="background: #e0c570;">
                <div class="s-full pos-relative hov5-parent">
                    <img class="ab-c-m size-a-13" src="{{asset('public/frontend/images/item-04.png')}}" alt="IMG">

                    <div class="s-full ab-t-l bg14 flex-col-c-m p-all-15 hov5 trans-04">
                    <span class="txt-l-104 cl14 txt-center p-b-18">
                        Mango
                    </span>

                        <p class="txt-s-101 cl14 txt-center size-w-21 m-b-35 size-h-3 of-hidden">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                        </p>

                        <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl14 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn2 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="brick5" style="background: #ec987c;">
                <div class="s-full pos-relative hov5-parent">
                    <img class="ab-c-m size-a-13" src="{{asset('public/frontend/images/item-05.png')}}" alt="IMG">

                    <div class="s-full ab-t-l bg14 flex-col-c-m p-all-15 hov5 trans-04">
                    <span class="txt-l-104 cl14 txt-center p-b-18">
                        Tomato
                    </span>

                        <p class="txt-s-101 cl14 txt-center size-w-21 m-b-35 size-h-3 of-hidden">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                        </p>

                        <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl14 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn2 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="brick6" style="background: #efd6a7;">
                <div class="s-full pos-relative hov5-parent">
                    <img class="ab-c-m size-a-13" src="{{asset('public/frontend/images/item-06.png')}}" alt="IMG">

                    <div class="s-full ab-t-l bg14 flex-col-c-m p-all-15 hov5 trans-04">
                    <span class="txt-l-104 cl14 txt-center p-b-18">
                        Pineapple
                    </span>

                        <p class="txt-s-101 cl14 txt-center size-w-21 m-b-35 size-h-3 of-hidden">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                        </p>

                        <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl14 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn2 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="brick7" style="background: #cbdd96;">
                <div class="s-full pos-relative hov5-parent">
                    <img class="ab-c-m size-a-13" src="{{asset('public/frontend/images/item-07.png')}}" alt="IMG">

                    <div class="s-full ab-t-l bg14 flex-col-c-m p-all-15 hov5 trans-04">
                    <span class="txt-l-104 cl14 txt-center p-b-18">
                        Bell pepper
                    </span>

                        <p class="txt-s-101 cl14 txt-center size-w-21 m-b-35 size-h-3 of-hidden">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                        </p>

                        <a href="{{route('shop')}}" class="flex-c-m txt-s-103 cl14 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn2 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Why chose -->
    <section class="sec-whychose bg0 p-t-120">
        <div class="container">
            <div class="row">
                <div class="col-md-7 order-md-2">
                    <div class="p-l-50 p-t-60 p-l-0-lg">
                        <div class="size-a-1 flex-col-l-m p-b-65">
                            <div class="txt-m-201 cl10 how-pos1-parent m-b-14">
                                Quality Assurance

                                <div class="how-pos1">
                                    <img src="{{asset('public/frontend/images/icons/symbol-02.png')}}" alt="IMG">
                                </div>
                            </div>

                            <h3 class="txt-l-101 cl3 respon1">
                                Why choose us
                            </h3>
                        </div>

                        <div>
                            <div class="flex-w p-b-50">
                                <div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
                                    <img src="{{asset('public/frontend/images/icons/symbol-15.png')}}" alt="SYMBOL">
                                </div>

                                <div class="size-w-23">
                                <span class="txt-m-101 cl3">
                                    100% Fresh Organic
                                </span>

                                    <p class="txt-s-101 cl6 p-t-12">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.
                                    </p>
                                </div>
                            </div>

                            <div class="flex-w p-b-50">
                                <div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
                                    <img src="{{asset('public/frontend/images/icons/symbol-16.png')}}" alt="SYMBOL">
                                </div>

                                <div class="size-w-23">
                                <span class="txt-m-101 cl3">
                                    Experienced
                                </span>

                                    <p class="txt-s-101 cl6 p-t-12">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    </p>
                                </div>
                            </div>

                            <div class="flex-w p-b-50">
                                <div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
                                    <img src="{{asset('public/frontend/images/icons/symbol-17.png')}}" alt="SYMBOL">
                                </div>

                                <div class="size-w-23">
                                <span class="txt-m-101 cl3">
                                    Fast delivery
                                </span>

                                    <p class="txt-s-101 cl6 p-t-12">
                                        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 order-md-1">
                    <div class="flex-b h-full">
                        <div class="wrap-pic-max-w"><img src="{{asset('public/frontend/images/other-07.jpg')}}" alt="IMG"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section class="sec-blog bg12 p-t-145 p-b-45">
        <div class="container">
            <div class="size-a-1 flex-col-c-m p-b-70">
                <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
                    Keep Updated With Us

                    <div class="how-pos1">
                        <img src="{{asset('public/frontend/images/icons/symbol-02.png')}}" alt="IMG">
                    </div>
                </div>

                <h3 class="txt-center txt-l-101 cl3 respon1">
                    From our blog
                </h3>
            </div>

            <div class="row justify-content-center">

                @foreach($blog as $blogs)
                    <div class="col-sm-8 col-lg-4 p-b-50">
                        <div>
                            <a href="{{ route('viewblog', $blogs->id) }}" class="wrap-pic-w hov4 how-pos5-parent" >
                                <img src="{{asset('public/uploads/blog/'.$blogs->img )}}"   alt="BLOG">
                                <div class="flex-col-c-m size-a-9 bg10 how-pos5">
                            <span class="txt-l-110 cl0">
                                {{date('d', strtotime($blogs->created_at))}}
                            </span>

                                    <span class="txt-s-110 cl0">
                                {{date('F', strtotime($blogs->created_at))}}
                            </span>
                                </div>
                            </a>
                            <div class="p-t-16">
                                <a href="{{ route('viewblog', $blogs->id) }}" class="txt-m-109 cl3 hov-cl10 trans-04">
                                    {{$blogs->title}}
                                </a>
                                <div class="flex-w flex-m p-t-15">
                            <span class="flex-w flex-m m-r-35">
                                <img class="ver-middle m-r-12" src="{{asset('public/frontend/images/icons/icon-user.png')}}" alt="SYMBOL">
                                <span class="txt-s-101 cl6">
                                    Post by <span class="txt-s-108 cl6">{{$blogs->author}}</span>
                                </span>
                            </span>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Logo -->
    <div class="sec-logo bg0">
        <div class="container">
            <div class="flex-w flex-sa-m p-tb-60">
                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{asset('public/frontend/images/icons/symbol-07.png')}}" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{asset('public/frontend/images/icons/symbol-08.png')}}" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{asset('public/frontend/images/icons/symbol-09.png')}}" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{asset('public/frontend/images/icons/symbol-10.png')}}" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{asset('public/frontend/images/icons/symbol-11.png')}}" alt="IMG">
                </a>
            </div>
        </div>
    </div>
@endsection
