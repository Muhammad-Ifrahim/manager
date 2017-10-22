
  @extends('layouts.master')

  @section('content')
    <style type="text/css">
        .box-header .box-title {
    display: inline-block;
    font-size: 23px;
    margin: 3px;
    line-height: 1;
    color: rgba(76, 175, 80, 0.87);
    }
    </style>     

    

    <section class="content">
      <div class="row">
      <section>Settings</section>
      
      <li>
        <a href="{{url('date-setter')}}">
          <b></i> <span>Start Date</span></b>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      </div>
    </section>
    @endsection('content')