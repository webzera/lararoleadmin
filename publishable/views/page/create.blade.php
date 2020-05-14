@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Create Page</h2>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('page.index')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i>View Pages</a>
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
                <h5 class="card-title">Add Page Details</h5>
        <div class="table-responsive">
    <form action="{{route('page.store')}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="row">
      <div class="col-md-8">
        <div class="form-group">
        <label for="page_title">Page Title <span style="color: red;">*</span></label>
        <input type="text" class="form-control{{ $errors->has('page_title') ? ' is-invalid' : '' }}" name="page_title" placeholder="Enter title of the page">
      </div>
      <div class="form-group">
        <label for="page_excerpt">Excerpt of Page</label>
        <textarea class="form-control{{ $errors->has('page_excerpt') ? ' is-invalid' : '' }}" rows="3" name="page_excerpt" placeholder="Enter excerpt of the page"></textarea>
      </div>
      <div class="form-group">
        <label class="material-icons" for="feature_image">wallpaper</label>
        <div>Upload Feature Image <small> If need?</small></div>
        <input type="file" id="feature_image" name="feature_image" value="" />
      </div>
      </div>
      <div class="col-md-4">
        {{-- <div class="form-group">
         <label for="page_type">Select Type <span style="color: red;">*</span></label>
         <select name="page_type" class="form-control" id="page_type">
           <option value=''>select type</option>
            <option value="page" selected>Page</option>
            <option value="post">Post</option>
         </select>
       </div> --}}
       {{-- <div class="form-group">
         <label for="comment_status">Comment Status <span style="color: red;">*</span></label>
         <select name="comment_status" class="form-control" id="comment_status">
           <option value=''>comment status</option>
            <option value="open">Open</option>
            <option value="close" selected>Close</option>
         </select>
       </div> --}}
       <div class="form-group">
        <label for="menu_name">Menu Name<span style="color: red;">*</span></label>
        <input type="text" class="form-control{{ $errors->has('menu_name') ? ' is-invalid' : '' }}" name="menu_name" placeholder="Enter title of the page">
      </div>
      {{-- <div class="form-group">
         <label for="menu_type">Menu Type<span style="color: red;">*</span></label>
         <select name="menu_type" class="form-control" id="menu_type">
           <option value=''>menu type</option>
            <option value="Top" selected>Top</option>            
            <option value="Side">Side</option>
            <option value="Footer">Footer</option>
         </select>
       </div> --}}
       <div class="form-group">
         <label for="parent_id">Parent Menu<span style="color: red;">*</span></label>
         <select name="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" id="parent_id">           
            <option value="0" selected>Root</option>            
            <?php $allmenus=Webzera\Lararoleadmin\Menulist::all(); ?>
                @foreach ($allmenus as $menu)
                  <option value="{{ $menu->page_id }}">{{ $menu->menu_name }}</option>
                @endforeach
         </select>
       </div>
       <div class="form-group">
        <label for="menu_weight">Menu Weight<span style="color: red;">*</span></label>
        <input type="number" class="form-control{{ $errors->has('menu_weight') ? ' is-invalid' : '' }}" name="menu_weight" placeholder="Enter menu weight for sort">
      </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="page_content">Content of Page <span style="color: red;">*</span></label>
            <textarea class="form-control{{ $errors->has('page_content') ? ' is-invalid' : '' }}" rows="15" name="page_content" id="page_content" placeholder="Enter content of the page"></textarea>
          </div>
          <button type="submit" class="btn btn-success float-right">Submit</button>
        </div>
      </div>
    

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
@section('scripts')
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
var options = {
  filebrowserImageBrowseUrl: '/newadminpack/public/laravel-filemanager?type=Images',
  filebrowserImageUploadUrl: '/newadminpack/public/laravel-filemanager/upload?type=Images&_token={{csrf_field() }}',
};
CKEDITOR.replace('page_content', options);
</script>
@endsection
