<aside class="main-sidebar">
    <section class="sidebar">
     
     
     <ul class="sidebar-menu" data-widget="tree">
       <li id="BankAccount">
          <a href="pages/widgets.html">
            <i class="fa fa-university"></i> <span>Bank Accounts</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

        <li id="BankTransaction" >
          <a href="pages/widgets.html">
            <i class="fa fa-money"></i> <span>Bank Transactions</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

        <li>
          <a>
            <i class="fa fa-book"></i> <span>Journal Enteries</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li> 
      
        <li id="customers" >
          <a  href="{{url('customer')}}">
            <i class="fa fa-users"></i> <span>Customer</span>
            <span class="pull-right-container"> 
            <small class="label pull-right bg-green">{{count($customers)}}</small>
            </span>
          </a>
        </li> 
       


        <li id="SalesQuotes">
          <a href="pages/widgets.html">
            <i class="fa fa-pencil-square"></i> <span>Sales Quotes</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

        <li id="SalesOrder" >
          <a href="pages/widgets.html">
            <i class="fa fa-th-list"></i> <span>Sales Order</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
        
        <li id="SalesInvoices">
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Sales Invoices</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

     
        <li id="Employee">
           <a href="{{url('employee')}}">
            <i class="fa fa-id-card"></i> <span>Employee</span>
            <span class="pull-right-container"> 
            <small class="label pull-right bg-green">{{count($employees)}}</small>
            </span>
          </a>
        </li>
      

        

        <li id="DeliveryNotes">
          <a href="pages/widgets.html">
            <i class="fa fa-truck"></i> <span>Delivery Notes</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

        <li id="Suppliers">
          <a href="pages/widgets.html">
            <i class="fa fa-building-o"></i> <span>Suppliers</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

        <li id="PurchaseOrder" >
          <a href="pages/widgets.html">
            <i class="fa fa-shopping-cart"></i> <span>Purchase Order</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

         <li id="PurchaseInvoices" >
          <a href="pages/widgets.html">
            <i class="fa fa-calendar"></i> <span>Purchase Invoices</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

        <li id="Emails">
          <a href="pages/widgets.html">
            <i class="fa fa-envelope"></i> <span>Emails</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>
          

      
         <li >
          <a href="pages/widgets.html">
            <i class="fa fa-print"></i> <span>Reports</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

       <li id="InventoryItems">
          <a href="pages/widgets.html">
            <i class="fa fa-archive"></i> <span>Inventory Items</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>

        
        <li id="InventoryTransfer">
          <a href="pages/widgets.html">
            <i class="fa fa-exchange"></i>
                 <span>Inventory Transfer</span>
            <span class="pull-right-container">
             <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li>


       <li id="FixedAsset" >
          <a href="{{url('fixedasset')}}">
            <i class="fa fa-print"></i> <span>Fixed Asset</span>
            <span class="pull-right-container">
             <small class="label pull-right bg-green">{{count($fixedassets)}}</small> 
            </span>
          </a>
        </li>

      <li>
        <a href="{{url('settings')}}">
          <i class="fa fa-cog"></i> <span>Settings</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="customize">
          <a href="{{ url('customize')}}">
            <i class="fa fa-wrench"></i>
             <span style="text-align: center;">Customize</span>
            
          </a>
        </li>
    </ul>
    </section>
      
  </aside>