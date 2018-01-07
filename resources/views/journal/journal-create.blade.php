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
   /* .btn-info{
    padding-top: 6px;
    height: 41px;
   margin-left: 43%;
    width: 12%;
    float: left;
      }*/

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
  /*  .btn-info {
    padding-top: 6px;
    height: 37px;
    margin-left: 14%;
    width: 173%;
    float: left;
    border-radius: 6px 6px 6px 6px;
     }*/
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
      font-size: 26px;
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
    $('.debt').each(function(i,e){
      var debt = $(this).val()-0;
      t += debt;
    });
   

     var totalcredit=0;
    $('.credit').each(function(i,e){
  
        var credit =$(this).val()-0;
         totalcredit+=credit;
    });
   

    var balance=t-totalcredit;
    if (balance==0) {
       
         $('.balance').text(balance + ' Balanced');
         $('.balance').css("color", "green");
    }
    else if(balance <0){
        $('.balance').text(balance + ' Unbalanced');
         $('.balance').css("color", "red");
    }
    else{
       $('.balance').text(balance + '  Unbalanced');
       $('.balance').css("color", "red");
       $('.balance').css("inline-block");
    }

    $('.debtTotal').val(t);
    $('.creditTotal').val(totalcredit);
 
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
      var tr = '<tr><td><select class="form-control inventId form-control-heading" name="inventId[]">' + inventory + '</select></td>' +

       '<td><input type="text" class="discription form-control-heading" name="discription[]" ></td>' +

      '<td><input type="text" class="debt form-control-heading" name="debt[]"></td>' +

      '<td><input type="text" class="credit form-control-heading" name="credit[]" readonly></td>' +
        
      '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td></tr>';
      $('.neworderbody').append(tr);
    });
