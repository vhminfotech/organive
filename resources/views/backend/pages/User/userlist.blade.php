@extends('backend.layout.app')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User List</h3>
                </div>
                <div class="box-footer">
                    <a href="{{route('adduser')}}"><button class="btn btn-lg btn-info pull-right">Add User</button></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="userlist"  class="table table-bordered table-striped">{{ csrf_field() }}
                            <thead>
                                <tr align="center">
                                    <th>Id</th>
                                    <th>Profile Image</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection