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
          <h3 class="box-title">Employees</h3>
          <a type="button" href="{{url('employee/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Employee</a>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="col-md-1">Name</th>
                <th class="col-md-1">Telephone</th>
                <th class="col-md-1">Mobile</th>
                <th class="col-md-1">Email</th>
                <th class="col-md-1">Advance Paid</th>
                <th class="col-md-1">Amount To Pay</th>
                <th class="col-md-1">Last Modified</th>
                <th class="col-md-1">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
              {{--Using these variables for calculating sum of Advance amount and Payment amount to display in View--}}
              $sumPa=0;
              $sumAp=0;
              @endphp
              @Foreach($employees as $key => $value)
              <tr>
                <td class="col-md-1">{{$value->name}}</td>
                <td class="col-md-1">{{$value->telephone}}</td>
                <td class="col-md-1">{{$value->mobile}} </td>
                <td class="col-md-1">{{$value->email_address}}</td>
                @if ($value->paymentStatus === 'pa')
                <td class="col-md-1">{{$value->amount}} </td>
                @php
                $sumPa = $sumPa+$value->amount;
                @endphp
                <td class="col-md-1"></td>
                @else
                @php
                $sumAp = $sumAp + $value->amount;
                @endphp
                <td class="col-md-1"></td>
                <td class="col-md-1">{{number_format($value->amount,2)}}</td>
                @endif
                <td class="col-md-1">{{$value->updated_at}}</td>
                <td class="col-md-1">
                  <div class="action-region">
                    <a href="{{ URL::to('employee/' . $value->empId . '/edit') }}">
                      <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Employee"></span>
                    </a>
                    {{ Form::open(array('url' => 'employee/' . $value->empId, 'class' => 'pull-left', 'onsubmit' => 'return ConfirmDelete()')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Employee"></span>', array( 'type'=>'submit')) }}
                    {{ Form::close() }}
                  </div>
                </td>
              </tr>
              @endForeach
              
            </tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                @if($sumPa>0)
                <strong>{{number_format($sumPa,2)}}</strong>
                @endif
              </td>
              <td>
                @if($sumAp>0)
                <strong>{{number_format($sumAp,2)}}</strong>
                @endif
              </td>
              
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection('content')