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
    <h1 class="box-title" style="text-align:center !important;">Payslip Summary</h1>
    <h3 class="box-align2">For the period from {{$pslipRep[0]->from}} to {{$pslipRep[0]->to}}
    </h3>
            <!-- /.box-header  -->
  <div style="margin-top: 50px; border:1px solid black;">
    <table style=" width: 100%" table table-striped pagin-table table-bordered>
  {{-- I have added php tags to use php code in order to display Payslip Deduction item names uniquely --}}
        <thead>
              <tr>
                <th>Employee</th>
                {{-- Get All PayslipContribution Items --}}
                <th>Gross Pay</th>
                <th>Total Deductions</th>
                <th>Net pay </th>
                <th>Total Contributions</th>
              </tr>
        </thead>
        
        <tbody>
           {{--$pslips--}}
          @php
          $employName = array_keys($tempArr);
          $sumVal1 = 0;
          $sumVal2 = 0;
          $sumVal3 = 0;
          $sumVal4 = 0;
          @endphp
        @for($i=0;$i<sizeof($tempArr);$i++)
          {
            <tr>
            <td class="verticalSplit">{{$employName[$i]}}</td>
            @php
              $vals = $tempArr[$employName[$i]];
              $sumVal1 += $vals[0];
              $sumVal2 += $vals[1];
              $sumVal3 += $vals[2];
              $sumVal4 += $rowSum[$i];
            @endphp

            <td  class="verticalSplit">{{$vals[0]}}</td>
            <td  class="verticalSplit">{{$vals[1]}}</td>
            <td  class="verticalSplit">{{$vals[2]}}</td>
            <td  class="verticalSplit">{{$rowSum[$i]}}</td>
            </tr>
          }@endfor
          <tr>
            <td class="verticalSplit">{{''}}</td>
            <td>{{$sumVal1}}</td>
            <td>{{$sumVal2}}</td>
            <td>{{$sumVal3}}</td>
            <td>{{$sumVal4}}</td>
          </tr>
         
        </tbody>
      </table>
    </div>
  </body>
</html>