// style="margin-left: 36px;margin-top: 14px;"
    $('.addcredit').click(function () {
      var inventory = $('.creditRow').html();
      var n = ($('.neworderbody tr').length - 0) + 1;
      var tr = '<tr><td><select class="form-control creditRow form-control-heading" name="inventId[]">' + inventory + '</select></td>' +

       '<td><input type="text" class="discription form-control-heading" name="discription[]" ></td>' +

      '<td><input type="text" class="debt form-control-heading" name="debt[]" readonly></td>' +

      '<td><input type="text" class="credit form-control-heading" name="credit[]" ></td>' +
        
      '<td><span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span></td></tr>';
      $('.neworderbody').append(tr);
    });

    $('.neworderbody').delegate('.delete', 'click', function () {
      $(this).parent().parent().remove();
      totalAmount();
    });

    //tax
   $('.neworderbody').delegate('.debt , .credit','keyup', function () {
      var tr = $(this).parent().parent();
      var debt = tr.find('.debt').val() - 0;
      var credit = tr.find('.credit-creditRow').val() - 0;
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
               <h2 class="box-title">Journal Entry</h2>
         </div>

        <div class="box-body">
          {!! Form::open(['url' => 'Journal',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    
         
 
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
             {!!Form::label('QuoteNumber','Quote #',['class' => 'col-lg-2 control-label' ]) !!}
             <div class="col-lg-4">
                {!! Form::text('QuoteNumber', $value=null, ['class' => 'form-control-heading','placeholder' => 'Automatic'])!!}
                 <div class="help-block">{{ $errors->first('QuoteNumber') }}</div>
             </div>
         </div>
      </div>

       <div class="form-group ">   
          <div class="{{ $errors->has('IssueDate') ? 'has-error' : ''}} ">
              {!! Form::label('Narration', 'Narration', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-6">
                  {!! Form::text('Narration', $value = null, array( 'id'=> 'date',
                  'class'  => 'form-control-heading')); !!}
                   <div class="help-block">{{ $errors->first('IssueDate') }}</div>
              </div>
          </div>
          
      </div>

     

            
            
    <table class="table col-lg-12">
        <thead>

          <tr> 
            <th>
               <div class="col-lg-3">
                 {!!Form::label('Account','Account',['class' => 'col-lg-3 control-label head-item' ]) !!}
                </div>
            </th>

             <th>
               <div class="col-lg-3">
              {!!Form::label('Descriptin','Description:',['class' => 'col-lg-3 control-label head-item' ]) !!}
               </div> 
            </th>

             <th>
               <div class="col-lg-2">
                 {!!Form::label('Debit','Debit',['class' => 'col-lg-2 control-label head-item' ]) !!}
               </div>  
             </th>

            <th>     
              <div class="col-lg-2">
                 {!!Form::label('Credit','Credit',['class' => 'col-lg-2 control-label head-item' ]) !!}
              </div>
            </th> 

            <th>     
              <div class="col-lg-2">
                 {!!Form::label('Action','Action',['class' => 'col-lg-2 control-label head-item' ]) !!}
              </div>
            </th>                 
        </tr>

              </thead>
              <tbody class="neworderbody">
                <tr>
                  
                  <td class="no col-lg-3">
                    <select class="form-control col-lg-3 inventId form-control-heading" name="inventId[]">
                      <option></option>
                      @foreach($accountType as $AccountType => $account)
                            <optgroup label="{{$AccountType}}">
                              @foreach($account as $accounts)
                                <option value="{{$accounts->id}}" data="{{ $accounts->AccountName}}">{{ $accounts->AccountName}}</option>
                              @endforeach
                            </optgroup>
                          @endforeach
                    </select>
                  </td>
                  <td class="col-lg-3">

                    <input type="text" class="discription form-control-heading " name="discription[]" >
                  </td>
                  <td class="col-lg-2">
                  <input type="text" class="debt form-control form-control-heading " name="debt[]" >
                  </td>                
                  <td class="col-lg-2">
                    <input type="text" class="credit form-control form-control-heading " name="credit[]"  readonly>
                  </td>
                  <td class="col-lg-2">
                    <!-- <span class="fa fa-trash delete" ></span> -->

                    <!-- <span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span> -->
                    
                  </td>
                </tr>
                    <tr>
                  
                  <td class="no col-lg-3">
                   <select class="form-control col-lg-3 creditRow form-control-heading" name="inventId[]">
                      <option></option>
                      @foreach($accountCreditType as $AccountType => $accountCredit)
                            <optgroup label="{{$AccountType}}">
                              @foreach($accountCredit as $accounts)
                                <option value="{{$accounts->id}}">{{ $accounts->AccountName}}</option>
                              @endforeach
                            </optgroup>
                          @endforeach
                    </select>
                  </td>
                  <td class="col-lg-3">

                    <input type="text" class="discription form-control-heading " name="discription[]" >
                  </td>
                  <td class="col-lg-2">
                  <input type="text" class="debt form-control form-control-heading " name="debt[]" readonly>
                  </td>                
                  <td class="col-lg-2">
                    <input type="text" class="credit form-control form-control-heading " name="credit[]">
                  </td>
                  <td class="col-lg-2">
                    <!-- <span class="fa fa-trash delete" ></span> -->

                    <!-- <span class="fa fa-trash delete" data-toggle="tooltip" data-original-title="Remove Item" value="x" style="margin-left: 36px;margin-top: 14px;"></span> -->
                    
                  </td>
                </tr>

              </tbody>                                 
            </table>  
    
    
     <div class="row" >
       <div class="col-lg-12" >
          <div class="col-lg-1">
              <input type="button" class="add btn btn-info" value="Debit Row">
          </div>

          <div class="col-lg-1">
              <input type="button" class="addcredit btn btn-danger" value="Credit Row">
          </div>
          
           <div class="col-lg-4"></div>

           <div  class="col-lg-2 taxbody " >
             <input type="text" class="debtTotal form-control-heading " name="debtTotal" name="debtTotal" id="debtTotal"
             placeholder="Debit" readonly>  
          </div>
          
         <div class="col-lg-2" >
             <input type="text" class="creditTotal form-control-heading "  name="creditTotal" id="creditTotal"
             placeholder="Credit" readonly>
         </div>
         <div class="col-lg-1">
              {!!Form::label('Status','Status',['class' => 'balance col-lg-1 ' ]) !!}
         </div>
         
      </div>
     </div>
 
      
       <div class="form-group">
           {!!Form::label('Notes','Notes:',['class' => 'col-lg-2 control-label' ]) !!}
           <div class="col-lg-10">
              {!! Form::textarea('Notes', $value=null, ['class' => 'form-control', 'rows' => 3, ])!!}
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