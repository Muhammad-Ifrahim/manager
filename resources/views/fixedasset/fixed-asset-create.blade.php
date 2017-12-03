@extends('layouts.master')

@section('content')
  <style type="text/css">
   .form-control{
       height: 44px;
     }
    .form-group {
      margin-bottom: 35px;
      width: 65%;
      margin-left: 17%;
      margin-top: 10px;
      height: 50px;
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
               <h2 class="box-title">Fixed Asset</h2>
            </div>
        
        <div class="box-body">
          
        
         @include('common.errors')
 
    {!! Form::open(['url' => 'fixedasset',  'method' => 'POST', 'class' => 'form-horizontal']) !!}

          
           <!-- Name -->
        <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('Name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                 <div class="help-block">{{ $errors->first('Name') }}</div>
            </div>
        </div>

        <!-- Code -->
        <div class="form-group {{ $errors->has('Code') ? 'has-error' : ''}} ">
            {!! Form::label('Code', 'Code:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('Code', $value = null, ['class' => 'form-control', 'placeholder' => 'Code']) !!}
                 <div class="help-block">{{ $errors->first('Code') }}</div>
            </div>
        </div>

       <!-- Description -->
         <div class="form-group {{ $errors->has('Description') ? 'has-error' : ''}} ">
            {!! Form::label('Description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('Description', $value = null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                 <div class="help-block">{{ $errors->first('Description') }}</div>
            </div>
        </div>

         <div class="form-group {{ $errors->has('PurchaseCost') ? 'has-error' : ''}} ">
            {!! Form::label('PurchaseCost', 'Purchase Cost:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('PurchaseCost', $value = null, ['class' => 'form-control', 'placeholder' => 'PurchaseCost']) !!}
                 <div class="help-block">{{ $errors->first('PurchaseCost') }}</div>
            </div>
        </div>

          <div class="form-group {{ $errors->has('AccumulatedDepreciation') ? 'has-error' : ''}} ">
            {!! Form::label('AccumulatedDepreciation', 'Accumulated Depreciation:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('AccumulatedDepreciation', $value = null, ['class' => 'form-control', 'placeholder' => 'Accumulated Depreciation']) !!}
                 <div class="help-block">{{ $errors->first('AccumulatedDepreciation') }}</div>
            </div>
        </div>

          <div class="form-group {{ $errors->has('BookValue') ? 'has-error' : ''}} ">
            {!! Form::label('BookValue', 'Book Value:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('BookValue', $value = null, ['class' => 'form-control', 'placeholder' => 'Book Value']) !!}
                 <div class="help-block">{{ $errors->first('BookValue') }}</div>
            </div>
         </div>

           <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 ">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success '] ) !!}
            </div>
        </div>
      
    {!! Form::close()  !!}
     </div>
     </div>
    </div>   
   </div>
  </section>
@endSection('content')