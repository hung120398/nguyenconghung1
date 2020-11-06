<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
  <title>@yield('title')</title>
	<link rel="stylesheet" href="{{Asset('bootstrap/css/bootstrap.css')}}"/>
	<link rel="stylesheet" href="{{Asset('bootstrap/css/style.css')}}"/>
	
	<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
  <div id="topimg">

    

  <table>
  <tr>
  <td>
  <img src="bootstrap/images/hung1.jpg" style="width:170px;height:150px">
  </td>
  <td>
    <h1>stt:28|</h1>
    <h1>họ và tên :Nguyễn Công Hưng|</h1>
    <h1>MSV:AT130822</h1>
  </td>
  </tr>


  </table>
    
  
  </div>
  

  <div id="sidebar">
    <h2>Menu 1</h2><br>
    <div class="btn-group-vertical" style='width:150px'>
    @if (Route::has('login'))
             
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-success">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"  class="btn btn-success">Register</a>
                        @endif
                    @endauth
              
            @endif
    
</div>

  </div>
  <div id="content">
    lllllllll
    <table width='500px' height='500px'>
    <tr>
    <td>
    @yield("content")
    </td>
    </tr>
    
    </table>
  <div id="footer">  &copy; 2020 Anyone | Design by Nguyễn Công Hưn
    
  </div>
</div>

</body>
</html>
