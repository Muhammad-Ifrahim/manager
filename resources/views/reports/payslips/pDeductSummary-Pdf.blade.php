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
    <h1 class="box-title" style="text-align:center !important;">Payslip Deduction Summary</h1>
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
                $deductNameTemp = $earnName;
                $totalNetPay = 0;
                $totalPCol = array();
                $colName = array();
                $allItem = '';
                $itemKeys = array_keys($dedArr);
                @endphp

                @for ($i=0; $i < sizeof($itemKeys); $i++) 
                {  
                  <td>{{$itemKeys[$i]}}</td>
                  @php
                    $allItem .= $itemKeys[$i].',';
                   @endphp
                }@endfor
                <th>Total</th>
              </tr>
        </thead>
        
        <tbody>
           {{--$pslips--}}
          @php
          $employNAme = array_keys($tempArr);
          @endphp

          @for ($m=0; $m < sizeof($employNAme); $m++) 
          {
            <tr>
            <td class="verticalSplit"> {{$employNAme[$m]}} </td>

              @php
                $itmArr = $tempArr[$employNAme[$m]];
                $itmKeys = array_keys($itmArr);
                $itemAll='';

                for($o=0;$o<sizeof($itmKeys);$o++)
                {
                  $itemAll .= $itmKeys[$o].',';                  
                }
              @endphp

              @for($k=0;$k<sizeof($itemKeys);$k++)
              {
                
                @if(strpos($itemAll, $itemKeys[$k]) !== false)
                {
                  @php
                  $ar = $itmArr[$itemKeys[$k]];
                  @endphp
                  <td class="verticalSplit">{{$ar[0]}}</td>
                }
                @else
                {
                  <td class="verticalSplit">-</td>
                }
                @endif

              }@endfor
              
              <td class="verticalSplit">{{$sumRowArr[$m]}}</td>

            </tr>
          
          }@endfor

          <tr>
            <td class="verticalSplit">{{''}}</td>
            @php
            $cKeys = array_keys($colSum);
            @endphp
            @for($k=0;$k<sizeof($cKeys);$k++)
            {
              <td>{{ $colSum[$cKeys[$k]] }}</td>
            }@endfor
            <td>{{ $totalSumRow }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>