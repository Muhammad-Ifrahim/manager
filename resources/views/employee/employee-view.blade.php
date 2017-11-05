
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

    

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees</h3>

              <a type="button" href="{{url('employee/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Employee</a>
            </div>
            
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1" >Name</th>
                  <th class="col-md-1">Telephone</th>
                  <th class="col-md-1">Mobile</th>
                  <th class="col-md-1">Email Address</th>
                  <th class="col-md-1">Advance Paid</th>
                  <th class="col-md-1" >Amount To Pay</th>
                  <th class="col-md-1" >Last Modified</th>
                  <th class="col-md-1">Action</th>                 
                </tr>
                </thead>
                <tbody>
                @Foreach($employees as $key => $value)
                    <tr>
                      <td class="col-md-1">{{$value->name}}</td>
                      <td class="col-md-1">{{$value->telephone}}</td>
                      <td class="col-md-1">{{$value->mobile}} </td>
                      <td class="col-md-1">{{$value->email_address}}</td>
                      <td class="col-md-1">{{$value->amount_to_pay}} </td>
                      <td class="col-md-1">{{$value->advance_paid}}</td>
                      <td class="col-md-1">{{$value->updated_at}}</td>
                      <td class="col-md-1">
                      <div class="action-region">
                       <a href="{{ URL::to('employee/' . $value->empId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Employee"></span>
                       </a>
                       {{ Form::open(array('url' => 'employee/' . $value->empId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Employee"></span>', array( 'type'=>'submit')) }}
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