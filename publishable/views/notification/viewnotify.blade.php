@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark"> {{$notify->data['heading']}} - Notification</h2>
          </div><!-- /.col -->
          <div class="col-sm-6"><span class="float-right"><a href="{{ route('admin.allnotify') }}" class="btn btn-default">Back</a></span></div>
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
        <tbody>
        <tr>
            <th scope="row">Name :</th>
            <td>{{$notify->data['name']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
          <tr>
            <th scope="row">Email :</th>
            <td>{{$notify->data['email']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Mobile Number :</th>
            <td>{{$notify->data['mobile_no']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Enquiry :</th>
            <td>{{$notify->data['enquiry_msg']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
          </div>
          </div><?php $notify->update(['read_at' => now()]); ?>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
