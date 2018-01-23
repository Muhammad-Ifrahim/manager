@extends('layouts.master')
@section('content')
<style type="text/css">
  .title{
    font-size: 18px;
    font-weight: bold;
    font-family: sans-serif;
  }
  .list-group{
  border: none;
   }
   .list-group-item{
  border: none;
   }
</style>
<section class="content">
 <div class="">
  <div class="">
  <div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
           <div class="panel panel-success">
            <div class="panel-heading">

              <span class="title">Assets</span> 
              <span class="pull-right">
                   <label class="title">{{number_format($Assets,2)}}</label>
              </span>   
             </div>
             <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                          Account Recieveable
                       <span class="pull-right">
                            <label class="title">{{number_format($AccountReceivable,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Cash on Hand
                       <span class="pull-right">
                            <label class="title">{{number_format($CashOnHand,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Inventory on Hand
                       <span class="pull-right">
                            <label class="title">{{number_format($InventoryOnHand,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Fixed Assets
                       <span class="pull-right">
                            <label class="title"></label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Fixed Assets Accumulated Deprication
                       <span class="pull-right">
                            <label class="title"></label>
                        </span>   
                    </li>
                    
                  </ul>
              </div>
            
          </div>

          <div class="panel panel-success">
            <div class="panel-heading">
              <span class="title">Liablities</span>
              <span class="pull-right">
                   <label class="title">{{number_format($Liability,2)}}</label>
              </span>     
             </div>
            <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                          Account Payable
                       <span class="pull-right">
                            <label class="title">{{number_format($AccountsPayable,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Employee Clearing Account
                       <span class="pull-right">
                            <label class="title">{{number_format($EmployeeAccount,2)}}</label>
                        </span>  
                    </li>
                   <li class="list-group-item">
                          Payroll liabilities
                       <span class="pull-right">
                            <label class="title">{{number_format($PayrollLiabilities,2)}}</label>
                        </span>   
                    </li>
                    
                  </ul>
              </div>
          </div>


          <div class="panel panel-success">
            <div class="panel-heading">
              <span class="title">Equity</span>
              <span class="pull-right">
                   <label class="title">{{number_format($equity,2)}}</label>
              </span>     
             </div>
            <div class="panel-body">
               <ul class="list-group">
                    <li class="list-group-item">
                          Retained Earnings
                       <span class="pull-right">
                            <label class="title">{{number_format($RetainedEarnings,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Starting balance equity
                       <span class="pull-right">
                            <label class="title">{{number_format($StartingBalance,2)}}</label>
                        </span>   
                    </li>
                  </ul>
            </div>
          </div>

        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <span class="title" >Income Summary</span> 
                    <!-- <span class="pull-right">
                     <label class="title">Income</label>
                    </span>  -->
                </div>
                <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                          Inventory Sales
                       <span class="pull-right">
                            <label class="title">{{number_format($InventorySales,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Cost of Sales
                       <span class="pull-right">
                            <label class="title">{{number_format($CostOfSale,2)}}</label>
                        </span>   
                    </li>
                    
                  </ul>
                </div>
            </div>

          <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="title">Gross Profit</span>
                    <span class="pull-right">
                       <label class="title">{{number_format($gross,2)}}</label>
                   </span>  
                </div>
            </div>

 

            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="title">Expenses</span>
                    <span class="pull-right">
                      <label class="title">{{number_format($expenses,2)}}</label>
                    </span>  
                </div>
                <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                          Accounting fees
                       <span class="pull-right">
                            <label class="title">{{number_format($AccountingFees,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Advertising and promotion
                       <span class="pull-right">
                            <label class="title">{{number_format($Advertising,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Bank charges
                       <span class="pull-right">
                            <label class="title">{{number_format($BankCharges,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Computer equipment
                       <span class="pull-right">
                            <label class="title">{{number_format($ComputerEquipment,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Donations
                       <span class="pull-right">
                            <label class="title">{{number_format($Donations,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Electricity
                       <span class="pull-right">
                            <label class="title">{{number_format($Electricity,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Entertainment
                       <span class="pull-right">
                            <label class="title">{{number_format($Entertainment,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Inventory - cost
                       <span class="pull-right">
                            <label class="title">{{number_format($InventoryCost,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Legal fees
                       <span class="pull-right">
                            <label class="title">{{number_format($LegalFees,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Motor vehicle expenses
                       <span class="pull-right">
                            <label class="title">{{number_format($MotorVehicle,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Printing and stationery
                       <span class="pull-right">
                            <label class="title"></label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Rent
                       <span class="pull-right">
                            <label class="title">{{number_format($Rent,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Repairs and maintenance
                       <span class="pull-right">
                            <label class="title">{{number_format($Repairs,2)}}</label>
                        </span>   
                    </li>
                    <li class="list-group-item">
                          Telephone
                       <span class="pull-right">
                            <label class="title"></label>
                        </span>   
                    </li>

                    <li class="list-group-item">
                          Wages & salaries
                       <span class="pull-right">
                            <label class="title"></label>
                        </span>   
                    </li>
                                       
                  </ul>
                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="title">Other Income</span>
                    <span class="pull-right">
                       <label class="title">{{number_format($InterestReceived,2)}}</label>
                   </span>  
                </div>
                <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                          Intrest Recived
                       <span class="pull-right">
                            <label class="title">{{number_format($InterestReceived,2)}}</label>
                        </span>   
                    </li>
                  </ul>
                </div>
                
            </div>

             <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="title">Net Income</span>
                    <span class="pull-right">
                       <label class="title">{{number_format($net,2)}}</label>
                   </span>  
                </div>
            </div>
        </div>
    </div>
    
  </div>
  </div>
 </div>  
</section>


@endsection('content')