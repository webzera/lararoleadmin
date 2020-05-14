@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">{{$admin->roles->first()->name}} {{ $admin->name}}</h2>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('adminuser.index')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i>View Admin list</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
               @include('flash::message')
              <div class="card-body">
                <h5 class="card-title">Edit {{$admin->roles->first()->name}} {{ $admin->name}} Details</h5>
        <div class="table-responsive">
    <form action="{{route('adminuser.update', $admin->id)}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }} {{ method_field('PUT') }}
      <div class="form-group">
        <label for="name">Name</label>
        <input value="{{ $admin->name}}" type="text" class="form-control" name="name" id="name" placeholder="Enter admin user name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input value="{{ $admin->email}}" type="text" class="form-control" name="email" id="email" placeholder="Enter admin user email" required>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input value="{{ $admin->address}}" type="text" class="form-control" name="address" id="address" placeholder="Enter admin user address" required>
      </div>
      <div class="form-group">
        <label for="date_join">Date of Join</label>
        <input value="{{ $admin->date_join}}" type="date" class="form-control" name="date_join" id="date_join" required>
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input value="{{ $admin->city}}" type="text" class="form-control" name="city" id="city" placeholder="Enter admin user City" required>
      </div>
      <div class="form-group">
        <label for="pincode">Pincode</label>
        <input value="{{ $admin->pincode}}" type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter admin user City Pincode" required>
      </div>
      <div class="form-group">
        <label for="mobile_no">Mobile No</label>
        <input value="{{ $admin->mobile_no}}" type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter admin user mobile no" required>
      </div>
      <div class="form-group">
        <img src="{{url('/')}}/storage/adminuser/{{ $admin['profile_image'] }}" height="60px" width="60px" /><br>
        <label class="material-icons" for="profile_image">wallpaper</label>
        <span>Change Profile Photo</span>
        <input type="file" id="profile_image" name="profile_image" value="" />  {{-- <span style="color: blue" > Check image height 1200x500 </span> --}}
      </div>

    <button type="submit" class="btn btn-success float-right">Submit</button>

    </form>
      </div>
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
