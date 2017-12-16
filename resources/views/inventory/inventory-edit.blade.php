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
  </style>
  <script>
    $(document).ready(function() {

       $( "input[type='text']" ).change(function() {
     
            var qtyhand=$('#QtyOnHand').val()- 0;
          var avgcost=$('#AverageCost').val()- 0;
          var total = qtyhand * avgcost;
          $('#ValueOnHand').val(total);  
        });

         $('#Qty').hide();
        $("#checker").click(function(){
            
         if($(this).is(":checked")){
            $("#Qty").show();  
         }
         else{
            $("#Qty").hide();
         }
           
        });
    });
    </script>
  
  <section class="content">
   <div class="row">
         
       <div class="col-md-12">
        <div class="box">
            <div class="box-header">
               <h2 class="box-title">Edit Inventory Item</h2>
            </div>
        
        <div class="box-body">
          
        
         @include('common.errors')
 
    @include('common.errors')
 
    {{ Form::model($inventory, array('route' => array('Inventory.update', $inventory->inventId), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

 
           <!-- Name -->
        <div class="form-group {{ $errors->has('ItemCode') ? 'has-error' : ''}} ">
            {!! Form::label('ItemCode', 'Item Code:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-5">
                {!! Form::text('ItemCode', $value = null, ['class' => 'form-control', 'placeholder' => 'Item Code']) !!}
                 <div class="help-block">{{ $errors->first('ItemCode') }}</div>
            </div>
        </div>
       <!-- Code -->
       <div class="form-group {{ $errors->has('ItemName') ? 'has-error' : '' }} ">
           {!!Form::label('ItemName','Item Name:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-5">
              {!! Form::text('ItemName', $value=null, ['class' => 'form-control','placeholder' => 'Optional'])!!}
               <div class="help-block">{{ $errors->first('ItemName') }}</div>
           </div>
       </div>
       <!-- Buisness Identifier -->
         <div class="form-group {{ $errors->has('UnitName') ? 'has-error' : '' }} ">
           {!!Form::label('Unit Name','Unit Name:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-5">
            {!! Form::text('UnitName', $value=null, ['class' => 'form-control','placeholder' => 'Item Name'])!!}
             <div class="help-block">{{ $errors->first('UnitName') }}</div>
           </div>
       </div>

        <!-- Email -->
       <div class="form-group {{ $errors->has('PurchasePrice') ? 'has-error' : '' }} ">
           {!!Form::label('Purchase Price','Purchase Price:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-5">
              {!! Form::text('PurchasePrice', $value=null, ['class' => 'form-control','placeholder' => 'Purchase Price'])!!}
            <div class="help-block">{{ $errors->first('Email') }}</div>
           </div>
       </div>
       <!-- Telephone -->
       <div class="form-group {{ $errors->has('SalePrice') ? 'has-error' : ''}}  ">
           {!!Form::label('Sale Price','Sale Price:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-5">
              {!! Form::text('SalePrice', $value=null, ['class' => 'form-control','placeholder' => 'Sale Price'])!!}
              <div class="help-block">{{ $errors->first('SalePrice') }}</div>
           </div>
       </div>
       <!-- Billing Address -->
       <div class="form-group {{ $errors->has('Discription') ? 'has-error' : ''}}">
           {!!Form::label('Discription','Discription:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-7">
              {!! Form::textarea('Description', $value=null, ['class' => 'form-control', 'rows' => 3])!!}
              <div class="help-block">{{ $errors->first('Discription') }}</div>

           </div>
       </div>
       
        <div class="col-lg-5" style="margin-left:100px" >
            {{ Form::checkbox('checkValue','1', false, ['id' => 'checker']) }} 

          <span style="margin-left: 12px;font-weight: bold;">  Starting Balance as at :
               
               @foreach ($strtDate as $object)
                {{ $object->date}}
               @endforeach
           </span>   
        </div>  

        <div id="Qty" style="margin-top: 25px">

       <div class="form-group {{ $errors->has('QtyOnHand') ? 'has-error' : ''}}" style="margin-bottom: 7px;" >
           {!!Form::label('Qty on Hand','Qty on Hand: ---',['class' => 'col-lg-3 control-label' ]) !!}
           <div class="col-lg-3">
              {!! Form::text('QtyOnHand', $value=null, ['class' => 'form-control','id' => 'QtyOnHand'])!!}
              <div class="help-block">{{ $errors->first('QtyOnHand') }}</div>
           </div>
          </div>

          <div class="form-group {{ $errors->has('AverageCost') ? 'has-error' : ''}}" style="margin-bottom: 7px;">
           {!!Form::label('Average Cost','Average Cost: ---',['class' => 'col-lg-3 control-label' ]) !!}
           <div class="col-lg-3">
              {!! Form::text('AverageCost', $value=null, ['class' => 'form-control','id' => 'AverageCost'])!!}
              <div class="help-block">{{ $errors->first('AverageCost') }}</div>
           </div>
          </div>


          <div class="form-group {{ $errors->has('ValueOnHand') ? 'has-error' : ''}}" style="margin-bottom: 7px;">
           {!!Form::label('ValueOnHand','Value  on Hand: ---',['class' => 'col-lg-3 control-label']) !!}
           <div class="col-lg-3">
              {!! Form::text('ValueOnHand', $value=null, ['class' => 'form-control','readonly','id' => 'ValueOnHand'] )!!}
              <div class="help-block">{{ $errors->first('ValueOnHand') }}</div>
           </div>
          </div>
            
        </div>   
        <!-- Submit Button -->
        
        <div class="form-group" >
            <div class="col-lg-10 col-lg-offset-2">
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

