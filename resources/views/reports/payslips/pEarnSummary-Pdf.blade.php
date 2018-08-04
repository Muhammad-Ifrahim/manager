 <!DOCTYPE html>
 <html>
 <head>     
     <title>Report</title>
 </head>
 <body>
      <style type="text/css">
       .box-title {
          font-size: 40px;
          font-weight:bold
          line-height: 1;
          color: rgba(76, 175, 80, 0.87);
          }

        .box-align {
          text-align: center;
          color: rgba(76, 175, 80, 0.87);
        }

        .box-align2 {
          text-align: center;
        }
          
         .wrapper {
              width: 500px;
             
          }
          .first {

              float: left;
              width: 300px;
              border: 1px solid red;
               position: absolute;
          }
          .second {
              
              
              margin: 0 0 0 302px;
              
          }
         table {
  border-collapse:collapse;
}
  tr {
     border:none;
   }
 td,th {
      border-collapse:collapse;
      border: 1px solid black;
      padding-top:0;
      padding-bottom:0;
       padding: 10px;
      text-align: center;
      }
      .verticalSplit {
        border-top:none;
        border-bottom:none;
      }
      .verticalSplit:first-of-type {
        border-left:none;
      }
      .verticalSplit:last-of-type {
        border-right:none;
      }
      .lastRow {
        border-top:none;
        border-bottom:none;
      }
      .lastRow:first-of-type {
        border-left:none;
      }
      .lastRow:last-of-type {
        border-right:none;
      }
      .lastRow{
        border-collapse:collapse;
      
      padding-top:0;
      padding-bottom:0;
      padding: 15px;
      text-align: left;
      border: none;
      }

      tr.hide_all > td, td.hide_all{
        border-style:hidden;
      }
    </style>     
   
  <div>
    <h2 class="box-align">{{$busName}}</h2>
    <h1 class="box-title" style="text-align:center !important;">Payslip Earning Summary</h1>
    <h3 class="box-align2">For the period from {{$pslipRep[0]->from}} to {{$pslipRep[0]->to}}
    </h3>
            <!-- /.box-header  -->
  <div style="margin-top: 50px; border:1px solid black;">
    <table style=" width: 100%" table table-striped pagin-table table-bordered>
  {{-- I have added php tags to use php code in order to display Payslip Deduction item names uniquely --}}
        <thead>
              <tr>
                <th>Employee</th>
                {{-- Get All PayslipDeduction Items --}}

                @php
                $earnNameTemp = $earnName;
                $totalNetPay = 0;
                $colName = array();
                @endphp

                @for ($i=0; $i < sizeof($pslips); $i++) 
                {  
                  @for ($j=0; $j < sizeof($pslips[$i]->PayslipsEarnItem); $j++) 
                  {
                    @if($pslips[$i]->PayslipsEarnItem[$j]->Earn!=null)
                    {
                      @if($pslips[$i]->GrossPay!=0)
                      {
                        @if(in_array($pslips[$i]->PayslipsEarnItem[$j]->Earn->name, $earnNameTemp))
                        {
                          <th>{{$pslips[$i]->PayslipsEarnItem[$j]->Earn->name}}</th>
                          
                          @php
                          array_push($colName, $pslips[$i]->PayslipsEarnItem[$j]->Earn->name);
                          $earnNameTemp =  array_diff($earnNameTemp, [$pslips[$i]->PayslipsEarnItem[$j]->Earn->name]);
                          @endphp
                        
                        }@endif
                      }@endif
                    }@endif
                  }@endfor
                }@endfor
                <th>Total</th>
              </tr>
        </thead>
        
        <tbody>
           {{--$pslips--}}

          @for ($i=0; $i < sizeof($pslips); $i++) 
          { 
              @if($pslips[$i]->GrossPay!=0)
                {
                  <tr>
                  @if(in_array($pslips[$i]->User->name, $empName))
                    {
                        <td class="verticalSplit"> {{$pslips[$i]->User->name}} </td>
                        @php
                         $empName =  array_diff($empName, [$pslips[$i]->User->name]);
                        @endphp
                    }@endif
            
                    @php
                      if($colName!=null)
                      {
                        $total_size = sizeof($colName);
                      }
                      $jVal=0;
                    @endphp

                    @for ($j=0; $j < sizeof($pslips[$i]->PayslipsEarnItem); $j++) 
                    {
                      @if($pslips[$i]->PayslipsEarnItem[$j]->Earn!=null) 
                      {
                        <td class="verticalSplit">{{$pslips[$i]->PayslipsEarnItem[$j]->Amount}}
                        </td>
                      
                          @php
                          $totalCol1 = $pslips[$i]->PayslipsEarnItem[$j]->Amount;
                          //$total_size = $total_size-1;
                          @endphp 
                        
                      }@endif
                      
                      @php
                      $jVal = $j;
                      @endphp
                    }@endfor
                    
                    @for ($k=$jVal; $k < $total_size-1 ;$k++)
                    {
                      <td class="verticalSplit">{{'-'}}</td>  
                    }@endfor 

                    <td class="verticalSplit">{{$pslips[$i]->NetPay}}</td>
                    @php
                      $totalNetPay += $pslips[$i]->NetPay;
                    @endphp
                  </tr>
              }@endif
          }@endfor

          <tr>
            <td class="verticalSplit">{{''}}</td>
            @for($k=0;$k<sizeof($sumArr);$k++)
            {
              <td>{{$sumArr[$k]}}</td>
            }@endfor
            
            <td>{{$totalNetPay}}</td>
          </tr>          
        </tbody>
     </table>
</div>
 </body>
 </html>