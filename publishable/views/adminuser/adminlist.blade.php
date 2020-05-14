@extends('admin.layouts.main')
@section('styles')
<style type="text/css">
.btn-sm{
padding: 0.25rem 0.5rem;
font-size: 0.7875rem;
line-height: 1.5;
border-radius: 0.2rem;
}
.btn-danger {

    color: #fff;
    background-color: #e3342f;
    border-color: #e3342f;

}
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Admin User</h2>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('adminuser.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> New Admin User</a>
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
              <div class="card-body">
              @include('flash::message')
                <h5 class="card-title">Admin User List</h5>

        <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>Name</th>      
      <th>Address</th>      
      <th>Role</th>
      <th>Join Date</th>
      <th>Email</th>
      <th>Mobile</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($userdetails as $latest): ?>
      <tr>
      <td><img src="{{url('/')}}/storage/adminuser/{{ $latest['profile_image'] }}" height="60px" /></td>
      <td>{{$latest->name}}</td>
      <td>{{$latest->address}}</td>
      <td>{{$latest->roles->first()->name}}</td>
      <td>{{$latest->date_join}}</td>
      <td>{{$latest->email}}</td>
      <td>{{$latest->mobile_no}}</td>      
      <td><a href="{{route('adminuser.edit', $latest->id)}}" class="button is-light is-fullwidth"><button type="button" class="btn btn-info btn-sm">Edit</button></a></td>
    </tr>
  <?php  endforeach; ?>

  </tbody>
{{$userdetails->links()}}
</table>
{{$userdetails->links()}}
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

@section('scripts')

@endsection
