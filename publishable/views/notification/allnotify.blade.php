@extends('admin.layouts.main')
@section ('styles')
<style>
.unreadmsg td{
font-weight:bold;
}
.btn-sm{
padding: 0.25rem 0.5rem;
font-size: 0.7875rem;
line-height: 1.5;
border-radius: 0.2rem;
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
            <h2 class="m-0 text-dark">Enquiry Notification</h2>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

         <!-- Main content -->
         <div class="content">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-12">
          <table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">MOBILE NO</th>
      <th scope="col">MESSAGE</th>
      <th></th>
    </tr>
  </thead>
  <tbody> <?php $adminn=\Webzera\Lararoleadmin\Admin::find(1); $i=1; ?>
    @foreach($adminn->notifications as $notify) 
    <tr class="<?php if(!$notify->read_at){ echo 'unreadmsg'; } ?>">
      <th scope="row">{{$i}}</th>
      <td>{{$notify->data['name']}}</td>
      <td>{{$notify->data['email']}}</td>
      <td>{{$notify->data['mobile_no']}}</td>
      <td><?php $trim=substr($notify->data['enquiry_msg'],0,75) ?>{{$trim.'...'}}</td>
      <td><a href="{{ route('admin.viewnotify', $notify->id) }}" class="btn-sm btn btn-primary">View</a></td>
    </tr><?php $i++; ?>
  @endforeach
  </tbody>
</table>
          </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
  </div>
@endsection
