<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bài tập 5</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function(){
  
    $('#myTable1').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin.users.getUsers') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'roles', name: 'roles' },
            { data: 'action', name: 'action' },
          
           
        ]
    });
});
  </script>
   <script>
  $(document).ready(function(){
   $('#myTable').dataTable();

  });
  </script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
 
<div class="container">
 
<!-- Phần header website -->
<div class="jumbotron -p3 my-3 bg-secondary text-white" style="margin-bottom:0">
<div class="row">
      <div class="col-8 col-sm-6">
      <img src="../../bootstrap/images/hung1.jpg" style="width:170px;height:150px" class="rounded-circle" alt='Cinque Terre'>
      </div>
      <div class="col-4 col-sm-6" style="font-family:Monaco">
      <h1>Stt:28</h1>
      <h1>Họ tên:Nguyễn Công Hưng</h1>
      <h1>MSV:AT130822</h1>
      </div>
    </div>
</div>
<!-- Kết thúc phần header website -->
 
<!-- Phần menu chính -->

<!-- Kết thúc phần menu chính -->
 
<!-- Phần nội dung chính -->
<div class="row">
 
    <!-- Cột trái -->
  
    <div class="w-25 p-3" style='background-color:#e3f2fd'>
      
      <h3>Menu</h3>
      <div class="btn-group-vertical">
      <ul   class="navbar-expand-md navbar-light  text-dark shadow-sm ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" class="btn btn-success">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" class="btn btn-success">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @can('manage-user')
                                    <a class="dropdown-item  bg-dark text-white" href="{{ route('admin.users.index') }}">
                                     usermanagement
                                    </a>
                                    @endcan
                                    </a>
                                    @can('xem-sach')
                                    <a class="dropdown-item " href="{{ route('thuthu.users.index') }}">
                                     xem danh sach
                                    </a>
                                    @endcan
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
</div>

      <hr class="d-sm-none">
    </div>
  
    <!-- Kết thúc cột trái -->
     
    <!-- Cột phải -->
    <div class="w-75 p-3" style=' style="background-color: #eee;'>
    <br>
    @yield('content')
    </div>
    <!-- Kết thúc cột phải -->
     
  </div>
</div>
<!-- Kết thúc phần nội dung chính -->
 
<!-- Phần Footer -->
<div class="jumbotron text-center" >
  <p>Bản quyền 2020 thuộc về Nguyễn Công Hưng</p>
</div>
<!-- Kết thúc phần Footer -->
 
</body>
</html>