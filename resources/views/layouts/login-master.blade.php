<!doctype html>
<html lang="{{ app()->getLocale() }}">
      <head>
        
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <meta name="csrf-token" content="{{ csrf_token() }}">
           
           <link href="{{ asset('asset/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
           <link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
           <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        

  </head>
    <body>
      <div>
         @yield('content')
     </div>
                        <!-- Scrips Included from the Public Asset Folder -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                        
      <script src="{{asset('asset/jquery/dist/jquery.min.js')}}"></script>
      <script src="{{asset('asset/jquery-ui/jquery-ui.min.js')}}"></script>  
      <script src="{{ asset('asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script
     
         {!! Toastr::message() !!}
     


  
</script>
</html>


