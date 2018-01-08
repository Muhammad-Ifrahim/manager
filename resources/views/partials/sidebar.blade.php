
<aside class="main-sidebar">
    <section class="sidebar">
      
     <ul class="sidebar-menu" data-widget="tree">

       @if($user->accounts && $user->userType!='Admin' )
         <li id="BankAccount" >
            <a href="{{url('NotAvailable')}}">

        <li id="BankTransaction" >
          <a href="{{url('summary')}}">
            <i class="fa fa-tv"></i> <span>Summary</span>
          </a>
        </li>

        
       @if($user->accounts)
         <li id="BankAccount" >
            <a href="">
              <i class="fa fa-university"></i> <span>Bank Accounts</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">In Progress</small>
              </span>
            </a>
          </li>
        @endif

        

      
        <li id="BankTransaction" >
          <a href="{{url('cash')}}">
            <i class="fa fa-money"></i> <span>Cash Account</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
      
        <li>
          <a href="{{url('NotAvailable')}}" >
            <i class="fa fa-book"></i> <span>Journal Enteries</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($Journal)}}</small>
            </span>
          </a>
        </li> 

        <li>
          <a href="{{url('ledgers')}}" >
            <i class="fa fa-book"></i> <span>Ledgers</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue">T-Accounts</small>
            </span>
          </a>
        </li> 
        
      @if($user->customer && $user->userType!='Admin')
        <li id="customers" >
          <a  href="{{url('customer')}}">
            <i class="fa fa-users"></i> <span>Customer</span>
            <span class="pull-right-container"> 
            <small class="label pull-right bg-green">{{count($customers)}}</small>
            </span>
          </a>
        </li>
      @endif 
      @if($user->SalesQuote && $user->userType!='Admin')
        <li id="SalesQuotes">
          <a href="{{ url('proforma')}}">
            <i class="fa fa-pencil-square"></i> <span>Proforma</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($sale)}}</small>
            </span>
          </a>
        </li>
      @endif

      @if($user->SalesQuote)
        <li id="SalesQuotes">
          <a href="{{ url('saleinvoice')}}">
            <i class="fa fa-file-text-o"></i> <span>Sale Invoice</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($saleInvoice)}}</small>
            </span>
          </a>
      @endif 



      @if($user->payslips && $user->userType!='Admin')
      <li id="PaySlips">
          <a href="{{ url('payslip') }}">
            <i class="fa fa-newspaper-o"></i> <span>Payslips</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($payslp)}}</small>
            </span>
          </a>
      </li>
      @endif

      @if($user->SalesOrder && $user->userType!='Admin')
        <li id="SalesOrder" >
          <a href="">
            <i class="fa fa-th-list"></i> <span>Sales Order</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
      @endif  


      @if($user->SalesInvoice && $user->userType!='Admin')
     <!--  @if($user->SalesInvoice)
        <li id="SalesInvoices">
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Sales Invoices</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
      @endif   -->

      @if($user->employee && $user->userType!='Admin')
        <li id="Employee">
           <a href="{{url('employee')}}">
            <i class="fa fa-id-card"></i> <span>Employee</span>
            <span class="pull-right-container"> 
            <small class="label pull-right bg-green">{{count($employees)}}</small>
            </span>
          </a>
        </li>
      @endif

      @if($user->DeliveryNotes && $user->userType!='Admin')
        <li id="DeliveryNotes">
          <a href="{{ url('deliverynote')}}">
            <i class="fa fa-truck"></i> <span>Delivery Notes</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($DeliverySale)}}</small>
            </span>
          </a>
        </li>
      @endif

      @if($user->Supplier && $user->userType!='Admin')
        <li id="Suppliers">
          <a href="{{url('supplier')}}">
            <i class="fa fa-building-o"></i> <span>Suppliers</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($supplier)}}</small>
            </span>
          </a>
        </li>
      @endif

      @if($user->PurchaseOrder && $user->userType!='Admin')
        <li id="PurchaseOrder" >
          <a href="{{url('purchaseorder')}}">
            <i class="fa fa-shopping-cart"></i> <span>Purchase Order</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($PurchaseOrderSale)}}</small>
            </span>
          </a>
        </li>
      @endif


      @if($user->PurchaseInvoice && $user->userType!='Admin')
      <!-- @if($user->PurchaseInvoice)
         <li id="PurchaseInvoices" >
          <a href="pages/widgets.html">
            <i class="fa fa-calendar"></i> <span>Purchase Invoices</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
      @endif -->

        <li id="Emails">
          <a href="{{url('NotAvailable')}}">
            <i class="fa fa-envelope"></i> <span>Emails</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
          
      @if($user->report && $user->userType!='Admin')       
         <li >
          <a href="{{ url('Reports')}}">
            <i class="fa fa-print"></i> <span>Reports</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
      @endif

      @if($user->inventory && $user->userType!='Admin')
       <li id="InventoryItems">
          <a href="{{ url('Inventory')}}">
            <i class="fa fa-archive"></i> <span>Inventory Items</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{count($inventory)}}</small>
            </span>
          </a>
       </li>
      @endif

      @if($user->InventoryTransfer && $user->userType!='Admin')  
        <li id="InventoryTransfer">
          <a href="{{ url('InventoryTransfer')}}">
            <i class="fa fa-exchange"></i><span>Inventory Transfer</span>
            <span class="pull-right-container">
             <small class="label pull-right bg-green">{{count($InventoryTransfer)}}</small>
            </span>
          </a>
        </li>
      @endif

      @if($user->FixedAsset && $user->userType!='Admin')
       <li id="FixedAsset" >
          <a href="{{url('fixedasset')}}">
            <i class="fa fa-print"></i> <span>Fixed Asset</span>
            <span class="pull-right-container">
             <small class="label pull-right bg-green">{{count($fixedassets)}}</small> 
            </span>
          </a>
       </li>
      @endif
      
      @if($user->userType=='Manager' )
      <li>
        <a href="{{url('settings')}}">
          <i class="fa fa-cog"></i> <span>Settings</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      @endif

      @if($user->userType=='Admin' || $user->userType=='Manager' )
      <li class="user">
          <a href="{{ url('user')}}">
            <i class="fa fa-users"></i>
             <span style="text-align: center;">Manage People</span>
            
          </a>
        </li>
        @endif

      @if($user->userType=='Manager' )
      <li class="customize">
          <a href="{{ url('customize')}}">
            <i class="fa fa-wrench"></i>
             <span style="text-align: center;">Customize</span>
            
          </a>
        </li>
        @endif
    </ul>
  </section>
</aside>