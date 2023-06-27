@include('admin.layouts.header_files')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  @include('admin.layouts.top_bar')

  @include('admin.layouts.side_menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  @yield('contents')
   

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer_credit')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layouts.footer_files')
