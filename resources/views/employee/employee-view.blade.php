
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
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees</h3>
              <a type="button" href="{{url('employee/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Employee</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Telephone</th>
                  <th>Mobile</th>
                  <th>Email Address</th>
                  <th>Advance Paid</th>
                  <th>Amount To Pay</th>
                   <th>Last Modified</th>
                  <th>Action</th>                 
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
                        &nbsp;&nbsp;
                      <!--  {{ Form::open(array('url' => 'employee/' . $value->empId, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Employee"></span>', array( 'type'=>'submit')) }}
                      {{ Form::close() }}  -->

                       <!--  <a href="{{ URL::to('employee.destroy',$value->empId) }}">
                        <span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Employee"></span>
                       </a> -->                      
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