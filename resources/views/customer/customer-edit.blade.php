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
  
  <section class="content">
   <div class="row">
         
       <div class="col-md-12">
        <div class="box">
            <div class="box-header">
               <h2 class="box-title">Edit Customer: {{$customer->Name}}</h2>
            </div>
        
        <div class="box-body">
          
        
         @include('common.errors')
 
        {{ Form::model($customer, array('route' => array('customer.update', $customer->custId), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
         
        <!-- Name -->
        <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('Name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                 <div class="help-block">{{ $errors->first('Name') }}</div>
            </div>
        </div>
       <!-- Code -->
       <div class="form-group {{ $errors->has('Code') ? 'has-error' : '' }} ">
           {!!Form::label('Code','Code:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Code', $value=null, ['class' => 'form-control','placeholder' => 'Optional'])!!}
               <div class="help-block">{{ $errors->first('Code') }}</div>
           </div>
       </div>
       <!-- Buisness Identifier -->
         <div class="form-group {{ $errors->has('BusinessIdentifier') ? 'has-error' : '' }} ">
           {!!Form::label('BusinessIdentifier','Business Identifier:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
            {!! Form::text('BusinessIdentifier', $value=null, ['class' => 'form-control','placeholder' => 'Optional'])!!}
             <div class="help-block">{{ $errors->first('BusinessIdentifier') }}</div>
           </div>
       </div>

        <!-- Email -->
       <div class="form-group {{ $errors->has('Email') ? 'has-error' : '' }} ">
           {!!Form::label('Email','Email:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Email', $value=null, ['class' => 'form-control','placeholder' => 'Email Address'])!!}
            <div class="help-block">{{ $errors->first('Email') }}</div>
           </div>
       </div>
       <!-- Telephone -->
       <div class="form-group {{ $errors->has('Telephone') ? 'has-error' : ''}}  ">
           {!!Form::label('Telephone','Telephone:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Telephone', $value=null, ['class' => 'form-control','placeholder' => 'Telephone'])!!}
              <div class="help-block">{{ $errors->first('Telephone') }}</div>
           </div>
       </div>
       <!-- Billing Address -->
       <div class="form-group {{ $errors->has('BillingAddress') ? 'has-error' : ''}}">
           {!!Form::label('BillingAddress','Billing Address:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('BillingAddress', $value=null, ['class' => 'form-control', 'rows' => 3])!!}
              <div class="help-block">{{ $errors->first('BillingAddress') }}</div>
           </div>
       </div>
      <!-- Fax -->
       <div class="form-group {{ $errors->has('Fax') ? 'has-error' : ''}} ">
           {!!Form::label('Fax','Fax:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Fax', $value=null, ['class' => 'form-control','placeholder' => 'Fax'])!!}
              <div class="help-block">{{ $errors->first('Fax') }}</div>
           </div>
       </div>


       <div class="form-group">
           {!!Form::label('Mobile','Mobile:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Mobile', $value=null, ['class' => 'form-control','placeholder' => 'Mobile'])!!}
              <!-- <div class="help-block">{{ $errors->first('CreditLimit') }}</div> -->
           </div>
       </div>
      
       <div class="form-group">
           {!!Form::label('AdditionalInformation','Additional Information:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('AdditionalInformation', $value=null, ['class' => 'form-control', 'rows' => 3])!!}
              <div class="help-block">{{ $errors->first('CreditLimit') }}</div>
           </div>
       </div>


        <div class="form-group {{ $errors->has('CreditLimit') ? 'has-error' : ''}} ">
           {!!Form::label('CreditLimit','Credit Limit:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('CreditLimit', $value=null, ['class' => 'form-control','placeholder' => 'Credit'])!!}
               <div class="help-block">{{ $errors->first('CreditLimit') }}</div>
              
           </div>
       </div>
       
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Update', ['class' => 'btn btn-lg btn-success pull-right'] ) !!}
            </div>
        </div>
 
    
 
    {!! Form::close()  !!}
     </div>
     </div>
    </div>   
   </div>
  </section>
@endSection('content')