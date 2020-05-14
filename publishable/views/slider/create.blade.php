@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Create Slider</h2>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('slider.index')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i>View slider</a>
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
                <h5 class="card-title">Add Slider Details</h5>
        <div class="table-responsive">
    <form action="{{route('slider.store')}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Slider Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="enter Slider name">
      </div>
      <div class="form-group">
        <label for="caption">Slider Caption</label>
        <input type="text" class="form-control" name="caption" id="caption" placeholder="enter slider caption">
      </div>
      <div class="form-group">
        <label for="sub_caption">Sub Caption</label>
        <input type="text" class="form-control" name="sub_caption" id="sub_caption" placeholder="enter Sub caption">
      </div>
      <div class="form-group">
        <label class="material-icons" for="slider_image">wallpaper</label>
        <input type="file" id="slider_image" name="slider_image" value="" /><span>Slider Image upload</span>  <div style="color: blue" > Check image height 1200x500 </div>
      </div>
      <div class="form-group">
        <label for="link_url">Link Url</label>
        <input type="text" class="form-control" name="link_url" id="link_url" placeholder="enter link url">
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
