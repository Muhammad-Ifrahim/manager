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
    
    <script type="text/javascript">
      function ConfirmDelete()
      {
      var x = confirm("Are you sure you want to delete?");
      if (x)
        return true;
      else
        return false;
      }
    </script>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Businesses</h3>
              <!--a type="button" href="{{url('business/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Business</a-->
              @if($user->userType=='Admin')
              <div class="btn-group" style="float: right;width: 13%">
              <button type="button" onclick="location.href='{{url('business/create')}}'" class="btn btn-primary">New Business</button>
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"         aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{url('business/createSub')}}">New Sub Business</a>
              </ul>
            </div>
            @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped" width="400" align="center">
                <thead>
                <tr>
                  <th class="col-md-1" >Name</th>              
                </tr>
                </thead>
                <tbody>
                @Foreach($business as $key => $value)
                    <tr>
                      <td class="col-md-1"><a href="{{  url($value->bId.'/business')}}">{{$value->name}}
                      </a>
                      
                      {{ Form::open(array('url' => 'business/' . $value->bId, 'class' => 'pull-right', 'onsubmit' => 'return ConfirmDelete()')) }}
                      {{ Form::hidden('_method', 'DELETE')}}
                      {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Business"></span>', array( 'type'=>'submit')) }}
                      {{ Form::close() }} 
                      
                      </td>
                    </tr> 
                 @endForeach
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection('content')