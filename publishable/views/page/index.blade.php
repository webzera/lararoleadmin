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
            <h2 class="m-0 text-dark">Pages</h2>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('page.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> Create New Page</a>
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
                <h5 class="card-title">Page Details</h5>

        <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>Title</th>      
      <th>Excerpt</th>
      <th>Menu Name</th>
      <th>Parent</th>
      <th>Sort</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($allpages as $rowpage): ?>
      <tr>
      <td><img src="{{url('/')}}/storage/pagefeaimage/{{ $rowpage['feature_image'] }}" height="60px" /></td>
      <td>{{$rowpage->page_title}}</td>
      <td>{{$rowpage->page_excerpt}} <?php $menudetail=Webzera\Lararoleadmin\Menulist::where('page_id', $rowpage->id)->first(); ?></td>
      <td>{{$menudetail->menu_name}}</td>
      <td><?php if($menudetail->parent_id==0) echo 'Root'; else echo App\Menulist::getParentname($menudetail->parent_id); ?></td>
      <td>{{$menudetail->menu_weight}}</td>      
      <td>
        <div class="columns is-mobile">
        <div class="column is-one-half">
          <a href="{{route('page.edit', $rowpage->id)}}" class="button is-light is-fullwidth"><button type="button" class="btn btn-primary btn-sm" > Edit </button></a>        
        </div>
        {{-- <span class="column is-one-half">
        <form method="POST" action="{{route('page.destroy', $rowpage->id)}}"> 
          @csrf 
          {{ method_field('DELETE') }} 
          <input class="btn-sm btn btn-danger"  value="Delete" type="submit">
          </form>          
        </li></a>
        </span> --}}
        </div>
      </td>
    </tr>
  <?php  endforeach; ?>

  </tbody>
{{$allpages->links()}}
</table>
{{$allpages->links()}}
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
