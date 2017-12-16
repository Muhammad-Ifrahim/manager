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
               <h2 class="box-title">INVENTORY LOCATION</h2>
            </div>
        
        <div class="box-body">
          
        
         @include('common.errors')
 
    {{ Form::model($InventoryLocation, array('route' => array('InventoryLocation.update', $InventoryLocation->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
         

          
           <!-- Name -->
        <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('Name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                 <div class="help-block">{{ $errors->first('Name') }}</div>
            </div>
        </div>

     

           <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10">
                {!! Form::submit('Update', ['class' => 'btn btn-lg btn-success '] ) !!}
            </div>
        </div>
      
    {!! Form::close()  !!}
     </div>
     </div>
    </div>   
   </div>
  </section>
@endSection('content')