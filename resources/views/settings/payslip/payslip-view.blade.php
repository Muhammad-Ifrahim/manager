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
              <h3 class="box-title">Payslips</h3>

              <a type="button" href="{{url('payslip/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Payslip</a>
            </div>
            
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Date</th>
                  <th class="col-md-2">Employee</th>
                  <th class="col-md-1">Gross Pay</th>
                  <th class="col-md-1">Deduction</th>
                  <th class="col-md-1">Net Pay</th>
                  <th class="col-md-1" >Contribution</th>
                  <th class="col-md-1">Action</th>                 
                </tr>
                </thead>
                <tbody>
                @Foreach($payslip as $key => $value)
                    <tr>
                      <td class="col-md-1">{{$value->Date}}</td>
                      <td class="col-md-2">{{$value->User->name}}</td>
                      <td class="col-md-1">{{$value->GrossPay}}</td>
                      <td class="col-md-1">{{$value->Deduction}}</td>
                      <td class="col-md-1">{{$value->NetPay}}</td>
                      <td class="col-md-1">{{$value->Contribution}}</td> 
                      <td class="col-md-1">
                      <div class="action-region">
                       <a href="{{ URL::to('payslip/' . $value->payId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Payslip"></span>
                       </a>
                       {{ Form::open(array('url' => 'payslip/' . $value->payId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Payslip"></span>', array( 'type'=>'submit')) }}
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