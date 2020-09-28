<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/my_admin.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Edu</b>System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <li class="dropdown messages-menu">
            <a href="{{ route('messages') }}" >
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ $msg }}</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form method="post" action="{{ route('logout') }}">
                    @csrf
                     <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                  </form>
                 
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->      
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       
        <li>
          <a href="{{ route('schools') }}">
            <i class="fa fa-th"></i> <span>Учебные центры</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($schools) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('regions') }}">
            <i class="fa fa-th"></i> <span>Регионы</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($regions) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('districts') }}">
            <i class="fa fa-th"></i> <span>Города</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($districts) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('courseCategories') }}">
            <i class="fa fa-th"></i> <span>Категории курсов</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('courses') }}">
            <i class="fa fa-th"></i> <span>Курсы</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($courses) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('books') }}">
            <i class="fa fa-th"></i> <span>Книги</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($books) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('categories') }}">
            <i class="fa fa-th"></i> <span>Категории книгей</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($categories) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('posts.index') }}">
            <i class="fa fa-th"></i> <span>Статьи</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($posts) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('audios') }}">
            <i class="fa fa-th"></i> <span>Аудиоуроки</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($audios) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('audioCategory') }}">
            <i class="fa fa-th"></i> <span>Категории аудиоуроков</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($audio_cats) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('videos') }}">
            <i class="fa fa-th"></i> <span>Видеоуроки</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($videos) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('videoCategory') }}">
            <i class="fa fa-th"></i> <span>Категории видеоуроков</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($video_cats) }}</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('thoughts') }}">
            <i class="fa fa-th"></i> <span>Афоризмы</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ count($video_cats) }}</small>
            </span>
          </a>
        </li>
        <li>
            <a href="{{ route('testResults') }}">
              <i class="fa fa-th"></i> <span>Резултаты тестов</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">22</small>
              </span>
            </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper admin">
    @if(session('flash'))
    <div class="col-lg-4 alert msg alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Alert!</h4>
      {{ session('flash')  }}
    </div>
    @endif

    @yield('content')
  </div>
  <!-- /.content-wrapper -->
 

  

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="/js/my.js"></script>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/bower_components/raphael/raphael.min.js"></script>
<script src="/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
</body>
</html>
