@php
$currRoute = Route::current()->getName();
$items = Session::get('logindata');
$data = Auth()->guard('admin')->user();
@endphp

<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image float-left">
            @if($data['userimg'] != '' || $data['userimg'] != NULL)
            <img src="{{ asset('public/uploads/user/'.$data['userimg']) }}" class="rounded-circle" alt="User Image">
            @else
            <img src="{{asset('public/backend/images/user2-160x160.jpg')}}" class="rounded-circle" alt="User Image">
            @endif
            </div>
            <div class="info float-left">
                <p> {{ $data['username'] }} </p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview {{ ($currRoute == 'index')  ? 'active' : '' }}">
                <a href="{{route('index')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview {{ $currRoute == 'userlist' || $currRoute == 'adduser' || $currRoute == 'updateuser'  ? 'active' : '' }}">
                <a href="{{route('userlist')}}">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview {{ $currRoute == 'categorylist' || $currRoute == 'addcategory' || $currRoute == 'updatecategory'  ? 'active' : '' }}">
                <a href="{{route('categorylist')}}">
                    <i class="fa fa-list-alt"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview {{ $currRoute == 'productlist' || $currRoute == 'addproduct' || $currRoute == 'updateproduct'   ? 'active' : '' }}">
                <a href="{{route('productlist')}}">
                    <i class="fa fa-list"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview {{ $currRoute == 'sliderlist' || $currRoute == 'addslider' || $currRoute == 'updateslider'  ? 'active' : '' }}">
                <a href="{{route('sliderlist')}}">
                    <i class="fa fa-sliders"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview {{ $currRoute == 'blogcategorylist' || $currRoute == 'addblogcategory' || $currRoute == 'updateblogcategory'  ? 'active' : '' }}">
                <a href="{{route('blogcategorylist')}}">
                    <i class="fa fa-list-alt"></i>
                    <span>Blog Category</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview {{ $currRoute == 'bloglist' || $currRoute == 'addblog' || $currRoute == 'updateblog'  ? 'active' : '' }}">
                <a href="{{route('bloglist')}}">
                    <i class="fa fa-rss" aria-hidden="true"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview {{ $currRoute == 'order' }}">
                <a href="{{route('order')}}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>Order</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
        <!-- item-->
        <a href="{{route('adminlogout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
    </div>
</aside>