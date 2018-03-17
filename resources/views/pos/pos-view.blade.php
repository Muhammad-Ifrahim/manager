
@extends('layouts.pos')
@section('content')
 <style type="text/css">
    /* table {border: none;}
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
      } */
    
      
   .product-box {
         background-color:#ffffff;
         padding:10px;
         margin-bottom:10px;
        -webkit-box-shadow: 0 8px 6px -6px  #999;
        -moz-box-shadow: 0 8px 6px -6px  #999;
      box-shadow: 0 8px 6px -6px #999;
   }
   .producttitle {
    font-weight:bold;
    padding:5px 0 5px 0;
  }

.productprice {
  border-top:1px solid #dadada;
  padding-top:5px;
}

.pricetext {
  font-weight:bold;
  font-size:1.4em;
}
    
      
    .modal-body{
      height: 100%;
    }
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
   /*margin-left: 43%;*/
    width: 12%;
    float: left;
      }

    
    input[readonly]{
         background-color: #eee; 
     }
    .form-horizontal{
      margin-left:4px;
      }
    .btn-info {
    padding-top: 6px;
    height: 45px;
    margin-left: 14%;
    width: 173%;
    float: left;
    border-radius: 6px 6px 6px 6px;
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
      font-weight: 400;
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

<script type="text/javascript">
  function totalAmount(){
    var t = 0;
    var cost=0;
    $('.amount').each(function(i,e){
      var amt = $(this).val()-0;
      t += amt;
    });

    $('.costprice').each(function(i,e){
        var costprice=$(this).val()-0;
        cost+=costprice;
    });

     console.log(t);
    var tax = $('.tax option:selected').attr('data-price');
     var taxvalue = (t * (tax/100)).toFixed(2);
     $('.taxvalue').val(taxvalue);
     t = t + parseInt(taxvalue);
     $("#Total").val(t);
     $("#costofsale").val(cost);
     //console.log("cdscdcdcdc");
     //console.log($("#costofsale").val());
  }

   $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
          format: 'yyyy/mm/dd',
          container: container,
          todayHighlight: true,
          autoclose: true,
        };
        date_input.datepicker(options);
      });
      
  
   function addItem(element){
      
        var id=$(element).data('id');
        var Item=$(element).data('name');
        var saleprice=$(element).data('saleprice');
        var purchaseprice=$(element).data('purchaseprice');
        var Description=$(element).data('Description');
        var name=$(element).data('name');
        var qty=1; 
        var total=qty*saleprice;
        var n = ($('.neworderbody tr').length - 0) + 1;
        $("#Items").val(n);

        var tr = '<tr id="row">' + 

      '<td><input type="text" class="inventId form-control"  value='+id+' name="inventId[]" readonly /></td>'+

      '<td><input type="text" class="ItemsName form-control"  value='+Item+' name="ItemsName[]" readonly /></td>'+
      
      '<td > <input type="number" class="qty form-control"  value='+qty+' name="qty[]" > </td>' +

      '<td style="display: none;"><input type="text" class="costprice form-control" name="costprice[]"  value='+purchaseprice+' readonly></td>' +

       '<td><input type="text" class="price form-control" name="price[]"   value='+saleprice+' readonly></td>' +

       '<td><input type="text" class="amount form-control" name="amount[]"  value='+total+' readonly></td>' +
        
       '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td>' +
        '</tr>'; 
      $('.neworderbody').append(tr);
      
      totalAmount();

   }   

  $(function () {
  
  
    $('.ProductClass').delegate('.Product','change', function () {
      var inventory = $('.Product').html();
      var qty=1; 
      var inventory=null;
      var n = ($('.neworderbody tr').length - 0) + 1;
      $("#Items").val(n);
    
      var inventory = $('.Product option:selected').val();
      //onsole.log(inventory);
      var item = $('.Product option:selected').attr('data-name');
      var SalesPrice = $('.Product option:selected').attr('data-price');
      var CostPrice = $('.Product option:selected').attr('cost-price');
      var description = $('.Product option:selected').attr('data-pro');
      var total=qty*SalesPrice;
            
      var tr = '<tr id="row">' + 

      '<td><input type="text" class="inventId form-control"  value='+inventory+' name="inventId[]" readonly /></td>'+

      '<td><input type="text" class="ItemsName form-control"  value='+item+' name="ItemsName[]" readonly /></td>'+
      
      '<td > <input type="number" class="qty form-control"  value='+qty+' name="qty[]" > </td>' +

      '<td style="display: none;"><input type="text" class="costprice form-control" name="costprice[]"  value='+CostPrice+' readonly></td>' +

       '<td><input type="text" class="price form-control" name="price[]"   value='+SalesPrice+' readonly></td>' +

       '<td><input type="text" class="amount form-control" name="amount[]"  value='+total+' readonly></td>' +
        
       '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td>' +
        '</tr>'; 
      $('.neworderbody').append(tr);
      
      totalAmount();
    });


    $('.neworderbody').delegate('.delete', 'click', function () {
      $(this).parent().parent().remove();
      totalAmount();
    });

    //tax
   $('.taxbody').delegate('.tax', 'change', function () {
      var tr = $(this).parent().parent();
      var taxvalue = tr.find('.tax option:selected').attr('data-price');
   //   $('.taxvalue').val(taxvalue);
      totalAmount();
      });


   // customer
    $('.customerbody').delegate('.customer', 'change', function () {
      var tr = $(this).parent().parent();
      var addres = tr.find('.customer option:selected').attr('data-addres');
      $('.addres').val(addres);
      });

   // customer
    // $('.ProductClass').delegate('.Product', 'change', function () {
    //   var tr = $(this).parent().parent();
    //   var SalesPrice = tr.find('.Product option:selected').attr('data-price');
    //   var CostPrice = tr.find('.Product option:selected').attr('cost-price');
    //   var description = tr.find('.Product option:selected').attr('data-pro');
     
    //   tr.find('.price').val(SalesPrice);
         
    //   var qty = tr.find('.qty').val() - 0;
    //   var price = tr.find('.price').val() - 0;
      
    //   //tr.find('.costprice').val(CostPrice);
    // //  console.log(cost);
    // console.log(qty +"---------"+price);
    //   var total = qty * price;
    //   console.log("Total Amount"+total);
    //   tr.find('.amount').val(total);
    //   totalAmount();
    // });
    $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
      var tr=$(this).parent().parent();
      var CostPrice=tr.find('.inventId option:selected').attr('cost-price');
      
      var qty=tr.find('.qty').val() - 0;
      var price=tr.find('.price').val() - 0;
      var cost=qty * CostPrice;
      tr.find('.costprice').val(cost);
      var total = qty * price;
      tr.find('.amount').val(total);
      totalAmount();
    });
    
        $('#hideshow').on('click', function(event) {  
       $('#content').removeClass('hidden');
      $('#content').addClass('show'); 
             $('#content').toggle('show');
        });
    

    
  });
