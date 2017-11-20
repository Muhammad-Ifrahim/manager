
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
    ul {
          list-style: none;
    margin-top: 25px;
    margin-left: 5px;
    }
    .settings{
        font-size: 25px;
    }
    </style>     

    

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
            <ul >  
              <li class="settings">
                <a href="{{url('date-setter')}}">
                  <i class="fa fa-calendar" ></i> <span>Start Date</span>

                <a href="{{url('pearnitem')}}">
                  <i class="fa fa-newspaper-o" ></i> <span>Payslip Items</span>

                  <span class="pull-right-container">
                  </span>
                </a>
              </li>
            </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection('content')