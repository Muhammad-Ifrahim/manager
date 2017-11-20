@extends('layouts.master')

@section('content')
  <style type="text/css">
  	.form-group {
      width: 65%;
      margin-left: 17%;
    	box-shadow: none;
      border-color: #4b5ac7b0;
      margin-bottom: 35px;
    	margin-top: 10px;
     
       }
    .btn-info{
    padding-top: 6px;
    height: 41px;
    margin-left: 43%;
    width: 12%;
    float: left;
      }

   .form-control-heading{
    display: block;
    width: 100%;
    height: 44px;
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
    .btn-info{
      padding-top: 6px;
      height: 41px;
      margin-left: 52%;
      width: 12%;
      float: left;
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
       margin-left: 39%;
      font-size: 35px;
      display: inline-block;
      line-height: 1;
      color: rgba(76, 175, 80, 0.87);
    }
  </style>

       <!-- $.each(data, function(index, obj){
                      var tr = $("<tr></tr>");
                      tr.append("<td>"+ $('#item').val() +"</td>");
                      tr.append("<td>"+ $("#Description").val() +"</td>");
                      tr.append("<td>"+ $("#Qty").val() +"</td>");
                      tr.append("<td>"+ $("#SalePrice").val() +"</td>");
                      tr.append("<td>"+ $("#Amount").val() +"</td>");
                      tr.append("<td>"+ "<span class='fa fa-trash' data-toggle='tooltip' data-original-title='Delete proforma'></span> " +"</td>");


                         $("#my-containing-data").append(tr);
        }); -->

    <script type="text/javascript">
       $(document).ready(function(){


           var QtyonHand
           $("input#Qty").val(1);
           //$('input#NetAmount').val(0);
           var netAmount=0;
           $('input#NetAmount').val(parseInt(netAmount));

           
                    // make a network call to store and view 
            $("#addRow").click(function(e){
                 e.preventDefault(); 
                 var item = $('#item option:selected').attr('value');
                 var customerId = $('#customer option:selected').attr('value');
                  $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                       
                   $.ajax({
                     url :"{{ url('storeInventory')}}",
                     type :'POST',
                     data :{
                        inventId : item,
                        custId   : customerId
                     },
                     dataType: 'JSON',
                    success: function( data ) {


                   }
               });
                  
        });
            $('#Qty').on('input',function(e){
                        
                  $('input#Amount').val($("#SalePrice").val()*$("#Qty").val() ); 
                    var netAmount = parseInt($("#NetAmount").val());
                    var amount = parseInt($("#Amount").val());
                    var total = parseInt(netAmount + amount)
                    $('input#NetAmount').val(total);   
                
            });

           $('#item').on('change',function(e){  
                e.preventDefault(); 
                 var item = $('#item option:selected').attr('value');
                     console.log(item);
                 if (item=='Select') {
                     $("input#SalePrice").val(null);
                     $("input#Description").val(null);
                     $("input#Qty").val(null);
                     $('input#Amount').val(null);   
                 }
                 else{

                 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                       
                   $.ajax({
               url :"{{ url('getinventory')}}",
               type :'GET',
               data :{
                  item : item
               },
             success: function( data ) {
              
                 QtyonHand =data[0].QtyonHand;
               $("input#SalePrice").val(data[0].SalePrice);
               $("input#Description").val(data[0].Description);
               var jsonStr = $("input#Qty").val() * data[0].SalePrice;
               $('input#Amount').val(jsonStr);
                
               var netAmount = parseInt($("#NetAmount").val());
                  var amount = parseInt($("#Amount").val());
                  var total = parseInt(netAmount + amount)
                  $('input#NetAmount').val(total);  
            
            }});
          }
           });
          
        });

   
   </script>
  
  <section class="content">
   <div class="row">
         
       <div class="col-md-12">
        <div class="box">
            <div class="box-header">
               <h2 class="box-title">Proforma - Sales Quote</h2>
            </div>
        
        <div class="box-body">
      
  @include('common.errors')
 
    {!! Form::open(['url' => 'customer',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
  
    <div class="form-group">
          <div class="{{ $errors->has('Name') ? 'has-error' : ''}} ">
            <div class="col-lg-6" style="margin-left: 17%">
                <div >
                 {!! Form::label('Heading', 'Heading', ['class' => 'col-lg-2 control-label head']) !!}
                 </div>
                <div style="margin-top: 10%">
                {!! Form::text('Name', $value = null, ['class' => 'form-control-heading', 'placeholder' => 'Proforma Heading' ]) !!}
                 <div class="help-block">{{ $errors->first('Name') }}</div>
                </div>
            </div>
        </div>
    </div>
 
     <div class="form-group">   
        <div class="{{ $errors->has('IssueDate') ? 'has-error' : ''}} ">
            {!! Form::label('Issue Date', 'Issue Date', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-4">
                {!! Form::text('IssueDate', $value = null, ['class' => 'form-control', 'placeholder' => 'Issue Date']) !!}
                 <div class="help-block">{{ $errors->first('IssueDate') }}</div>
            </div>
        </div>
        
       <div class="{{ $errors->has('Code') ? 'has-error' : '' }} ">
           {!!Form::label('QuoteNumber','Quote #',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-4">
              {!! Form::text('QuoteNumber', $value=null, ['class' => 'form-control','placeholder' => 'Automatic'])!!}
               <div class="help-block">{{ $errors->first('QuoteNumber') }}</div>
           </div>
       </div>
    </div>

     

      <div class="form-group">
          {!!Form::label('Customer','Customer',['class' => 'col-lg-2 control-label ' ]) !!}
        <div class="col-lg-4">
          <select  name="id" class="form-control" id="customer">
             @foreach ($customers as $key => $value)
                     <option value="{{ $value->custId}}">{{$value->custId}}-{{ $value->Name}}</option>
             @endforeach
          </select>
        </div>
      </div>
      
      <div class="form-group" id="item">
       <div class="col-lg-12 col-lg-offset-2"> 

        <div class="col-lg-2">
        {!!Form::label('Item','item',['class' => 'col-lg-2 control-label head-item' ]) !!}
         <select  class="form-control-heading" id="item">
             <option value="Select">Select</option>
             @foreach ($inventory as $key => $value)
          <option value="{{ $value->inventId}}">{{$value->inventId}}-{{ $value->ItemName}}</option>
             @endforeach
        </select>
          </div>
  

          <div class="col-lg-4">
        {!!Form::label('Descriptin','Description:',['class' => 'col-lg-2 control-label head-item' ]) !!}
        {!! Form::text('Description', $value=null,
        [ 'id' => 'Description','class' => 'form-control-heading','placeholder' => 'Item Description','readonly' ])!!}
          
          </div> 

         <div class="col-lg-2">
        {!!Form::label('Qty','Qty',['class' => 'col-lg-2 control-label head-item' ]) !!}
        {!! Form::text('Qty', $value=null, 
        [ 'id' => 'Qty','class' => 'form-control-heading','placeholder' => 'Qty'])!!}
          
          </div>  

           <div class="col-lg-2">
        {!!Form::label('UnitPrice','Price',['class' => 'col-lg-2 control-label head-item' ]) !!}

        {!! Form::text('SalePrice', $value=null, 
        ['id' => 'SalePrice','class' => 'form-control-heading','placeholder' => 'Unit Price','readonly'])!!}
          
          </div>  
         
          <div class="col-lg-2">
        {!!Form::label('Amount','Amount',['class' => 'col-lg-1 control-label head-item' ]) !!}
        {!! Form::text('Amount', $value=null, [ 'id' => 'Amount','class' => 'form-control-heading','placeholder' => 'Amount', 'readonly'])!!}
          
          </div> 
      </div>
      <div class="col-lg-12 col-sm-offset-4">
        
        <div style="margin-top: 10px">
          {!! Form::open(array('url' => 'storeInventory', 'class' => 'pull-left')) !!} 
                  {!! Form::submit('Add Row', ['id' => 'addRow','class' =>'btn btn-info float:right' ] ) !!}
              {!! Form::close() !!}
                               <!-- <a href="{{ url('storeInventory') }}">
                  <span class="btn btn-info float:right" >Add </span>
                </a>
 -->
        </div>
           <div class="col-lg-2" style="margin-left: 12px">
              {!! Form::text('NetAmount', $value=null, [ 'id' => 'NetAmount','class' => 'form-control-heading','placeholder' => 'Net Amount', 'readonly'])!!}
          </div>
      </div>
        
        
    </div>

   
    <div class="row">
      <div class="col-sm-8 col-sm-offset-1 ">
           <div>
                <div>
                  <h3>Items</h3>
                </div>
            <div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Item</th>
                  <th class="col-md-4">Description</th>
                  <th class="col-md-1">Qty</th>
                  <th class="col-md-1">UnitPrice</th>
                  <th class="col-md-1">Amount</th>
                </tr>
                </thead>
              
                <tbody>
              @Foreach($performa as $value)
                  <tr>
                    <td class="col-md-1">{{$value->saleqId}}</td>
                    <td class="col-md-4"> </td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('proforma/' . $value->custId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit proforma"></span>
                       </a>
                       
                       {{ Form::open(array('url' => 'customer/' . $value->custId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete proforma"></span>', array( 'type'=>'submit')) }}
                        {{ Form::close() }} 
                      </div>
                    </td>
                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
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
    
      
       <div class="form-group">
           {!!Form::label('Notes','Notes:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('Notes', $value=null, ['class' => 'form-control', 'rows' => 3])!!}
              <div class="help-block">{{ $errors->first('Notes') }}</div>
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

  
   @Foreach($sale as $key=>$value)
             <tr>
             <td class="verticalSplit" >{{$value->SaleId}}</td>
             <td class="verticalSplit" >{{$value->user->Name}}</td>

             <td class="verticalSplit" >{{$value->saleQuote->Quantity}}</td>
             <td class="verticalSplit" >{{$value->saleQuote->SalePrice}}</td>
             <td class="verticalSplit" >{{$value->saleQuote->Discount}}</td>
             <td class="verticalSplit" >{{$value->saleQuote->Amount}}</td>
           </tr>
          @endForeach 