</script>
<style type="text/css">
  .col-container {
    display: table; /* Make the container element behave like a table */
    width: 100%; /* Set full-width to expand the whole page */
}

.col {
   display: table-cell;
    background-color: #f4f4f4;
}
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="col-lg-6">
       <div class="col-container">
          <div class="col">
                  
    
      
          {!! Form::open(['url' => 'pos',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
 

      <div class="form-group">
          {!!Form::label('Customer','Customer',['class' => 'col-lg-2 control-label ' ]) !!}
        <div class="col-lg-6 customerbody">
          <select  name="customer" class="form-control customer" id="customer">
                    <option>Walk in Customer</option>
             @foreach ($customers as $key => $value)
                     <option data-addres="{!! $value->BillingAddress !!}" value="{{ $value->custId}}">{{$value->custId}}-{{ $value->Name}}</option>
             @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
          {!!Form::label('Account','Account',['class' => 'col-lg-2 control-label ' ]) !!}
        <div class="col-lg-6 ">
          <select  name="Account" class="form-control Account" id="Account">
              @foreach($account->reverse() as $accounts)
                 @if($accounts->id==1 ||$accounts->id==3)
                 <option value="{{$accounts->id}}" data="{{ $accounts->AccountName}}">{{ $accounts->AccountName}}</option>
                 @endif
              @endforeach
          </select>
        </div>
      </div>   

      <div class="form-group ProductClass">
         {!! Form::label('Add Product','Add Product',['class'=>'col-lg-2 control-label']) !!}
         <div class="col-lg-6">
             <select name="Product" class="form-control Product" id="Product">
                <option></option>
                @foreach($inventory as $product )
                <option data-pro="{!! $product->Description !!}" data-price="{!! $product->SalePrice !!}" cost-price="{!! $product->PurchasePrice !!}" data-name="{!! $product->ItemName !!}" value="{!! $product->inventId !!}" > {{$product->ItemName}}</option>
                @endforeach
               
             </select>
         </div>
        
      </div>       
            
    <table class="table  panel panel-success ">
        <thead>

          <tr> 
            
                
          <th>
             <div class="col-lg-1">
               {!!Form::label('Item','item',['class' => 'col-lg-3 control-label head-item' ]) !!}
              </div>
          </th>

         <th>
           <div class="col-lg-1">
          {!!Form::label('Descriptin','Description:',['class' => 'col-lg-4 control-label head-item' ]) !!}
           </div> 
        </th>

        <th>
          <div class="col-lg-1">
            {!!Form::label('Qty','Qty',['class' => 'col-lg-1 control-label head-item' ]) !!}
          </div>  
        </th>

        <th style="display: none;">
            <div class="col-lg-1">
                 {!!Form::label('actual','Price',['class' => 'col-lg-1 control-label head-item' ]) !!}
            </div>  
        </th>

       <th>
         <div class="col-lg-1">
           {!!Form::label('UnitPrice','Price',['class' => 'col-lg-1 control-label head-item' ]) !!}
         </div>  
       </th>


      <th>     
        <div class="col-lg-1">
           {!!Form::label('Total','Total',['class' => 'col-lg-1 control-label head-item' ]) !!}
        </div>
      </th> 

      <th>     
        <div class="col-lg-1">
           {!!Form::label('Action','Action',['class' => 'col-lg-1 control-label head-item' ]) !!}
        </div>
      </th>                 
        </tr>

              </thead>
              <tbody class="neworderbody">
       

              </tbody>                                 
            </table> 
             <!-- End of Table -->
      <div class="panel panel-success">
        <div class="form-group">   
          <div class=" ">
              {!! Form::label('Items', 'Items', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-4">
                  <!-- {!! Form::text('Items', $value = null, array( 'id'=> 'ItemItemss', 'name'=>'Items',
                  'class'  => 'form-control' ,'readonly'=>true)); !!} -->
                  <input type="text" class=" form-control"  name="Items" id="Items" placeholder="Items" readonly>
              </div>
          </div>
          
         <div class="">
             {!!Form::label('Total','Total',['class' => 'col-lg-2 control-label' ]) !!}
             <div class="col-lg-4">
                <input type="text" class=" form-control"  name="Total" id="Total" placeholder="Total" readonly>
             </div>
         </div>
        </div>

        <div class="form-group">   
           
           {!! Form::label('Tax', 'Tax', ['class' => 'col-lg-2 control-label']) !!}
           
          <div  class="col-lg-4 taxbody pul-right" >
             <select class="tax form-control" name="tax" id="Tax">
                      @foreach($Tax as $tax)
                        @if($tax->Tax!='IR 2.2 %')
                      <option  data-price="{{$tax->value }}" value="{{$tax->id }}">{{$tax->Tax }}</option>
                        @endif
                      @endforeach
              </select>
          </div>  
          
          
         <div class="">
             {!!Form::label('Discount','Discount',['class' => 'col-lg-2 control-label' ]) !!}
             <div class="col-lg-4">
                <input type="text" class=" form-control"  name="Discount" id="Discount" placeholder="Discount" readonly>
                <input style="display: none;" type="text" class="form-control"  name="Method" id="Method" placeholder="Method" readonly>
             </div>
         </div>
      </div>
      </div>

      <div class="panel panel-success">
        
           <div class="btn-group btn-group-justified">
              <div class="btn-group">
                <button type="button" class="btn btn-lg btn-warning">Suspend</button>
              </div>
          <div class="btn-group">
            <button type="button" class="btn btn-lg btn-info">Order</button>
          </div>
          
       </div>
         &nbsp;
       <div class="btn-group btn-group-justified">
              <div class="btn-group">
                <button type="button" class="btn btn-lg btn-danger">Cancel</button>
              </div>
          <div class="btn-group">
            <button type="button" class="btn btn-lg btn-primary">Bill</button>
          </div>
          
       </div>
         
      </div>

      <div class="panel panel-success">  
           <div class="btn-group btn-group-justified">
              <div class="btn-group">
                <button type="button" class="payment-modal btn btn-lg btn-success" data-toggle="modal" data-target="#PaymentModal">Payment</button>
                  &nbsp;
                <!-- <a  type="submit" class="btn btn-success">Sale In Progres</a> -->
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success pull-left'] ) !!}  
              </div>
          </div>
      </div>

     

<!--       
    
      <div class="row" > 
       <div  >      
 <          <div  class="col-lg-3" >
              <input type="button" class=" add btn btn-info" value="Add Item">
          </div> 
          
         <div class="col-lg-3" >
             <input type="text" class=" form-control " name="NetAmount" name="total" id="total"
             placeholder="Net Amount" readonly>
         </div>
         costofsale
      </div>
     </div>     
      --> 
      <div style="display: none;">
     <input type="text" class=" form-control " name="costofsale" id="costofsale">   
     </div>    
         <!--  -->
     


        <!-- Submit Button -->
        <!-- <div class="form-group">
            <div class="col-lg-4">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success pull-left'] ) !!}
            </div>
        </div> -->
         <!--  -->
         </div>
        </div>
   </div>

       

      <div class="col-lg-6">
       <div class="col-container">
          <div class="box">
            <div class="box-header">
              {!! Form::label('Search', 'Search', ['class' => 'col-lg-2 control-label']) !!}
              <input type="text" class="form-control"  name="">
            </div>
            <div class="box-body">
              
                 @foreach($inventory as $product)
                 <div class="col-lg-4">
                    <div class="product-box">
                        <div class="producttitle">{{$product->ItemName}}</div>
                          <div class="productprice">
                             <div class="pull-right">
                             <!--  <input  type="text" id="Item" value='{{$product->ItemName}}'></input>
                              <input  type="text" id="saleprice" value='{{$product->SalePrice}}'></input>
                              <input  type="text" id="purchaseprice" value='{{$product->PurchasePrice}}'></input>
                              <input  type="text" id="inventId" value='{{$product->inventId}}'></input>
                              <input  type="text" id="Description" value='{{$product->Description}}'></input> -->
                              <!-- <a href="#" class="btn btn-success btn-sm" data-id="123"  onclick="addItem()">Add Item</a> -->
                              <!-- <a data-id='123' onclick="addItem(this)">link</a> -->
                              <button data-id="{!!$product->inventId!!}" data-name="{!!$product->ItemName!!}"
                                data-saleprice="{!!$product->SalePrice!!}"
                                data-purchaseprice="{!!$product->PurchasePrice!!}"
                                data-description="{!!$product->Description!!}"
                                onclick="addItem(this)" type="button" ... >Add</button>
                            </div>
                            <div class="pricetext">${{$product->SalePrice}}</div>
                          </div>
                    </div>
                  </div>      
                @endforeach
              
            </div>
             

         </div>

       </div>
      </div> 
   </div>
</div>

 <div id="PaymentModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal">×</button>
                <h4 class="modal-title">Payment Method</h4>
            </div>
            <div class="modal-body">

          <div class="panel panel-success">
                
            <div class="panel-heading">NOTES</div>
            <div class="panel-body">
              <div class="form-group">
                 <div class="col-lg-4">
                    {!! Form::textarea('Sale Note', $value=null, ['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Sale Note'])!!}
                 </div>
              </div>
              <div class="col-lg-4">
                    {!! Form::textarea('Staff Note', $value=null, ['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Sale Note'])!!}
                 </div>
              </div>
            </div>    
                
          <div class="panel panel-success">
            <div class="panel-heading">Payment</div>
            <div class="panel-body">
                <div class="form-group">S<div class="col-lg-4">
                   {!!Form::label('Amount','Amount',['class' => 'col-lg-1 control-label' ]) !!}
                   {!! Form::text('Sale-Amount', $value=null, ['class' => 'form-control' ])!!}
                   
                  </div>

                  {!!Form::label('Paying by','Paying by',['class' => 'col-lg-1 control-label' ]) !!}
                    <div class="col-lg-4">
                      <select class="tax form-control" name="tax" id="Tax">
                       <option   value="cash">CASH</option>
                    </select>

                  </div>
              </div>
             </div>  
            </div>
              

          <div class="panel panel-success">

            <div class="panel-heading"> Sales</div>
            <div class="panel-body">            
              <div class="form-group">         
                {!! Form::label('Items', 'Items', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('Sale Items-Modal', $value = null, array( 'id'=> 'Items-Modal',
                    'class'  => 'form-control' ,'readonly'=>true)); !!}
                </div>
                                    
               {!!Form::label('Total','Total',['class' => 'col-lg-2 control-label' ]) !!}
                <div class="col-lg-4">
                  {!! Form::text('Total Amount', $value=null, ['id'=> 'Total-Modal','class' => 'form-control','placeholder' => 'Total Amount','readonly'=>true ])!!}
               </div>
           </div>

          <div class="form-group" style="margin-top: 10%">             
              {!! Form::label('Tax', 'Tax', ['class' => 'col-lg-2 control-label']) !!}       
              <div class="col-lg-4">
                {!! Form::text('Sale Total', $value=null, ['id'=> 'Tax-Modal','class' => 'form-control','placeholder' => 'Total Amount','readonly'=>true ])!!}
              </div>
               {!!Form::label('Discount','Discount',['class' => 'col-lg-2 control-label' ]) !!}
               <div class="col-lg-4">
                  {!! Form::text('Sale Discount', $value=null, [ 'id'=> 'Discount-Modal' ,'class' => 'form-control','placeholder' => 'Discount','readonly'=>true])!!}
               </div>
             </div>
            </div>  
           </div>

           <div class="panel panel-success">
              <div class="panel-heading text-center">
                Confirmation of Sale
              </div>
              <div class="panel-body">
                <div class="mx-auto" width="100%">
                 {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success pull-left'] ) !!}
                </div>
              </div>
           </div>
          </div>       
         </div>
        </div>
       </div>
   </div>

@endsection('content')

<script type="text/javascript">
  
 window.onload=function(){
    $(document).on('click','.payment-modal',function(){
           
           var value="Payment";
           $('#Method').val(value);
           console.log('')
           $('#Total-Modal').val($('#Total').val());
           $('#Items-Modal').val($('#Items').val());
           $('#Tax-Modal').val($('#Tax').val());
           $('#Discount-Modal').val($('#Discount').val());
          // console.log($('#Discount').val());
          // console.log($('#Items').val());


      }); 
    function closeModal(){
      $('#Method').val(null);
    }
 } 
 


  

</script>