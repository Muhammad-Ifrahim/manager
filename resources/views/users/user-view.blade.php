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
    button{
    padding: 0;
    border: none;
    background: none;
    }
    .pull-left{
      margin-right: 10px;
    }
     .action-region span{
            font-size: 20px;        
            text-decoration: none;
            margin: 0 10px;
      } 
    </style>     

    <script>

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
              <h3 class="box-title">Peoples</h3>

              <a type="button" href="{{url('user/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New People</a>
            </div>
            
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1" >Name</th>
                  <th class="col-md-1">Business</th>
                  <th class="col-md-1">Role</th>
                  <th class="col-md-1">Email</th>
                  <th class="col-md-1">Action</th>                 
                </tr>
                </thead>
                <tbody>
                @Foreach($allUser as $allUserkey => $value)
                    <tr>
                      <td class="col-md-1">{{$value->name}}</td>
                      <td class="col-md-1">{{$value->business->description}}</td>
                      <td class="col-md-1">{{$value->userType}}</td>  
                      <td class="col-md-1">{{$value->email}}</td>
                      <td class="col-md-1">
                      <div class="action-region">
                       <a href="{{ URL::to('user/' . $value->id . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit User"></span>
                       </a>
                       {{ Form::open(array('url' => 'user/' . $value->id, 'class' => 'pull-left', 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete User"></span>', array( 'type'=>'submit')) }}
                       {{ Form::close() }}                    
                      </div>
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