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
               <h2 class="box-title">Edit People: {{$userEdit->name}}</h2>
            </div>
        
        <div class="box-body">
          
        
      @include('common.errors')
         
       {{-- Form::open(['url' => 'user/'.$userEdit->id.'/update',  'method' => 'PUT', 'class' => 'form-horizontal']) --}}

       {{-- Form::model($userEdit, array('route' => 'user/'.$userEdit->id.'/update', 'method' => 'PUT', 'class' => 'form-horizontal')) --}}

        {{ Form::model($userEdit, array('route' => array('user.update', $userEdit->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
        
        <!--Role--> 
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} ">
            {!! Form::label('Role', 'Role:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
            @if($user->userType=='Manager')
              <select id="userType" name="userType" class="selectpicker">
                </option>
                  @foreach ($roles as $key => $value)
                    @if($value->role==$userEdit->userType)
                    <option value="{{ $value->id}}" selected="selected">{{ $value->role}}
                    </option>
                    @else
                    <option value="{{ $value->id}}">{{ $value->role}}
                    </option>
                    @endif
                  @endforeach
              </select>
            @endif
            </div>
        </div>
        <!-- Name -->
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', $value = $userEdit->name, ['class' => 'form-control']) !!}
            </div>
        </div>
       <!-- Buisness Identifier -->
         <div class="form-group">
           {!!Form::label('Email Address','Email Address:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
            {!! Form::text('email', $value=$userEdit->email, ['class' => 'form-control','placeholder' => 'Optional'])!!}
           </div>
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