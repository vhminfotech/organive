@php
    $currRoute = Route::current()->getName();
    $items = Session::get('logindata');
@endphp
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop">
                <div class="left-header">
                    <!-- Logo desktop -->
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="{{asset('public/frontend/images/icons/logo-01.png')}}"
                                                         alt="IMG-LOGO"></a>
                    </div>
                </div>
                <div class="center-header">
                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('shop')}}">Shop</a>
                            </li>
                            <li>
                                <a href="{{route('blog')}}">Blog</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Gallery</a>
                            </li>
                            <li>
                                <a href="{{route('wishlist')}}">Wishlist</a>
                            </li>
                            <li>
                                <a href="{{route('myorder')}}">MyOrder</a>
                            </li>
                            @if ($items == '')
                                @if($currRoute != "login")
                                    <li>
                                        <a href="{{route('login')}}">LogIn</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="{{route('userlogout')}}">LogOut</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="right-header">
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click p-t-8">
                        <div class="wrap-cart-header h-full flex-m m-l-10 menu-click">
                            @if ($items == '')
                                <div class="icon-header-item flex-c-m trans-04">
                                    <a href="{{route('cart')}}">
                                        <img src="{{asset('public/frontend/images/icons/icon-cart-2.png')}}" alt="CART"></a>
                                </div>
                            @else
                                <div class="icon-header-item flex-c-m trans-04 icon-header-noti"
                                     data-notify="{{ count($cart) }}">
                                    <a href="javascript:void(0)"><img
                                            src="{{asset('public/frontend/images/icons/icon-cart-2.png')}}" alt="CART"></a>
                                </div>

                                <div class="cart-header menu-click-child trans-04">
                                    <div class="bo-b-1 bocl15">
                                        <div class="size-h-2 js-pscroll m-r--15 p-r-15">
                                            <!--cart header item-->
                                            @for($i = 0;$i < count($cart); $i++)
                                                <div class="flex-w flex-str m-b-25">
                                                    <div class="size-w-15 flex-w flex-t">
                                                        <a href="{{ route('viewProduct', $cart[$i]->id) }}"
                                                           class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                                            <img src="{{asset('public/uploads/product/'.$cart[$i]->img )}}"
                                                                 alt="PRODUCT">
                                                        </a>
                                                        <div class="size-w-17 flex-col-l">
                                                            <a href="{{ route('viewProduct', $cart[$i]->id) }}"
                                                               class="txt-s-108 cl3 hov-cl10 trans-04">
                                                                {{$cart[$i]->name}}
                                                            </a>
                                                            <span class="txt-s-101 cl9">
                                                        {{$cart[$i]->price}}$
                                                    </span>
                                                            <span class="txt-s-109 cl12">
                                                        x{{ $cart[$i]->quantity }}
                                                    </span>
                                                            <span class="txt-s-101 cl9">
                                                        {{ $cart[$i]->price)*($cart[$i]->quantity }}$
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    @if(count($cart) == 0)
                                        <a href="{{route('shop')}}"
                                           class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                            Shop Now
                                        </a>

                                    @else
                                        <a href="{{route('cart')}}"
                                           class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                            check out
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{route('home')}}"><img src="{{asset('public/frontend/images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
        </div>
        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
            <div class="wrap-cart-header h-full flex-m m-l-5 menu-click">
                @if ($items == '')
                    <div class="icon-header-item flex-c-m trans-04">
                        <a href="{{route('cart')}}">
                            <img src="{{asset('public/frontend/images/icons/icon-cart-2.png')}}" alt="CART"></a>
                    </div>
                @else
                    <div class="icon-header-item flex-c-m trans-04 icon-header-noti" data-notify="{{ count($cart) }}">
                        <img src="{{asset('public/frontend/images/icons/icon-cart-2.png')}}" alt="CART">
                    </div>
                    <div class="cart-header menu-click-child trans-04">
                        <div class="bo-b-1 bocl15">
                            <!-- cart header item -->
                            @for($i = 0;$i < count($cart); $i++)
                                <div class="flex-w flex-str m-b-25">
                                    <div class="size-w-15 flex-w flex-t">
                                        <a href="{{ route('viewProduct', $cart[$i]->id) }}"
                                           class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                            <img src="{{asset('public/uploads/product/'.$cart[$i]->img )}}" alt="cart">
                                        </a>
                                        <div class="size-w-17 flex-col-l">
                                            <a href="{{ route('viewProduct', $cart[$i]->id) }}"
                                               class="txt-s-108 cl3 hov-cl10 trans-04">
                                                {{$cart[$i]->name}}
                                            </a>
                                            <span class="txt-s-101 cl9">
                                        {{$cart[$i]->price}}$
                                    </span>
                                            <span class="txt-s-109 cl12">
                                        x{{ $cart[$i]->quantity }}
                                    </span>
                                            <span class="txt-s-101 cl9">
                                        {{ $cart[$i]->price)*($cart[$i]->quantity }}$
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        @if(count($cart) == 0)
                            <a href="{{route('shop')}}" class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                Shop Now
                            </a>
                        @else
                            <a href="{{route('cart')}}" class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                check out
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a href="{{route('shop')}}">Shop</a>
            </li>
            <li>
                <a href="{{route('blog')}}">Blog</a>
            </li>
            <li>
                <a href="javascript:void(0)">Gallery</a>
            </li>
            <li>
                <a href="{{route('myorder')}}">MyOrder</a>
            </li>
            @if ($items == '')
                @if($currRoute != "login")
                    <li>
                        <a href="{{route('login')}}">LogIn</a>
                    </li>
                @endif
            @else
                <li>
                    <a href="{{route('userlogout')}}">LogOut</a>
                </li>
            @endif
           <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
            </li>
        </ul>
    </div>
</header>
