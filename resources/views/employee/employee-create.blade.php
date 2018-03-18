@extends('layouts.master')

@section('content')
 
  <style type="text/css">
    .form-control{
        height: 37px;
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
    .forInline {
        float: left;
        margin: 5px;
    }
    .wider {
        width: 75px;
        text-align: center;
    }
    .highter {
        height: 175px;
    }
/*
    .required:after {
        content: '*';
        color: red;
        padding-left: 5px;
    }*/
  </style>
  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#checker").click(function(){
            console.log('2');
        var formElementVisible = $(this).is(":checked");
            //show if checked
            if ( formElementVisible ){
                var check = document.getElementById('divId').value;
                //console.log('DB value '+ document.getElementById('divId').value);
                if(check=='1')
                {
                    $("#stDate").show();
                    $("#amount1").show();
                    $("#bal").show();
                }
                else
                {
                    $(".shownDiv").show();
                }
                return true;
            }
            else{
                $("#stDate").hide();
                $("#amount1").hide();
                $(".shownDiv").hide();
                $("#bal").hide();
            }
        });
    });
    </script>

  <section class="content">
   <div class="row">
       <div class="col-md-12">
        <div class="box">
            <div class="box-header">
               <h2 class="box-title">Add Employee</h2>
            </div>
        
        <div class="box-body">
        
        @include('common.errors')
    
        {!! Form::open(['url' => 'employee',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
    
        <!-- Name -->
        <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                 {!! $errors->first('Name', '<p class="help-block"> Name Required</p>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('Address', 'Address:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Address', $value = null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('Email_Address') ? ' has-error' : ''}}">
            {!! Form::label('Email Address', 'Email Address:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Email_Address', $value = null, ['class' => 'form-control', 'placeholder' => 'someone@email.com']) !!}
             <div class="help-block">{{ $errors->first('Email_Address') }}</div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('Telephone', 'Telephone:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Telephone', $value = null, ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('Mobile', 'Mobile:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Mobile', $value = null, ['class' => 'form-control', 'placeholder' => 'Mobile']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Additional Information', 'Additional Information:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Additional Information', $value = null, ['class' => 'form-control', 'placeholder' => 'Additional Information']) !!}
            </div>
        </div>

        @php
        if(sizeof($strtDate)==0)
        {
            $show=false;
        }
        else
        {
            $show=true;   
        }
        @endphp

        <div>
        {{ Form::hidden('', $show, ['id'=>'divId']) }} 
        </div>
        
        <div class="col-lg-5" style="margin-left: 25px">
            {{ Form::checkbox('checkValue','1', false, ['id' => 'checker']) }} Starting Balance as at 
            @foreach($strtDate as $object)
                {{ $object->date}}
            @endforeach
        </div>  
        
        <div id="shownDiv" class="shownDiv" style="display:none;">
        <br>
            <b>You will be able to enter starting balance once you set start date under settings tab</b>
        </div>
        <br>
        <br>
        
        <div style="margin-left: 35px">
            <div id="stDate" class="forInline" style="display: none;">
                {{ Form::text('stDate', $dateValue, array('disabled','class' => 'wider')) }}
            </div>

            <div id="amount1" class="forInline" style="display:none;">
                {{ Form::select('paymentStatus', ['ap'=>'Amount to pay', 'pa'=>'Paid in advance'], array('class'=>'highter')) }}
            </div>
            
            <div id="bal" class="forInline" style="display:none;">
                {!! Form::text('amount', $value = null, ['class' => 'form-control']) !!}
            </div>

        </div>    

        {{ Form::hidden('bId', Session::get('bId')) }}

        <!-- 'required'=>'required' Submit Button -->
        <div class="form-group">

                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success pull-middle'] ) !!}
            
        <!--     <div class="btn-group">
              <button type="button" class="btn btn-danger">Submit</button>
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"         aria-haspopup="true" aria-expanded="false">
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