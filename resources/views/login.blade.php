@extends('layouts.login-master')
<style type="text/css">
body{
background: grey;
}
</style>
@section('content')
<div class="container" style="margin-top:50%;">
  <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3  col-sm-offset-2">
    <div class="panel panel-info" >
      <div class="panel-heading">
        <div class="panel-title">Sign In</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
      </div>
      <div style="padding-top:30px" class="panel-body" >
        
        @include('common.errors')
        
        {!! Form::open(['url' => 'login',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
        
        <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
          {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
          <div class="col-lg-10">
            {!! Form::text('Name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            <div class="help-block">{{ $errors->first('Name') }}</div>
          </div>
        </div>
        
        <div class="form-group {{ $errors->has('Password') ? 'has-error' : '' }} ">
          {!!Form::label('Password','Password:',['class' => 'col-lg-2 control-label' ]) !!}
          <div class="col-lg-10">
            {!! Form::text('Password', $value=null, ['class' => 'form-control','placeholder' => 'Password'])!!}
            <div class="help-block">{{ $errors->first('Code') }}</div>
          </div>
        </div>
        
        
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
@endSection('content')