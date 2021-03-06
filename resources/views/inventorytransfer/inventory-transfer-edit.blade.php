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
font-weight: 600;
font-size: 35px;
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
$('.amount').each(function(i,e){
var amt = $(this).val()-0;
t += amt;
});
// $('.total').html(t);
$("#total").val(t);
}
$(document).ready(function(){
var date_input=$('input[name="DeliveryDate"]'); //our date input has the name "date"
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

'<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td></tr>';
$('.neworderbody').append(tr);
});
// style="margin-left: 36px;margin-top: 14px;"
$('.neworderbody').delegate('.delete', 'click', function () {
$(this).parent().parent().remove();
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
var description = tr.find('.inventId option:selected').attr('data-pro');
// console.log(Sales);
tr.find('.price').val(SalesPrice);
tr.find('.discription').val(description);

// var qty = tr.find('.qty').val() - 0;
// var dis = tr.find('.dis').val() - 0;
// var price = tr.find('.price').val() - 0;

// var total = (qty * price) - ((qty * price * dis)/100);
// tr.find('.amount').val(total);
totalAmount();
});
$('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
var tr = $(this).parent().parent();
var qty = tr.find('.qty').val() - 0;
var dis = tr.find('.dis').val() - 0;
var price = tr.find('.price').val() - 0;

var total = (qty * price) - ((qty * price * dis)/100);
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
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h2 class="box-title">EDIT INVENTORY TRANSFER</h2>
        </div>
        <div class="box-body">
          {{ Form::model($InventoryTransfer, array('route' => array('InventoryTransfer.update', $InventoryTransfer->itransId), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
          
          
          <div class="form-group">
            <div class="{{ $errors->has('IssueDate') ? 'has-error' : ''}} ">
              {!! Form::label('Date', ' Date', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-3">
                {!! Form::text('DeliveryDate', $value = null, array( 'id'=> 'date',
                'class'  => 'form-control-heading')); !!}
                <div class="help-block">{{ $errors->first('IssueDate') }}</div>
              </div>
            </div>
            
            <div class="{{ $errors->has('Code') ? 'has-error' : '' }} ">
              {!!Form::label('Reference','Reference #',['class' => 'col-lg-2 control-label' ]) !!}
              <div class="col-lg-3">
                {!! Form::text('Reference', $value=null, ['class' => 'form-control-heading','placeholder' => 'Reference'])!!}
                <div class="help-block">{{ $errors->first('QuoteNumber') }}</div>
              </div>
            </div>
          </div>
          
          <div class="form-group {{ $errors->has('BillingAddress') ? 'has-error' : ''}}">
            {!!Form::label('Description','Description',['class' => 'col-lg-2 control-label' ]) !!}
            <div class="col-lg-6">
              {!! Form::text('Description', $value=null, ['class' => 'form-control-heading'])!!}
              <div class="help-block">{{ $errors->first('BillingAddress') }}</div>
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
                
                <th>
                  <div class="col-lg-1">
                    {!!Form::label('Action','Action',['class' => 'col-lg-1 control-label head-item' ]) !!}
                  </div>
                </th>
              </tr>
            </thead>
            <tbody class="neworderbody">
              <tr>
                @Foreach($InventoryTransferItem as $key =>$sale)
                @Foreach($sale->items as $key=>$value)
                <td class="no col-lg-3">
                  <select class="form-control col-lg-3 inventId form-control-heading" name="inventId[]">
                    <option  data-pro="{!! $value->inventoryItem->Description !!}"  value="{{$value->inventoryItem->inventId }}">{{ $value->inventoryItem->ItemName}}</option>
                    @foreach($inventory as $invent)
                    @if($invent->inventId!=$value->inventid)
                    <option data-pro="{!! $invent->Description !!}" data-price="{!! $invent->SalePrice !!}" value="{!! $invent->inventId !!}">{!! $invent->ItemName!!}</option>
                    @endif
                    @endforeach
                  </select>
                </td>
                <td class="col-lg-4">
                  <input type="text" class="discription form-control-heading " name="discription[]" value="{{$value->inventoryItem->Description}}" readonly>
                </td>
                <td class="col-lg-1">
                  <input type="number" class="qty form-control form-control-heading " name="qty[]"
                  value="{{$value->Quantity}}" >
                </td>
                <td class="col-lg-1">
                </td>
              </tr>
              @endforeach
              @endforeach
            </tbody>
          </table>
          <div style="margin-left: 76%" >
            <div  class="col-lg-4" >
              <input type="button" class=" add btn btn-lg btn-info" value="Add Item">
            </div>
            
          </div>
          <div class="form-group">
            {!!Form::label('From','From',['class' => 'col-lg-2 control-label ' ]) !!}
            <div class="col-lg-6 ">
              <select  name="InventoryLocationFrom" class="form-control-heading" id="InventoryLocationFrom">
                <option  value="{{ $InventoryTransfer->InventoryLocationFrom}}">{{ $InventoryTransfer->inventoryLocation->Name}}</option>
                @foreach ($InventoryLocation as $key => $value)
                @if($InventoryTransfer->InventoryLocationFrom !=$value->id)
                <option  value="{{ $value->id}}">{{ $value->Name}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            {!!Form::label('To','To',['class' => 'col-lg-2 control-label ' ]) !!}
            <div class="col-lg-6 ">
              <select  name="InventoryLocationTo" class="form-control-heading" id="InventoryLocationTo">
                <option  value="{{ $InventoryTransfer->InventoryLocationTo}}">{{ $InventoryTransfer->inventoryLocationTo->Name}}</option>
                @foreach ($InventoryLocation as $key => $value)
                @if($InventoryTransfer->InventoryLocationTo !=$value->id)
                <option value="{{ $value->id}}">{{ $value->Name}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <!-- Submit Button -->
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-success '] ) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection