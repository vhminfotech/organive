@extends('backend.layout.app')
@section('content')

@foreach($users as $user)
@endforeach

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Update User</h3>
        </div>
        <div class="box-body">
            <form id="userlist" name="userlist" method="post" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-12">
                        @if($user->userimg == !null)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <img src="{{asset('public/uploads/user/'.$user->userimg )}}" alt="user-profile" title="user-profile" class="rounded mr-3" height="50">
                            </div>
                        </div>
                        @endif
                        @if($user->userimg == null)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Add Profile Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="userimg" name="userimg">
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Change Profile Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="userimg" name="userimg">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$user->username}}" id="username" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$user->firstname}}" id="firstname" name="firstname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$user->lastname}}" id="lastname" name="lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" value="{{$user->email}}" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$user->phn}}" id="phn" name="phn">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="country"  id="country">
                                    @foreach ($countries as $country) 
                                    <option value="{{$country->id}}" {{$country->id == $user->country ? 'selected' : ''}}>{{$country->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="state" id="state">
                                    @foreach ($states as $key => $value) 
                                    <option value="{{ $value->id }}" {{$value->id == $user->state ? 'selected' : ''}}>{{$value->state}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="city" id="city">
                                    @foreach ($citys as $key => $value) 
                                    <option value="{{ $value->id}}" {{ $value->id == $user->city ? 'selected' : ''}}>{{ $value->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" value="" id="password" name="password">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-lg btn-info pull-right">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</div>

@endsection