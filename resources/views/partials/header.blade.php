
   <header class="main-header">
    <a href="{{ URL::to('/') }}" class="logo">
      <span class="logo-mini"><b>K</b>.IO</span>
      <span class="logo-lg"><b>KOMPANIA</b>.IO</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
       
      </div>
      <div>
        <li>

        <a href="{{ url('/logout') }}" class="logo" style="float: right; onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
      </li>
      </div>
    </nav>
  </header> 
