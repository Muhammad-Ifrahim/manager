 @extends('layouts.master')
    @section('content')
    <script type="text/javascript">
        $(function () {
          $('#example0').DataTable()
          $('#example3').DataTable()
          $('#example4').DataTable()
          $('#example5').DataTable()
          $('#example6').DataTable()
          $('#example7').DataTable()
          $('#example8').DataTable()
          $('#example9').DataTable()
          $('#example10').DataTable()
          $('#example11').DataTable()
          $('#example12').DataTable()
          $('#example13').DataTable()
          $('#example14').DataTable()
          $('#example15').DataTable()
          $('#example16').DataTable()
          $('#example17').DataTable()
          $('#example18').DataTable()
          $('#example19').DataTable()
          $('#example20').DataTable()
          $('#example21').DataTable()
          $('#example22').DataTable()
          $('#example23').DataTable()
          $('#example24').DataTable()
        });
    </script>
    <style type="text/css">
        .box-header .box-title {
          display: inline-block;
          font-size: 23px;
          margin: 3px;
          line-height: 1;
          color: rgba(76, 175, 80, 0.87);
          }
           button{
            padding: 0;
            border: none;
            background: none;
          }
         
          .action-region span{
            font-size: 20px;        
            text-decoration: none;
            margin: 0 10px;
         } 
    </style>     
    <section class="content">
                                                                    <!-- 1 -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Account Receivable</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($AccountReceivable as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cash at Bank</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example0" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($CashAtBank as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>
                                                                    <!-- 2 -->
       <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cash on Hand</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($CashOnHand as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                    </td>
                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory on Hand</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($InventoryOnHand as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
     </div>

                                                                       <!-- 3 -->
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Accounts Payable</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($AccountsPayable as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee Account</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example6" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($EmployeeAccount as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>
                                                                  <!-- 4 -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payroll Liabilities</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example7" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($PayrollLiabilities as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Retained Earnings</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example8" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($RetainedEarnings as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>
                                                      <!-- 5 -->
       <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Interest Received</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example9" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($InterestReceived as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory Sales</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example10" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($InventorySales as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>

                                                                    <!-- 6 -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Accounting Fees</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example11" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($AccountingFees as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Advertising</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example12" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($Advertising as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>


                                                                    <!-- 7 -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bank Charges</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example13" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($BankCharges as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Computer Equipment</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example14" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($ComputerEquipment as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>
        
                                                                    <!-- 8 -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Donations</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example15" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($Donations as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Electricity</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example16" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($Electricity as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>
           
                                                                    <!-- 9 -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Entertainment</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example17" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($Entertainment as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory Cost</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example18" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($InventoryCost as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>
                              
      
                                                                    <!-- 10 -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Legal Fees</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example19" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($LegalFees as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Motor Vehicle</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example20" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($MotorVehicle as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>

                                                      <!-- 11 -->

        <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rent</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example21" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($Rent as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
 
        <div class="col-md-6">
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Repairs</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example22" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($Repairs as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>

        <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rounding</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example23" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($Rounding as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
                      </div>

                    </td>

                  </tr> 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div> 

           <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Starting Balance Equity</h3>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example24" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">id</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Debit</th>
                  <th class="col-md-1">Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($StartingBalance as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-1">{{$value->Description}} </td>
                    <td class="col-md-1">{{$value->Debit}}</td>
                    <td class="col-md-1">{{$value->Credit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('ledgers/' . $value->journalid . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit ledgers"></span>
                       </a>
                       
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
      </div>
                      


   </section>
    

      

    @endsection('content')