
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
                  <th>Address</th>
                  <th>Email Address</th>
                  <th>Telephone</th>
                  <th>Mobile</th>
                  <th>Additional Information</th>
                  <th>Advance Paid</th>
                  <th>Amount To Pay</th>
                  <th>Last Modified</th>
                </tr>
                </thead>
                <tbody>
                @Foreach($employees as $key => $value)
                    <tr>
                      <td class="col-md-1">{{$value->name}}</td>
                      <td class="col-md-1">{{$value->address}} </td>
                      <td class="col-md-1">{{$value->email_address}}</td>
                      <td class="col-md-1">{{$value->telephone}}</td>
                      <td class="col-md-1">{{$value->mobile}} </td>
                      <td class="col-md-1">{{$value->additional_information}}</td>
                      <td class="col-md-1">{{$value->amount_to_pay}} </td>
                      <td class="col-md-1">{{$value->advance_paid}}</td>
                      <td class="col-md-1">{{$value->updated_at}}</td>
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