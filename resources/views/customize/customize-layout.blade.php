@extends('layouts.master')
@section('content')
  <style type="text/css">
  	.sidebar-customize{

    font-size: 18px;
    border: 2px solid lightblue;
    margin-top: 2px;
    margin-left: 25px;
    padding-top: 6px;
    margin-bottom: 10px;
    list-style-position: inherit;
  	}
    .row {
    margin-top: 0px;
    margin-right: 0px;
    margin-left: 0px;
     }
     .box{
      margin-top: 10px;
     }
    .box-header .box-title {
      display: inline-block;
      font-size: 23px;
      margin: 3px;
      line-height: 1;
      color: rgba(76, 175, 80, 0.87);
    }
  	li{
  		list-style: none
  	}
    input[type=submit]{
      margin-left: 30px;
      width: 63%;
    }
  	input[type=checkbox], input[type=radio] {
    margin: 7px 0 0;
    margin-top: 1px\9;
    line-height: normal;
    margin-right: 10px;
    margin-left: 5px;
   
   }
   .sidebar-hide{
    pointer-events:none;
    font-size: 18px;
    border: 2px solid rgba(76, 175, 80, 0.87);    
    margin-top: 2px;
    margin-left: 25px;
    padding-top: 6px;
    margin-bottom: 10px;
    list-style-position: inherit;
    opacity:0.5;

   }
  </style>

  <section class="section">
  <div class="row">
  	<div class="col-md-12">
  		<div class="box">
  			<div class="box-header">
               <h2 class="box-title">Customize Dashboard</h2>
            </div>
  			<div class="box-body">

          <div class="col-md-6 ">

            {!! Form::open(['url' => 'customize',  'method' => 'POST', 'class' => 'form-horizontal']) !!}

              <div  class="{{$user->accounts==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                  <a>
                     {{ Form::checkbox('accounts', 'accounts', $user->accounts, ['id' => 'accounts']) }}
                    <i class="fa fa-university"></i> 
                    <span>Bank Accounts</span>
                  </a>
              </div>
            
              <div class="{{$user->BankTransaction==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                 <input type="checkbox" name="BankTransaction" id="BankTransaction">
                    <i class="fa fa-money"></i> 
                    <span>Bank Transaction</span>
                  </a>
              </div>
   
              <div class="{{$user->customer==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                   {{ Form::checkbox('customer', 'customer', $user->customer, ['id' => 'customer']) }} 
                    <i class="fa fa-users"></i> 
                    <span>Customer</span>
                  </a>
              </div>
              
              <div class="{{$user->SalesQuote==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                    {{ Form::checkbox('SalesQuote', 'SalesQuote', $user->SalesQuote, ['id' => 'SalesQuote']) }}
                    <i class="fa fa-pencil-square"></i> 
                    <span>Sales Quote</span>
                  </a>
                </div>
                
               
         </div>
  			 
  				<div class="col-md-6 ">
  					   <div  class="{{$user->SalesOrder==0 ? 'sidebar-hide': 'sidebar-customize'}}">
				          <a>
                    {{ Form::checkbox('SalesOrder', 'SalesOrder', $user->SalesOrder, ['id' => 'SalesOrder']) }}
				            <i class="fa fa-th-list"></i> 
                    <span>Sales Order</span>
				          </a>
                </div>

                <div class="{{$user->SalesInvoice==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                    {{ Form::checkbox('SalesInvoice', 'SalesInvoice', $user->SalesInvoice, ['id' => 'SalesInvoice']) }}
                    <i class="fa fa-th"></i> 
                    <span>Sale Invoices</span>
                  </a>
               </div>

               <div class="{{$user->DeliveryNotes==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                    {{ Form::checkbox('DeliveryNotes', 'DeliveryNotes', $user->DeliveryNotes, ['id' => 'DeliveryNotes']) }}
                    <i class="fa fa-truck"></i> 
                    <span>Delivery Note</span>
                  </a>
               </div>
                  
               <div class="{{$user->Supplier==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                    {{ Form::checkbox('Supplier', 'Supplier', $user->Supplier, ['id' => 'Supplier']) }}
                    <i class="fa fa-building-o"></i> 
                    <span>Supplier</span>
                  </a>
                </div>
         </div>
        
          <div class="col-md-6 ">
               <div  class="{{$user->PurchaseOrder==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                  <a>
                    {{ Form::checkbox('PurchaseOrder', 'PurchaseOrder', $user->PurchaseOrder, ['id' => 'PurchaseOrder']) }}
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Purchase Order</span>
                  </a>
                </div>
                <div class="{{$user->PurchaseInvoice==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                    {{ Form::checkbox('PurchaseInvoice', 'PurchaseInvoice', $user->PurchaseInvoice, ['id' => 'PurchaseInvoice']) }}
                    <i class="fa fa-calendar"></i> 
                    <span>Purchase Invoices</span>
                  </a>
               </div>

            <div class="{{$user->inventory==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                {{ Form::checkbox('InventoryItems', 'InventoryItems', $user->inventory, ['id' => 'InventoryItems']) }}
                    <i class="fa fa-archive"></i> 
                    <span>Inventory Item</span>
                  </a>
            </div>
                  
            <div class="{{$user->InventoryTransfer==0 ? 'sidebar-hide': 'sidebar-customize'}}">
                   <a>
                    {{ Form::checkbox('InventoryTransfer', 'InventoryTransfer', $user->InventoryTransfer, ['id' => 'InventoryTransfer']) }}
                    <i class="fa fa-exchange"></i> 
                    <span>Inventory Transfer</span>
                  </a>
            </div>  
         </div>
