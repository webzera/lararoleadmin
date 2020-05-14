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
            <h2 class="m-0 text-dark">Slider</h2>
          </div><!-- /.col -->
			<div class="col-sm-6">
            <a href="{{route('slider.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> Create New Slider</a>
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
                <h5 class="card-title">Slider Images</h5>

				<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>Name</th>      
      <th>Caption</th>
      <th>Sub caption</th>
      <th>Link</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($allslider as $latest): ?>
      <tr>
      <td><img src="{{url('/')}}/storage/slider/{{ $latest['slider_image'] }}" height="60px" /></td>
      <td>{{$latest->name}}</td>
      <td>{{$latest->caption}}</td>
      <td>{{$latest->sub_caption}}</td>
      <td>{{$latest->link_url}}</td>      
      <td>
        <div class="columns is-mobile">
        <div class="column is-one-half">
          <a href="{{route('slider.edit', $latest->id)}}" class="button is-light is-fullwidth"><button type="button" class="btn btn-primary btn-sm" > Edit </button></a>        
        </div>
        <span class="column is-one-half">
        <form method="POST" action="{{route('slider.destroy', $latest->id)}}"> 
          @csrf 
          {{ method_field('DELETE') }} 
          <input class="btn-sm btn btn-danger"  value="Delete" type="submit">
          </form>          
        </li></a>
        </span>
        </div>
      </td>
    </tr>
  <?php  endforeach; ?>

  </tbody>
{{$allslider->links()}}
</table>
{{$allslider->links()}}
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
