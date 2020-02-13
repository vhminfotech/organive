@extends('backend.layout.app')
@section('content')
@php
$data = Auth()->guard('admin')->user();
@endphp
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if($data['userimg'] != '' || $data['userimg'] != NULL)
                    <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="{{ asset('public/uploads/user/'.$data['userimg']) }}" alt="User profile picture">
                    @else                   
                    <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="{{asset('public/backend/images/5.jpg')}}" alt="User profile picture">
                    @endif
                    <p class="text-muted text-center">{{ $data['username'] }}</p>
                    <h3 class="profile-username text-center">{{ $data['firstname'] .' '. $data['lastname'] }}</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-user-info">
                                <p>Email address </p>
                                <h6 class="margin-bottom">{{ $data['email'] }}</h6>
                                <p>Phone</p>
                                <h6 class="margin-bottom">{{ $data['phn'] }}</h6> 
                                <p class="margin-bottom">Social Profile</p>
                                <div class="user-social-acount">
                                    <button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                                    <button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                    <button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="col-xl-8 col-lg-7">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a class="active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal form-element col-12">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="inputPhone" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="ml-auto col-sm-10">
                                    <button type="submit" class="btn btn-orange">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</section>

@endsection