<!--  -->
      <div class="col-md-6 ">
        
        <div class="{{$user->employee==0 ? 'sidebar-hide': 'sidebar-customize'}}" >
            <a>
                {{ Form::checkbox('Employee', 'Employee', $user->employee, ['id' => 'employee']) }} 

               <i class="fa fa-id-card"></i> 
                <span>Employee</span>
            </a>
        </div>
        <div class="{{$user->customer==0 ? 'sidebar-hide': 'sidebar-customize'}}">
           <a>
            {{ Form::checkbox('PaySlip', 'PaySlip', $user->PaySlip, ['id' => 'PaySlip']) }} 
            <i class="fa fa-print"></i> 
            <span>Pay Slip</span>
          </a>
       </div>

       <div class="{{$user->FixedAsset==0 ? 'sidebar-hide': 'sidebar-customize'}}">
           <a>
           {{ Form::checkbox('FixedAsset', 'FixedAsset', $user->FixedAsset, ['id' => 'FixedAsset']) }} 
            <i class="fa fa-print"></i> 
            <span>Fixed Asset</span>
          </a>
       </div>
       
      </div>



     <div class="col-md-3" style="margin-top: 25px;
    margin-left: 30%;">
            <div >
                {!! Form::submit('Customize', ['class' => 'btn btn-lg btn-success pull-right'] ) !!}
            </div>
              
      </div>              
            
  				

  			</div>
  		</div>
  	
  	</div>
   </div>
 </section>
    <script type="text/javascript">
       // $(document).ready(function(){
             
       //     $('#customize').click(function(e){
       //          e.preventDefault();
       //          var Employee=document.getElementById('employee').checked ? '1' :'0' ;
       //          var customers=document.getElementById('customer').checked ? '1' :'0' ;
       //          var accounts=document.getElementById('accounts').checked ? '1' :'0';
       //          var Inventory=document.getElementById('InventoryItems').checked ? '1' :'0';

       //         console.log(Employee);
       //         console.log(customers);

       //               $.ajaxSetup({
       //                headers: {
       //                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       //                  }
       //              });
       //                 $.ajax({
       //         url :"{{ url('user')}}",
       //         type :'POST',
       //         data :{
       //            customer : customers,
       //            accounts : accounts,
       //            inventory: Inventory,
       //            employee : Employee
       //         },
       //         dataType: 'JSON',
       //       success: function( data ) {
       //         $.ajax({
                    
       //         });
       //      }  

       //     });  

       //     });
          
       //  });

   
   </script>
@endSection('content')