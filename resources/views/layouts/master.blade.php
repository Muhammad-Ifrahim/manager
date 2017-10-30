<!doctype html>
<html lang="{{ app()->getLocale() }}">
      <head>
        
           <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <meta name="csrf-token" content="{{ csrf_token() }}">
           
           <link href="{{ asset('asset/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
           <link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
            <!-- Including Files-->
           <link rel="stylesheet" href="{{asset('asset/Ionicons/css/ionicons.min.css') }}">
           <link rel="stylesheet" href="{{ asset('asset/dist/css/AdminLTE.min.css') }}">
           <link rel="stylesheet" href="{{ asset('asset/dist/css/skins/_all-skins.min.css') }}">
           <link rel="stylesheet" href="{{asset('asset/morris.js/morris.css') }}">
           <link rel="stylesheet" href="{{asset('asset/jvectormap/jquery-jvectormap.css')}}">
    


           <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
           <!-- <link rel="stylesheet" href="{{asset('asset/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> -->
           <!-- Data Tables -->
           <!--link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"-->
           <link rel="stylesheet" href="{{asset('asset/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
           <link rel="stylesheet" href="{{ asset('asset/bootstrap-daterangepicker/daterangepicker.css') }}">
           <link rel="stylesheet" href="{{ asset('asset/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 

  </head>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper" >

        @include('partials.header')

          @include('partials.sidebar')
              <div class="content-wrapper">
                      @yield('content')
     
                </div>
              
         @include('partials.footer')
     </div>
                        <!-- Scrips Included from the Public Asset Folder -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                        
      <script src="{{asset('asset/jquery/dist/jquery.min.js')}}"></script>
      <script src="{{asset('asset/jquery-ui/jquery-ui.min.js')}}"></script>
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <script src="{{ asset('asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script
      
     <!--  <script src="{{ asset('asset/raphael/raphael.min.js') }}"></script> -->
                        <!-- Data Tables -->
      <script src="{{ asset('asset/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{ asset('asset/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
      <script src="{{ asset('asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>

      <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->

      <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
      <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->

      <!-- Bootstrap Date-Picker Plugin -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
   
         {!! Toastr::message() !!}
     
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
        });

    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'top'
     });
   });
      
   // $('input[type="checkbox"]').click(function () {

          
   //      if(this.checked)
   //         $('#'+this.id).fadeIn(1000,function(){
   //         });
   //       else 
   //         $('#'+this.id).fadeOut();  
   //  });
                // Customize the Dashboard

  
</script>
</html>


