
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
   /* padding-top: 6px;*/
    height: 37px;
   /* margin-left: 14%;*/
    width: 173%;
    /*float: left;*/
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
    var dt=0;
    $('.Earnamount').each(function(i,e){
      var amt = $(this).val()-0;
      t += amt;
    });
    $('.deductionamount').each(function(i,e){
      var deduct=$(this).val()-0;
     dt+=deduct;
     });

   // $('.total').html(t);
     $("#deductamount").val(dt);
     $("#GrossPay").val(t);
     var NetPay=($("#GrossPay").val()-0)-($("#deductamount").val()-0);
     $("#NetPay").val(NetPay);
  }
  function contributeAmount(){
      var ct=0;
    $('.contributionamount').each(function(i,e){
         ct+=$(this).val()-0;
    });
    $("#ct").val(ct);
  }

   $(document).ready(function(){
        var date_input=$('input[name="Date"]'); //our date input has the name "date"
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
      var earn = $('.EarnItem').html();
      var n = ($('.neworderbody tr').length - 0) + 1;
      var tr = '<tr><td><select class="form-control EarnItem form-control-heading" name="EarnItem[]">' + earn + '</select></td>' +

       '<td><input type="text" class="discription form-control-heading" name="discription[]"></td>' +

      '<td><input type="number" class="qty form-control-heading" name="qty[]" ></td>' +

      '<td><input type="text" class="price form-control-heading" name="price[]" ></td>' +

      '<td><input type="text" class="Earnamount form-control-heading" name="amount[]" readonly></td>' +
        
      '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td></tr>';
      $('.neworderbody').append(tr);
    });

    // add deduction
     $('.addDeduction').click(function () {
      var deduction = $('.deduction').html();
      var n = ($('.neworderbody-deduction tr').length - 0) + 1;
      var tr = '<tr><td><select class="form-control deduction form-control-heading" name="DeductItem[]">' + deduction + '</select></td>' +

       '<td><input type="text" class="discription form-control-heading" name="discription-deduction[]" ></td>' +

      '<td><input type="text" class="deductionamount form-control-heading" name="amount-deduction[]" ></td>' +
        
      '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td></tr>';
      $('.neworderbody-deduction').append(tr);
    });

      $('.addContribution').click(function () {
      var Contribution = $('.contribution').html();
      var n = ($('.neworderbody-contribution tr').length - 0) + 1;
      var tr = '<tr><td><select class="form-control contribution form-control-heading" name="ContributItem[]">' + Contribution + '</select></td>' +

       '<td><input type="text" class="discription form-control-heading" name="discription-contribution[]" ></td>' +

      '<td><input type="text" class="contributionamount form-control-heading" name="amount-contribution[]" ></td>' +
        
      '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td></tr>';
      $('.neworderbody-contribution').append(tr);
    }); 



    // add Contribution

// style="margin-left: 36px;margin-top: 14px;"

    $('.neworderbody').delegate('.delete', 'click', function () {
      $(this).parent().parent().remove();
      totalAmount();
    });

    $('.neworderbody-deduction').delegate('.delete', 'click', function () {
      $(this).parent().parent().remove();
      totalAmount();
    });

    $('.neworderbody-contribution').delegate('.delete', 'click', function () {
      $(this).parent().parent().remove();
      totalAmount();
    });

   // customer
    $('.customerbody').delegate('.customer', 'change', function () {
      var tr = $(this).parent().parent();
      var addres = tr.find('.customer option:selected').attr('data-addres');
      $('.addres').val(addres);
      });

    $('.neworderbody-deduction').delegate('.deductionamount','keyup',function(){
         var tr = $(this).parent().parent();  
          totalAmount();
         // $("#NetPay").val(deduction);

    });
     $('.neworderbody-contribution').delegate('.contributionamount','keyup',function(){
         var tr = $(this).parent().parent();  
          contributeAmount();
         

    });
    $('.neworderbody').delegate('.qty , .price', 'keyup', function () {

      var tr = $(this).parent().parent();
      var qty = tr.find('.qty').val() - 0;
      var price = tr.find('.price').val() - 0;
      var total = qty * price;
      tr.find('.Earnamount').val(total);
      totalAmount();
    });
    
        $('#hideshow').on('click', function(event) {  
       $('#content').removeClass('hidden');
      $('#content').addClass('show'); 
             $('#content').toggle('show');
        });
    

    
  });
