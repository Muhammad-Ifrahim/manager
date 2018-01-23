@extends('layouts.master')
@section('content')

 <style type="text/css">
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
      margin-left: 17%;
      box-shadow: none;
      border-color: #4b5ac7b0;
      margin-bottom: 35px;
      margin-top: 10px;
     
       }
    .btn-info{
    padding-top: 6px;
    height: 37px;
   /*margin-left: 43%;*/
    width: 12%;
    float: left;
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
    .btn-info {
    padding-top: 6px;
    height: 37px;
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
          display: inline-block;
          font-size: 23px;
          margin: 3px;
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

  $( document ).ready(function() {
      var addres = $('.customer option:selected').attr('data-addres');
      $('.addres').val(addres);
    });
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

     console.log(cost);
     var tax = $('.tax option:selected').attr('data-price');
     var taxvalue = (t * (tax/100)).toFixed(2);
     $('.taxvalue').val(taxvalue);
     t = t + parseInt(taxvalue);
     $("#total").val(t);
     $("#costofsale").val(cost);
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
      


  $(function () {
  
    
    $('.add').click(function () {
      var inventory = $('.inventId').html();
      var n = ($('.neworderbody tr').length - 0) + 1;
      var tr = '<tr><td><select class="form-control inventId form-control-heading" name="inventId[]"><option></option>' + inventory + '</select></td>' +

       '<td><input type="text" class="discription form-control-heading" name="discription[]"readonly ></td>' +

      '<td><input type="number" class="qty form-control-heading" name="qty[]" ></td>' +

      '<td style="display: none;"><input type="text" class="costprice form-control-heading" name="costprice[]" readonly></td>' +

      '<td><input type="text" class="price form-control-heading" name="price[]" readonly></td>' +

      '<td><input type="text" class="amount form-control-heading" name="amount[]" readonly></td>' +
        
      '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td></tr>';
      $('.neworderbody').append(tr);
    });
// style="margin-left: 36px;margin-top: 14px;"

    $('.neworderbody').delegate('.delete', 'click', function () {
      $(this).parent().parent().remove();
      totalAmount();
    });

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
    $('.neworderbody').delegate('.inventId', 'change', function () {
      var tr = $(this).parent().parent();
      var SalesPrice = tr.find('.inventId option:selected').attr('data-price');
      var CostPrice = tr.find('.inventId option:selected').attr('cost-price');
      var description = tr.find('.inventId option:selected').attr('data-pro');
      tr.find('.price').val(SalesPrice);
      tr.find('.discription').val(description);
         
      var qty = tr.find('.qty').val() - 0;
      var price = tr.find('.price').val() - 0;
      
      var cost= qty * CostPrice;
      tr.find('.costprice').val(cost);
      var total = qty * price;
      tr.find('.amount').val(total);
      totalAmount();
    });
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

<!-- <style>
.hidden{
  display : none;  
}

.show{
  display : block !important;
}
select.form-control.product_id {
    width: 150px;
}
</style> -->
<div class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box">
         <div class="box-header">
               <h2 class="box-title">Sale Invoices </h2>
         </div>

        <div class="box-body">
          {{ Form::model($sale, array('route' => array('saleinvoice.update', $sale->saleinId), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
                    
      <div class="form-group">   
          <div class="{{ $errors->has('IssueDate') ? 'has-error' : ''}} ">
              {!! Form::label('Issue Date', 'Issue Date', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-4">
                  {!! Form::text('date', $value = null, array( 'id'=> 'date',
                  'class'  => 'form-control-heading')); !!}
                   <div class="help-block">{{ $errors->first('IssueDate') }}</div>
              </div>
          </div>
          
         <div class="{{ $errors->has('Code') ? 'has-error' : '' }} ">
             {!!Form::label('Due Date','Due Date',['class' => 'col-lg-2 control-label' ]) !!}
             <div class="col-lg-4">
                {!! Form::text('date', $value=null, ['class' => 'form-control-heading','placeholder' => 'Due Date'])!!}
                 <div class="help-block">{{ $errors->first('QuoteNumber') }}</div>
             </div>
         </div>
      </div>

        <div class="form-group">   
          <div class="{{ $errors->has('IssueDate') ? 'has-error' : ''}} ">
              {!! Form::label('Invoice Number', 'Invoice Number', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-4">
                  {!! Form::text('InvoiceNumber', $value = null, array( 'id'=> 'date',
                  'class'  => 'form-control-heading')); !!}
                   <div class="help-block">{{ $errors->first('IssueDate') }}</div>
              </div>
          </div>
          
         <div class="{{ $errors->has('Code') ? 'has-error' : '' }} ">
             {!!Form::label('QuoteNumber','Quote #',['class' => 'col-lg-2 control-label' ]) !!}
             <div class="col-lg-4">
                {!! Form::text('QuoteNumber', $value=null, ['class' => 'form-control-heading','placeholder' => 'Automatic'])!!}
                 <div class="help-block">{{ $errors->first('QuoteNumber') }}</div>
             </div>
         </div>
      </div>     

      <div class="form-group">
          {!!Form::label('customer','Customer',['class' => 'col-lg-2 control-label ' ]) !!}
        <div class="col-lg-6 customerbody">
          <select  name="customer" class="form-control-heading customer" id="customer">

                    <option data-addres="{!! $sale->user->BillingAddress !!}" value="{{ $sale->customer}}">
                      {{ $sale->user->Name}}</option>

             @foreach ($customers as $key => $value)
                      @if($sale->customer!=$value->custId)
                     <option data-addres="{!! $value->BillingAddress !!}" value="{{ $value->custId}}">{{$value->custId}}-{{ $value->Name}}</option>
                     @endif
             @endforeach
          </select>
        </div>
      </div>  


      <div class="form-group">
          {!!Form::label('Account','Account',['class' => 'col-lg-2 control-label ' ]) !!}
        <div class="col-lg-6 ">
          <select  name="Account" class="form-control-heading Account" id="Account">
              @foreach($account->reverse() as $accounts)
                 @if($accounts->id==1 ||$accounts->id==3)
                 <option value="{{$accounts->id}}" data="{{ $accounts->AccountName}}">{{ $accounts->AccountName}}</option>
                 @endif
              @endforeach
          </select>
        </div>
      </div>          
                    
            
    <table class="table col-lg-12">
        <thead>

          <tr> 
                
          <th>
             <div class="col-lg-3">
               {!!Form::label('Item','item',['class' => 'col-lg-3 control-label head-item' ]) !!}
              </div>
          </th>

         <th>
           <div class="col-lg-4">
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
           {!!Form::label('Amount','Amount',['class' => 'col-lg-1 control-label head-item' ]) !!}
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
                @Foreach($salesItem as $key =>$sale) 
                  @Foreach($sale->saleQuote as $key=>$value)
                <tr>
                 
                  <td class="col-lg-3">
                    <select class="form-control inventId form-control-heading" name="inventId[]">
                      <option data-pro="{!! $value->inventoryItem->Description !!}" data-price="{!! $value->inventoryItem->SalePrice !!}" value="{!! $value->inventid !!}">
                        {!! $value->inventoryItem->ItemName!!}
                      </option>
                      @foreach($inventory as $invent)
                         @if($invent->inventId !=$value->inventid)
                      <option data-pro="{!! $invent->Description !!}" data-price="{!! $invent->SalePrice !!}" value="{!! $invent->inventId !!}">{!! $invent->ItemName!!}</option>
                         @endif
                      @endforeach
                    </select>
                  </td>
                  <td class="col-lg-4">

                    <input type="text" class="discription form-control-heading " name="discription[]" value="{{$value->inventoryItem->Description}}" readonly>
                  </td>

                  <td class="col-lg-1">
                    <input type="number" class="qty form-control form-control-heading " name="qty[]" value="{{$value->Quantity}}" >
                  </td>  

                  <td class="col-lg-1" style="display: none;">
                    <input type="text" class="costprice form-control form-control-heading" name="costprice[]" readonly>
                  </td>

                  <td class="col-lg-1" >
                <input type="text" class="price form-control form-control-heading" name="price[]" readonly value="{{$value->Price}}">
                  </td>
                               
                  <td class="col-lg-1">
                    <input type="text" class="amount form-control form-control-heading " name="amount[]" value="{{$value->Amount}}" readonly>
                  </td>
                  <td class="col-lg-1">
                    <!-- <span class="fa fa-trash delete" ></span> -->

                    <span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span>
                    
                  </td>

                </tr>
                @endforeach
                @endforeach
              </tbody>                                 
            </table> 

       

      <div class="row" >
       <div class="col-lg-12" >
        <div class="col-lg-4 col-lg-offset-7">     
          <div  class="col-lg-6 taxbody pul-right" >
             <select class="tax form-control-heading" name="tax" id="tax">
                      
                      <option  data-price="{{$sale->TaxName->value}}"  value="{{$sale->Tax}}">{{ $sale->TaxName->Tax}}</option>
                      @foreach($Tax as $tax)
                          @if($tax->id != $sale->Tax)
                            <option  data-price="{{$tax->value }}" value="{{$tax->id }}">{{$tax->Tax }}</option>
                          @endif
                      @endforeach
              </select>
          </div>
          
         <div class="col-lg-6" >
             <input type="text" class="taxvalue form-control-heading "  name="taxvalue" id="taxvalue"
             placeholder="Tax %"  value="{{$sale->TaxAmount}}" readonly>
         </div>
        </div> 
      </div>
     </div>  
       
    <div class="row"  style="margin-top: 15px;" >    
       <div style="margin-left: 66%" >      
          <div  class="col-lg-3" >
              <input type="button" class=" add btn btn-lg btn-info" value="Add Item">
          </div>
          
         <div class="col-lg-3" style="margin-left: 48px;width: 148px">
      <input type="text" class=" form-control-heading " name="NetAmount" name="total" id="total"
             placeholder="Net Amount" readonly value="{{$sale->Amount}}">
         </div>
         
      </div>
     </div>       
                
      <div style="display: none;">
     <input type="text" class=" form-control-heading " name="costofsale" name="costofsale" id="costofsale">   
     </div>  

         
         <!--  -->
        <div class="form-group {{ $errors->has('BillingAddress') ? 'has-error' : ''}}">
           {!!Form::label('BillingAddress','Billing Address:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('BillingAddress', $value=null, ['class' => 'addres form-control', 'rows' => 3,'readonly'])!!}
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
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success pull-left'] ) !!}
            </div>
        </div>
         <!--  -->
         </div>
        </div>
      </div>
    </div>
  </div>

   
    
  <!-- Row End -->
  
 <!-- s -->
</div>

@endsection