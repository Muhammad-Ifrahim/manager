@extends('layouts.master')

@section('content')
 
  <style type="text/css">
    .form-control{
        height: 43px;
    }
  	.form-group {
    	margin-bottom: 35px;
    	width: 65%;
    	margin-left: 17%;
    	margin-top: 10px;
      }
    .form-horizontal{
   		margin-left:4px;
    }
    .btn-info, .btn-success {
    padding-top: 6px;
    height: 41px;
    margin-left: 25%;
    width: 25%;
    float: left;
     }
    .box-footer{
    	margin-left: 10%;  
    }
    .box-header .box-title {
    display: inline-block;
    font-size: 23px;
    margin: 3px;
    line-height: 1;
    color: rgba(76, 175, 80, 0.87);
    }
    .date-size {
        width = 10px;
    }

  </style>

    <script>
    $(document).ready(function()
    {
      var dateFrom=$('input[name="from"]'); //our date input has the name "date"
      var dateTo=$('input[name="to"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      dateFrom.datepicker(options);
      dateTo.datepicker(options);
    })
  </script>

  <section class="content">
   <div class="row">
       <div class="col-md-12">
        <div class="box">
            <div class="box-header">
               <h2 class="box-title">Payslip Summary</h2>
            </div>
        
        <div class="box-body">
        
        @include('common.errors')
    
        {{ Form::model($pReport, array('route' => array('ReportUpdate.update',$pReport->id.'-con'), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
    
              @if (Session::has('message'))
           <div class="alert alert-error">{{ Session::get('message') }}</div>
        @endif        
         <div class="form-group {{ $errors->has('from')?'has-error':''}} ">
          {!! Form::label('From', 'From:', ['class' => 'col-lg-2 control-label']) !!}          
          <div class="col-lg-5">
            {!! Form::text('from', $value = $pReport->from, ['class' => 'form-control', 'placeholder' => 'YYYY/MM/DD', 'name'=>'from']) !!}         
           <div class="help-block">{{ $errors->first('from') }}</div>
          </div>
         </div>

        <div class="form-group {{ $errors->has('to') ? 'has-error' : ''}}">
            {!! Form::label('To', 'To:', ['class' => 'col-lg-2 control-label']) !!}
         <div class="col-lg-5">
                {!! Form::text('to', $value = $pReport->to, ['class' => 'form-control', 'placeholder' => 'YYYY/MM/DD', 'name'=>'to']) !!}        
         <div class="help-block">{{ $errors->first('to') }}</div>
         </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('Description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Description', $value = $pReport->description, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            </div>
        </div>
        {{ Form::hidden('payType', 'Contribution')}}
        {{ Form::hidden('bId', Session::get('bId'))}}

        <!-- Submit Button -->
        <div class="col-lg-5">
          <button type="button" class="btn btn-lg btn-success pull-midlle" onclick="window.location='{{ URL::to('/EarnReport/con') }}'">Cancel</button>
          {!! Form::submit('Update', ['class' => 'btn btn-lg btn-success pull-middle'] ) !!}
            </div>
        <div class="form-group">
            
        <!--     <div class="btn-group">
              <button type="button" class="btn btn-success">Submit</button>
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"         aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Create and Add More</a>
              </ul>
            </div> -->
        </div>
    {!! Form::close()  !!}
     </div>
     </div>
    </div>   
   </div>
  </section>
@endSection('content')