@extends('frontend.layout.app')
@section('content')

<div class="bg0 p-t-95 p-b-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 p-b-50">
              <h4 class="txt-m-124 cl3 p-b-28">Login</h4>

                <div class="p-r-15 p-rl-0-lg">
                    <form id="login" name="login" class="how-bor3 p-rl-30 p-tb-32" method="post">@csrf
                        <div class="p-b-24">
                            <div class="txt-s-101 cl6 p-b-10">Email address <span class="cl12">*</span></div>
                            <input class="form-control txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15" type="email" id="email" name="email" >
                        </div>
                        <div class="p-b-24">
                            <div class="txt-s-101 cl6 p-b-10">
                                Password <span class="cl12">*</span>
                            </div>
                            <input class="form-control txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15" type="password" id="password" name="password">
                        </div>
                        <div class="flex-w flex-m p-t-15 p-b-10">
                            <button class="flex-c-m txt-s-105 cl0 bg10 size-a-39 hov-btn2 trans-04 p-rl-10 m-r-18" type="submit">
                                Login
                            </button>
                            <a href="{{route('register')}}" class="txt-s-101 cl9 hov-cl10 trans-04">
                            have not yet Registered ? Click here to Register
                        </a>
                        </div>
                        <a href="{{route('forgot-password')}}" class="txt-s-101 cl9 hov-cl10 trans-04">
                            Lost your password?
                        </a><br>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
