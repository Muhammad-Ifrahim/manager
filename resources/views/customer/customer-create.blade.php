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
          <!-- <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>
            </div>
          
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="Name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Code</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Code" placeholder="Code">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Buisness Identifier</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="BuisnessIdentifier" placeholder="Identifier">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Email" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Telephone</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Telephone" placeholder="Telephone">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Mobile" placeholder="Mobile">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Additional Information</label>
                  <div class="col-sm-10">
                    <input type="textarea" class="form-control" placeholder="Additional Information">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Credit Limit</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="optional">
                  </div>
                </div>
              </div>
              <div class="box-footer">
              
                <a href="{{url('customer/store')}}" type="submit" class="btn btn-success">Create</a>
                <a href="{{url('customer/createAnother')}}" type="submit" class="btn btn-info ">Create & Add Another </a>
              </div>
          
            </form>
          </div> -->
       <div class="col-md-12">
        <div class="box">
            <div class="box-header">
               <h2 class="box-title">Add Customer</h2>
            </div>
        
        <div class="box-body">
          
        
         @include('common.errors')
 
    {!! Form::open(['url' => 'customer',  'method' => 'POST', 'class' => 'form-horizontal']) !!}

 
        <!-- Name -->
        <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('Name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                 {!! $errors->first('Name', '<p class="help-block"> Name Reuired</p>') !!}
            </div>
        </div>
       <!-- Code -->
       <div class="form-group {{ $errors->has('Code') ? 'has-error' : '' }} ">
           {!!Form::label('Code','Code:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Code', $value=null, ['class' => 'form-control','placeholder' => 'Optional'])!!}
              {!! $errors->first('Code' ,'<p class="help-block"> No Special Characters</p>') !!}
           </div>
       </div>
        <!-- Email -->
       <div class="form-group {{ $errors->has('Email') ? 'has-error' : '' }} ">
           {!!Form::label('Email','Email:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Email', $value=null, ['class' => 'form-control','placeholder' => 'Email Address'])!!}
            {!! $errors->first('Email' ,'<p class="help-block"> Email : example@example.com</p>') !!}  
           </div>
       </div>
       <!-- Telephone -->
       <div class="form-group {{ $errors->has('Telephone') ? 'has-error' : ''}}  ">
           {!!Form::label('Telephone','Telephone:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Telephone', $value=null, ['class' => 'form-control','placeholder' => 'Telephone'])!!}
              {!! $errors->first('Telephone','<p class="help-block">Telephone:(01)[0-9]</p>') !!}
           </div>
       </div>
       <!-- Billing Address -->
       <div class="form-group {{ $errors->has('Billing Address') ? 'has-error' : ''}}">
           {!!Form::label('Billing Address','Billing Address:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('Billing Address', $value=null, ['class' => 'form-control', 'rows' => 3])!!}
              {!! $errors->first('Billing Address','<p class="help-block">Billing Address Required</p>')  !!}
           </div>
       </div>
      <!-- Fax -->
       <div class="form-group {{ $errors->has('Fax') ? 'has-error' : ''}} ">
           {!!Form::label('Fax','Fax:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Fax', $value=null, ['class' => 'form-control','placeholder' => 'Fax'])!!}
               {!! $errors->first('Fax','<p class="help-block">Fax (xxx) xxx xx xx </p>')  !!}
           </div>
       </div>


       <div class="form-group">
           {!!Form::label('Mobile','Mobile:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Mobile', $value=null, ['class' => 'form-control','placeholder' => 'Mobile'])!!}
           </div>
       </div>
      
       <div class="form-group">
           {!!Form::label('Additional Information','Additional Information:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('Additional Information', $value=null, ['class' => 'form-control', 'rows' => 3])!!}
           </div>
       </div>


        <div class="form-group {{ $errors->has('Credit Limit') ? 'has-error' : ''}} ">
           {!!Form::label('Credit Limit','Credit Limit:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::text('Credit Limit', $value=null, ['class' => 'form-control','placeholder' => 'Credit'])!!}
              {!! $errors->first('Credit Limit','<p class="help-block">Must be Numeric </p>')  !!}
           </div>
       </div>
       
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    
 
    {!! Form::close()  !!}
     </div>
     </div>
    </div>   
   </div>
  </section>
@endSection('content')