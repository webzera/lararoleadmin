@section('styles')
<style>
</style>
@endsection

<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('vendor/laradmin/img/sidebar-1.jpg') }}">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo"><a href="#" class="simple-text logo-normal">
      WEBZERA
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <?php
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('@', $controllerAction);     
      ?>
      <li class="nav-item <?php if($controller=='AdminController') echo 'active' ?>">
        <a class="nav-link" href="{{ route('admin::home') }}">
          <i class="material-icons">dashboard</i>
          <p>Dash Board</p>
        </a>
      </li>
      <li class="nav-item <?php if($controller=='SliderController') echo 'active' ?>">
        <a class="nav-link" href="{{ route('slider.index') }}">
          <i class="material-icons">location_ons</i>
          <p>Sliders</p>
        </a>
      </li>
      <li class="nav-item <?php if($controller=='PageController') echo 'active' ?>">
        <a class="nav-link" href="{{ route('page.index') }}">
          <i class="material-icons">library_books</i>
          <p>Pages</p>
        </a>
      </li>
      <li class="nav-item <?php if($controller=='AdminuserController') echo 'active' ?>">
        <a class="nav-link" href="{{ route('adminuser.index') }}">
          <i class="material-icons">person</i>
          <p>Admin User List</p>
        </a>
      </li>
            
      <li class="nav-item <?php if($controller=='RoleController' && $action == 'adminrolelist') echo 'active' ?>">
        <a class="nav-link" href="{{ route('admin::adminrolelist') }}">
          <i class="material-icons">bubble_chart</i>
          <p>Admin User Role</p>
        </a>
      </li>
      <li class="nav-item <?php if($controller=='PermissionController' && $action == 'adminpermissionlist') echo 'active' ?>">
        <a class="nav-link" href="{{ route('admin::adminpermissionlist') }}">
          <i class="material-icons">bubble_chart</i>
          <p>Admin Role Permission</p>
        </a>
      </li>
      {{-- <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin::home') }}">
          <i class="material-icons">location_ons</i>
          <p>Maps</p>
        </a>
      </li> --}}
      <li class="nav-item <?php if($controller=='NotificationController') echo 'active' ?>">
        <a class="nav-link" href="{{ route('admin::allnotify') }}">
          <i class="material-icons">notifications</i>
          <p>Notifications</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin::home') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
          <i class="material-icons">language</i>
          <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
      </li>      
    </ul>
  </div>
</div>

@section('script')
<script>
</script>
@endsection
