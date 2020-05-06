@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Create Role</h2>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('admin.adminrolelist')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i>View Roles</a>
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
                <h5 class="card-title">Add Role Details</h5>
        <div class="table-responsive">
    <form action="{{route('admin.createrolestore')}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Role Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter role name">
      </div>
      <div class="form-group">
        <label for="description">Role Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter role description">
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