</script>

<!--<style>

</style> -->
<div class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box">
         <div class="box-header">
               <h2 class="box-title">PAYSLIP ITEM</h2>
         </div>

        <div class="box-body">
          {{ Form::model($payslip, array('route' => array('payslip.update', $payslip->payId), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
                    
          
 
       <div class="form-group">   
          <div class="{{ $errors->has('IssueDate') ? 'has-error' : ''}} ">
              {!! Form::label(' Date', 'Date', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-4">
                  {!! Form::text('Date', $value = null, array( 'id'=> 'date',
                  'class'  => 'form-control-heading')); !!}
                   <div class="help-block">{{ $errors->first('IssueDate') }}</div>
              </div>
          </div>
         
      </div>

     

      <div class="form-group">
          {!!Form::label('Employee','Employee',['class' => 'col-lg-2 control-label ' ]) !!}
        <div class="col-lg-6 customerbody">
          <select  name="Employee" class="form-control-heading Employee" id="Employee">
                <option  value="{{ $payslip->Employee}}">
                      {{ $payslip->User->name}}</option>
             @foreach ($employees as $key => $value)
                     @if($value->empId != $payslip->Employee)
                     <option  value="{{ $value->empId}}">{{ $value->name}}</option>
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
               {!!Form::label('Earning','Earning',['class' => 'col-lg-3 control-label head-item' ]) !!}
              </div>
          </th>

         <th>
           <div class="col-lg-4">
          {!!Form::label('Descriptin','Description',['class' => 'col-lg-4 control-label head-item' ]) !!}
           </div> 
        </th>

        <th>
          <div class="col-lg-1">
            {!!Form::label('Qty','Qty',['class' => 'col-lg-1 control-label head-item' ]) !!}
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
                @Foreach($PayslipsEarn as $key =>$pay) 
                  @Foreach($pay->PayslipsEarnItem as $key=>$value)
                <tr>
                  
                  <td class="no col-lg-3">
                    <select class="form-control col-lg-3 EarnItem form-control-heading" name="EarnItem[]">
                       <option  value="{{ $value->Earning}}">
                      {{ $value->Earn->name}}
                    </option>

                      @foreach($pEarnItem as $item)
                            @if($value->Earning != $item->eId)
                         <option  value="{!! $item->eId !!}">{!! $item->name!!}</option>
                             @endif
                      @endforeach
                    </select>
                  </td>
                  <td class="col-lg-4">

                    <input type="text" class="discription form-control-heading " name="discription[]" value="{{$value->Description}}" >
                  </td>

                  <td class="col-lg-1">
                    <input type="number" class="qty form-control form-control-heading " name="qty[]" value="{{$value->Quantity}}" >
                  </td>   
                  <td class="col-lg-1">
                <input type="text" class="price form-control form-control-heading" name="price[]" value="{{$value->Price}}" >
                  </td>
                                
                <td class="col-lg-1">
                  <input type="text" class="Earnamount form-control form-control-heading " name="amount[]" readonly value="{{$value->Amount}}">
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
      <div  class="col-lg-1" >
              <input type="button" class=" add btn btn-info" value="Add Earning">
      </div>     

      <div > 
       <div style="margin-left: 74%" >      
        
          
         <div class="col-lg-3" style="margin-left: 48px;width: 148px">
             <input type="text" class=" form-control-heading " name="GrossPay" name="GrossPay" id="GrossPay"
             placeholder="Gross Pay" readonly value="{{ $payslip->GrossPay}}">
         </div>  
      </div>
     </div>     
        
    
        <table class="table col-lg-12">

        <thead>

          <tr> 
                    
          <th>
             <div class="col-lg-3">
               {!!Form::label('Deduction','Deduction',['class' => 'col-lg-3 control-label head-item' ]) !!}
              </div>
          </th>

         <th>
           <div class="col-lg-6">
          {!!Form::label('Descriptin','Description',['class' => 'col-lg-6 control-label head-item' ]) !!}
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
              <tbody class="neworderbody-deduction">
                @Foreach($PayslipsEarn as $key =>$pay) 
                  @Foreach($pay->PayslipsDeductItem as $key=>$value)
                <tr>
                  <td class="no col-lg-3">
                    <select class="form-control col-lg-3 deduction form-control-heading" name="DeductItem[]">
                      <option  value="{{ $value->Deduction}}">
                      {{ $value->Deduct->name}}
                    </option>
                      @foreach($pDeductItem as $item)
                          @if($item->dId != $value->Deduction)
                      <option  value="{!! $item->dId !!}">{!! $item->name!!}</option>
                          @endif
                      @endforeach
                    </select>
                  </td>
                  <td class="col-lg-6">
                    <input type="text" class="discription form-control-heading " name="discription-deduction[]" value="{{ $value->Description}}" >
                  </td>
                                  
                  <td class="col-lg-1">
                    <input type="text" class="deductionamount form-control form-control-heading " name="amount-deduction[]" value="{{ $value->Amount}}" >
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
      
      <div  class="col-lg-1" >
              <input type="button" class=" addDeduction btn btn-info" value="Add Deduction">
      </div>      
          
   
    
      <div > 
       <div style="margin-left: 74%" >      
          
          
         <div class="col-lg-3" style="margin-left: 48px;width: 148px">
             <input type="text" class=" form-control-heading " name="deductamount" name="deductamount" id="deductamount"
             placeholder="Deduction" readonly value="{{$payslip->Deduction}}">
            <div style="margin-top: 10px"> 
             <input type="text" class=" form-control-heading " name="NetAmount" name="total" id="NetPay"
             placeholder="Net Pay" readonly value="{{$payslip->NetPay}}">
            </div> 
         </div>
         
      </div>
     </div>       
       

       <!-- Employeer Contribution Deduction -->
             <table class="table col-lg-12">

        <thead>

          <tr>         
          <th>
             <div class="col-lg-3">
               {!!Form::label('ECD','Contribution Deduction',['class' => ' control-label head-item' ]) !!}
              </div>
          </th>

         <th>
           <div class="col-lg-6">
          {!!Form::label('Descriptin','Description',['class' => 'col-lg-6 control-label head-item' ]) !!}
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
              <tbody class="neworderbody-contribution">
               @Foreach($PayslipsEarn as $key =>$pay) 
                  @Foreach($pay->PayslipsContributeItem as $key=>$value) 
                <tr>
                  <td class="no col-lg-3">
                    <select class="form-control col-lg-3 contribution form-control-heading" name="ContributItem[]">
                      <option  value="{{  $value->Contribution }} ">
                      {{ $value->Contribute->name}}
                    </option>
                      @foreach($pContributItem as $Item)
                         @if($Item->cId != $value->Contribution)
                      <option  value="{!! $Item->cId !!}">{!! $Item->name!!}</option>
                          @endif
                      @endforeach
                    </select>
                  </td>
              <td class="col-lg-6">
                <input type="text" class="discription form-control-heading " name="discription-contribution[]" value="{{ $value->Description}}"> 
              </td>

              <td class="col-lg-1">
                  <input type="text" class="contributionamount form-control form-control-heading " name="amount-contribution[]"  value="{{$value->Amount}}">
              </td>
                  <td class="col-lg-1">
                    <!-- <span class="fa fa-trash delete" ></span> -->

                    <span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span>
                    
                  </td>
                </tr>
            @endForeach
          @endForeach  
              </tbody>                                 
            </table>  
            
      <div  class="col-lg-1" >
              <input type="button" class="addContribution  btn btn-info" value="Add  Contribution">
      </div>    
   
    
      <div > 
       <div style="margin-left: 74%" >      
          
          
         <div class="col-lg-3" style="margin-left: 48px;width: 148px">
             <input type="text" class=" form-control-heading " name="ct" name="ct" id="ct"
             placeholder="Contribution" readonly value="{{$payslip->Contribution}}" >
         </div>
         
      </div>
     </div>       
         
     <br>
     <br>


       <!--Employeer Contribution Deduction  -->
       <div class="form-group" >
           {!!Form::label('Notes','Notes:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-7">
              {!! Form::textarea('Notes', $value=null, ['class' => 'form-control', 'rows' => 3, ])!!}
              <div class="help-block">{{ $errors->first('Notes') }}</div>
           </div>
       </div>


        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-4">
                {!! Form::submit('Update Paylist', ['class' => 'btn  btn-success '] ) !!}
            </div>
        </div>
         <!--  -->
         </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection