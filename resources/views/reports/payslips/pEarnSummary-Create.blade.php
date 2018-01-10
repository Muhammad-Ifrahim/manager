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

  <section class="content">
   <div class="row">
       <div class="col-md-12">
        <div class="box">
            <div class="box-header">
               <h2 class="box-title">Payslip Summary</h2>
            </div>
        
        <div class="box-body">
        
        @include('common.errors')
    
        {!! Form::open(['url' => 'EarnReport',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
    
        <!-- Name -->
        <div class="form-group">
            {!! Form::label('From', 'From:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('From', $value = null, ['class' => 'form-control']) !!}
            </div>
        </div>

       <div class="form-group">
            {!! Form::label('To', 'To:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('To', $value = null, ['class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('Description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Description', $value = null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            </div>
        </div>
        {{ Form::hidden('payType', 'Summary')}}
        {{ Form::hidden('bId', Session::get('bId'))}}

        <!-- Submit Button -->
        <div class="col-lg-5">
            {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success pull-middle'] ) !!}
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