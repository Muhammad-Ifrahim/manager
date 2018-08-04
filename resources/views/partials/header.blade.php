
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
        <ul class="nav navbar-nav">
        <li>
          <a  type="button" href="{{url('pos')}}" class="btn btn-block btn-warning btn-md">POS</a>  
        </li>
            <li class="dropdown"> 
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    {{$user->name}}
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ URL::to('/business') }}">Profile</a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}">Sign Out</a>
                    </li>
                </ul>
            </li>
            
        </ul>  
    </div>

</nav>
</header> 

