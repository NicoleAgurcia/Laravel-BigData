<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> DEMO REPORTES<!-- {{ config('app.name', 'Laravel') }} --></title>

    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper"> 
  <header class="main-header">
    <a href="../../index2.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="" class="img-circle" alt="User Image">
                <p href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} 
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
               </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
  
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        @if (Auth::guest())
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        @endif     
      </ul>

    </section>
  </aside>

  <div class="content-wrapper">
   <section class="content-header">
      <h1>
        @yield('title')
      </h1>
  
    </section>

    <section class="content">
      <div class="row">
       @yield('content')
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.11
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<!-- <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
 -->
<script src="/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/plugins/moment/min/moment.min.js"></script>

<script type="text/javascript" src="/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

 <!-- Bootstrap 3.3.6 -->
<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- TEXT EDITOR -->
<script type="text/javascript">
  $(function () {
    $('#from').datetimepicker({
     format:'YYYY-MM-DD'
    });
    $('#to').datetimepicker({
      format:'YYYY-MM-DD'
    });     
  });

</script>

<script>
  $(function () {
    CKEDITOR.replace('editor1');
    $(".textarea").wysihtml5();
  });
</script>
</body>

</html>
