@php
$items = Session::get('logindata');
$data = Auth()->guard('admin')->user();
@endphp

<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{asset('public/backend/images/minimal.png')}}"  alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin </b>Panel</span>
    </a>
    <!-- Header Navbar-->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if($data['userimg'] != '' || $data['userimg'] != NULL)
                        <img src="{{ asset('public/uploads/user/'.$data['userimg']) }}" class="user-image rounded-circle" alt="User Image">
                        @else
                        <img src="{{asset('public/backend/images/user2-160x160.jpg')}}" class="user-image rounded-circle" alt="User Image">
                        @endif
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- User image -->
                        <li class="user-header">
                            @if($data['userimg'] != '' || $data['userimg'] != NULL)
                            <img src="{{ asset('public/uploads/user/'.$data['userimg']) }}" class="float-left rounded-circle" alt="User Image">
                            @else
                            <img src="{{asset('public/backend/images/user2-160x160.jpg')}}" class="float-left rounded-circle" alt="User Image">
                            @endif
                            <p>
                                {{ $data['firstname'] .' '. $data['lastname'] }}
                                <small class="mb-5">{{ $data['email'] }}</small>
                                <a href="{{route('profile')}}" class="btn btn-danger btn-sm">View Profile</a>
                            </p>
                        </li>
                        <br>
                        <br>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row no-gutters">
                                <div class="col-12 text-left">
                                    <a href="{{route('profile')}}"><i class="ion ion-person"></i> My Profile</a>
                                </div>
                                <div class="col-12 text-left">
                                    <a href=""><i class="ion ion-email-unread"></i> Inbox</a>
                                </div>
                                <div class="col-12 text-left">
                                    <a href=""><i class="ion ion-settings"></i> Setting</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{route('adminlogout')}}" class="btn btn-block btn-danger"><i class="ion ion-power"></i> Log Out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Messages-->
                <li class="dropdown messages-menu">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <li class="header">You have 5 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu inner-content-div">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{asset('public/backend/images/user2-160x160.jpg')}}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <div class="mail-contnet">
                                            <h4>
                                                Lorem Ipsum
                                                <small><i class="fa fa-clock-o"></i> 15 mins</small>
                                            </h4>
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                        </div>
                                    </a>
                                </li>
                                <!-- end message -->
                                <li>
                                    <a href="">
                                        <div class="pull-left">
                                            <img src="{{asset('public/backend/images/user3-128x128.jpg')}}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <div class="mail-contnet">
                                            <h4>
                                                Nullam tempor
                                                <small><i class="fa fa-clock-o"></i> 4 hours</small>
                                            </h4>
                                            <span>Curabitur facilisis erat quis metus congue viverra.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div class="pull-left">
                                            <img src="{{asset('public/backend/images/user4-128x128.jpg')}}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <div class="mail-contnet">
                                            <h4>
                                                Proin venenatis
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <div class="pull-left">
                                            <img src="{{asset('public/backend/images/user3-128x128.jpg')}}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <div class="mail-contnet">
                                            <h4>
                                                Praesent suscipit
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{asset('public/backend/images/user4-128x128.jpg')}}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <div class="mail-contnet">
                                            <h4>
                                                Donec tempor
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See all e-Mails</a></li>
                    </ul>
                </li>
                <!-- Notifications -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <li class="header">You have 7 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu inner-content-div">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> In gravida mauris et nisi
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> Praesent eu lacus in libero dictum fermentum.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> Nunc fringilla lorem 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>
</header>