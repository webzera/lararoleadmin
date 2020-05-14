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
            <h2 class="m-0 text-dark">Admin Permissions</h2>
          </div><!-- /.col -->
      <div class="col-sm-6">
           {{--  <a href="{{route('slider.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> New Admin Role</a> --}}
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
                <h5 class="card-title">Admin Permission List</h5>

        <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>Name</th><?php $roles=\Webzera\Lararoleadmin\Role::all(); ?>
      <th>Description</th>
      @foreach($roles as $role )
      <th>{{$role->name}}</th>
      @endforeach
      <th></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($permissionLists as $permissionList): ?>
      <form action="{{  route('admin::permissionassign') }}" method="post">
      {{ csrf_field()}}
      <tr>
      <td></td>
      <td>{{$permissionList->label}} <input type="hidden" name="id" value="{{$permissionList->id}}"></td>
      <td>{{$permissionList->description}}</td>
      @foreach($roles as $role )

      <td><input type="checkbox" {{ $permissionList->hasPermissionThisRole($permissionList->id,$role->id) ? 'checked' : '' }} name="{{$role->name}}"></td>
      @endforeach  


      <td> <button type="submit" class="btn btn-info btn-sm" data-toggle="modal">Assign Permission</button></td>
    </tr>
    </form>
  <?php  endforeach; ?>

  </tbody>
{{$permissionLists->links()}}
</table>
{{$permissionLists->links()}}
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
