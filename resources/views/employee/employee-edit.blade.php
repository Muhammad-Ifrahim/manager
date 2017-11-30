@extends('layouts.master')

@section('content')
  <style type="text/css">
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
  </style>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
      console.log('1');
      var elem = document.getElementById('checker').value;
      console.log('Checker '+elem);
      //In case when page loads and checkbox is true so onclick functionality will not work and we
      //need to show rest of fields depending checkbox value
      /*var formElementVisible = $(this).is(":checked");
      console.log('--'+formElementVisible);
      if($(this).is(":checked")==false)
      {
         console.log('--ok');
        $("#stDate").hide();
        $("#amount1").hide();
        $("#bal").hide();
      }*/

      if ($('#checker').is(':checked') == false) {
          $("#stDate").hide();
          $("#amount1").hide();
          $("#bal").hide();
      }
      else
      {
        $("#stDate").show();
        $("#amount1").show();
        $("#bal").show();
      }
      
      $("#checker").on("load", function() {
        console.log('started');
      });

      $("#checker").click(function(){
          console.log('2');
      var formElementVisible = $(this).is(":checked");
      console.log(formElementVisible);
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
               <h2 class="box-title">Edit Employee: {{$employee->name}}</h2>
            </div>
        
        <div class="box-body">
          
        
      @include('common.errors')
         
       {{-- Form::open(['url' => 'employee/'.$employee->empId.'/update',  'method' => 'PUT', 'class' => 'form-horizontal']) --}}

       {{-- Form::model($employee, array('route' => 'employee/'.$employee->empId.'/update', 'method' => 'PUT', 'class' => 'form-horizontal')) --}}

        {{ Form::model($employee, array('route' => array('employee.update', $employee->empId), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
         
        <!-- Name -->
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('Name', $value = $employee->name, ['class' => 'form-control']) !!}
            </div>
        </div>
       <!-- Code -->
       <div class="form-group {{ $errors->has('Address') ? 'has-error' : '' }} ">
           {!!Form::label('Address','Address:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Address', $value=$employee->address, ['class' => 'form-control','placeholder' => 'Optional'])!!}
               <div class="help-block">{{ $errors->first('Address') }}</div>
           </div>
       </div>
       <!-- Buisness Identifier -->
         <div class="form-group">
           {!!Form::label('Email Address','Email Address:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
            {!! Form::text('Email Address', $value=$employee->email_address, ['class' => 'form-control','placeholder' => 'Optional'])!!}
           </div>
       </div>

        <!-- Email -->
       <div class="form-group  ">
           {!!Form::label('Telephone','Telephone:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Telephone', $value=$employee->telephone, ['class' => 'form-control','placeholder' => 'Telephone'])!!}
           </div>
       </div>
       <!-- Telephone -->
       <div class="form-group {{ $errors->has('Telephone') ? 'has-error' : ''}}  ">
           {!!Form::label('Mobile','Mobile:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Mobile', $value=$employee->mobile, ['class' => 'form-control'])!!}
              <div class="help-block">{{ $errors->first('Mobile') }}</div>
           </div>
       </div>
       <!-- Billing Address -->
       <div class="form-group {{ $errors->has('BillingAddress') ? 'has-error' : ''}}">
           {!!Form::label('Additional Information','Additional Information:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('Additional Information', $value=$employee->additional_information, ['class' => 'form-control', 'rows' => 3])!!}
           </div>
       </div>

        @php
        if(count($strtDate)==0)
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

      <div class="col-lg-30">
          {{ Form::hidden('checkValue', '0') }}
          {{ Form::checkbox('checkValue', '1', $employee->checkValue, ['id' => 'checker']) }} Starting Balance as at @foreach ($strtDate as $object)
              {{ $object->date}}
             @endforeach
      </div>  
              
      <div id="shownDiv" class="shownDiv" style="display:none;">
          You will be able to enter starting balance once you set Start date under Settings tab
      </div>

      <div id="amount1" style="display:none;">
      {{ Form::select('paymentStatus', ['ap'=>'Amount to pay', 'pa'=>'Paid in advance']) }}
      </div>

      <div class="col-lg-30" id="stDate" style="display: none;">
      {{ Form::text('stDate', $dateValue, array('disabled')) }}
      </div>

      <div id="bal" style="display:none;">
          {!! Form::text('amount', $value = null, ['class' => 'form-control']) !!}
      </div>

        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">               
                <button type="button" class="btn btn-lg btn-success pull-midlle" onclick="window.location='{{ URL::previous() }}'">Cancel</button>
                {!! Form::submit('Update', ['class' => 'btn btn-lg btn-success pull-midlle'] ) !!}
            </div>
        </div>
    {!! Form::close()!!}
     </div>
     </div>
    </div>   
   </div>
  </section>
@endSection('content')