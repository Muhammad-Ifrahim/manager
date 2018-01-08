@extends('layouts.master')

  @section('content')
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#cash').show();
    		$('#journal').hide();
    	});

       $(function(){

       	  $('#button').click(function(){
              $('#cash').hide();
              $('#journal').show();

    	   });

       });
    	

    </script>

    <style type="text/css">
     .form-control{
      height: 37px;
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
   /* .box-header .box-title {
       display: inline-block;
       font-size: 22px;
      margin: 3px;
      line-height: 1;
      color: rgba(76, 175, 80, 0.87);
    }*/
       table {border: none;}
     table {
    border-collapse: collapse;
      }
      input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 30px white inset;
    }

   td, th {
    padding: 0;
    }
    .table>tbody>tr>td, .table>tfoot>tr>td {
    border-top: 1px solid #f4f4f40f;
      } 
    .form-group {
      width: 65%;
      box-shadow: none;
      border-color: #4b5ac7b0;
      margin-bottom: 35px;
      margin-top: 10px;
     
       }


   .form-control-heading{
    display: block;
    width: 100%;
    height: 37px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 6px 6px 6px 6px;
       
    }  
    input[readonly]{
         background-color: #eee; 
     }
    .form-horizontal{
      margin-left:4px;
      }
  
    .btn-success{
      border-radius: 6px 6px 6px 6px;
    }
     .head{
       display: inline-block;
      font-size: 20px;
      margin: 3px;
      line-height: 1;
      color: rgba(76, 175, 80, 0.87);
     }
     .head-item{
      display: inline-block;
      font-size: 15px;
      margin: 3px;
      line-height: 1;
      color: rgba(76, 175, 80, 0.87);

     }
    .box-footer{
      margin-left: 10%;
     }
    .box-header .box-title {
      font-weight: lighter;
      font-size: 25px;
      display: inline-block;
      line-height: 1;
      color: rgba(76, 175, 80, 0.87);
    }
   
    .hidden{
  display : none;  
}

.show{
  display : block !important;
}
  </style>

  <section class="content">
  	<div id="cash">
  	 <div class="row">
  	 	<div class="col-md-12">
  	 	  <div class="box box-success">
  	 			  <div class="box-header">
                      <h2 class="box-title">Cash Account</h2>
                  </div>
  	 		<div class="box-body">
             {{ Form::model($CashAccount, array('route' => array('cash.update', $CashAccount->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

             <!-- Name -->
        <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
            {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('Name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                 <div class="help-block">{{ $errors->first('Name') }}</div>
            </div>
        </div>
       <!-- Code -->
       <div class="form-group {{ $errors->has('Code') ? 'has-error' : '' }} ">
           {!!Form::label('Code','Code:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-5">
              {!! Form::text('Code', $value=null, ['class' => 'form-control','placeholder' => 'Optional'])!!}
               <div class="help-block">{{ $errors->first('Code') }}</div>
           </div>
       </div>
       <!-- Buisness Identifier -->
        <div class="form-group {{ $errors->has('Amount') ? 'has-error' : '' }} ">
           {!!Form::label('Amount','Amount:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-5">
              {!! Form::text('Amount', $value=null, ['class' => 'form-control','placeholder' => 'Amount'])!!}
               <div class="help-block">{{ $errors->first('Amount') }}</div>
           </div>
       </div> 
       
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Update Cash Account', ['class' => 'btn  btn-success pull-left'] ) !!}
            </div>
        </div>
 
    
             </div>
  	 		</div>
  	 	   </div>
  	      </div>
  	     </div>


   	 {!! Form::close()  !!}
  </section>


  @endSection('content')