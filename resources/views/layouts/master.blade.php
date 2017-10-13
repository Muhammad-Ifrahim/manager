<!doctype html>
<html lang="{{ app()->getLocale() }}">
      <head>
        
           <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
           
           <link href="{{ asset('asset/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
           <link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
            <!-- Including Files-->
           <link rel="stylesheet" href="{{asset('asset/Ionicons/css/ionicons.min.css') }}">
           <link rel="stylesheet" href="{{ asset('asset/dist/css/AdminLTE.min.css') }}">
           <link rel="stylesheet" href="{{ asset('asset/dist/css/skins/_all-skins.min.css') }}">
           <link rel="stylesheet" href="{{asset('asset/morris.js/morris.css') }}">
           <link rel="stylesheet" href="{{asset('asset/jvectormap/jquery-jvectormap.css')}}">
           <!-- <link rel="stylesheet" href="{{asset('asset/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> -->
           <!-- Data Tables -->
           <link rel="stylesheet" href="{{asset('asset/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
           <link rel="stylesheet" href="{{ asset('asset/bootstrap-daterangepicker/daterangepicker.css') }}">
           <link rel="stylesheet" href="{{ asset('asset/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 

  </head>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

        @include('partials.header')

          @include('partials.sidebar')
              <div class="content-wrapper">
                      @yield('content')
     
                </div>
              
         @include('partials.footer')
     </div>
                        <!-- Scrips Included from the Public Asset Folder -->
      <script src="{{asset('asset/jquery/dist/jquery.min.js')}}"></script>
      <script src="{{asset('asset/jquery-ui/jquery-ui.min.js')}}"></script>
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <script src="{{ asset('asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
     <!--  <script src="{{ asset('asset/raphael/raphael.min.js') }}"></script> -->
                        <!-- Data Tables -->
      <script src="{{ asset('asset/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{ asset('asset/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
      <script src="{{ asset('asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="{{asset('asset/dist/js/adminlte.min.js') }}"></script>
      

                          <!-- Scripts Ended -->
       <script>
      $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
    })
  })
</script>
        
</html>

</style>
