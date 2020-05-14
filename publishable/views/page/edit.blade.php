@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Edit {{$page->page_title}}</h2>
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
                <h5 class="card-title">{{$page->page_title}} Details</h5>
        <div class="table-responsive">
    <form action="{{route('page.update', $page->id)}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }} 
      <div class="row">
      <div class="col-md-8">
        <div class="form-group">
        <label for="page_title">Page Title <span style="color: red;">*</span></label>
        <input value="{{$page->page_title}}" type="text" class="form-control{{ $errors->has('page_title') ? ' is-invalid' : '' }}" name="page_title" placeholder="Enter title of the page">
      </div>
      <div class="form-group">
        <label for="page_excerpt">Excerpt of Page</label>
        <textarea class="form-control{{ $errors->has('page_excerpt') ? ' is-invalid' : '' }}" rows="3" name="page_excerpt" placeholder="Enter excerpt of the page">{{$page->page_excerpt}}</textarea>
      </div>
      <div class="form-group"><img src="{{url('/')}}/storage/pagefeaimage/{{ $page['feature_image'] }}" height="100px" />
        <label class="material-icons" for="feature_image">wallpaper</label>
        <div>Change Feature Image <small> If need?</small></div>        
        <input type="file" id="feature_image" name="feature_image" value="" />
      </div>
      </div>
      <div class="col-md-4">      
       <div class="form-group">
        <label for="menu_name">Menu Name<span style="color: red;">*</span></label>
        <input value="{{$menulist->menu_name}}" type="text" class="form-control{{ $errors->has('menu_name') ? ' is-invalid' : '' }}" name="menu_name" placeholder="Enter title of the page">
      </div>

       <div class="form-group">
         <label for="parent_id">Parent Menu<span style="color: red;">*</span></label>
         <select name="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" id="parent_id">           
            <option value="0" <?php if($menulist->parent_id==0) echo 'selected'; ?>>Root</option>            
            <?php $allmenus=Webzera\Lararoleadmin\Menulist::where('menu_level', 1)->get(); ?>
                @foreach ($allmenus as $menu)
                  <option value="{{ $menu->page_id }}" <?php if($menu->page_id==$menulist->parent_id) echo 'selected'; ?>>{{ $menu->menu_name }}</option>
                @endforeach
         </select>
       </div>
       <div class="form-group">
        <label for="menu_weight">Menu Weight<span style="color: red;">*</span></label>
        <input value="{{$menulist->menu_weight}}" type="number" class="form-control{{ $errors->has('menu_weight') ? ' is-invalid' : '' }}" name="menu_weight" placeholder="Enter menu weight for sort">
      </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="page_content">Content of Page <span style="color: red;">*</span></label>
            <textarea class="form-control{{ $errors->has('page_content') ? ' is-invalid' : '' }}" rows="15" name="page_content" id="page_content" placeholder="Enter content of the page">{{$page->page_content}}</textarea>
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
  filebrowserImageBrowseUrl: '/ruddra/public/laravel-filemanager?type=Images',
  filebrowserImageUploadUrl: '/ruddra/public/laravel-filemanager/upload?type=Images&_token={{csrf_field() }}',

};
CKEDITOR.replace('page_content', options);
</script>
@endsection
