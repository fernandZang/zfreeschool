<!DOCTYPE html>
<html>
<head>

  
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L1PCGMRW6Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-L1PCGMRW6Y');
    </script>

    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('proviseur.layouts.backend-dashboard.stylesheet')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed sidebar-collapse">
<div class="wrapper">


  @include('proviseur.layouts.backend-dashboard.navbar')  
  @include('proviseur.layouts.backend-dashboard.Sidebar') 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-3">
    <!-- /.content-header -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @include('proviseur.layouts.backend-dashboard.footer') 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 
@include('proviseur.layouts.backend-dashboard.javascript') 
@yield('mon_script')
</body>
</html>
