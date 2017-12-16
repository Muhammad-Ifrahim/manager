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
  <div style="margin-top: 50px;border: 1px solid black;">
<table style=" width: 100%" table table-striped pagin-table table-bordered>
        <thead>
              <tr>
                <th>Employee</th>
                @Foreach($pslips[0]->pearnitems as $key=>$value)
                @if($value->eId==$pslips[0]->eId)
                {
                  <th>{{$value->name}}</th>
                }
                @endif
                @endForeach
                <th>Total</th>
              </tr>
        </thead>
        {{$pslips}}
        <tbody>
          @Foreach($pslips[0]->employees as $key=>$value)
             <tr>
             <td class="verticalSplit">{{$value->name}}</td>
          @endForeach

          @Foreach($pslips as $key => $value)
           <td class="verticalSplit">{{$value->earn_total}}</td>
          @endForeach

          @Foreach($pslips as $key => $value)
           <td class="verticalSplit">{{$value->earn_total}}</td>
          @endForeach
           </tr>
          <hr>
        </tbody>
        <tbody>      
              
        </tbody>     
     </table>
</div>
  <div >
     <table style=" width: 100%">
       
        <tbody>
       
           <tr>
             <td class="lastRow" ></td>
             <td class="lastRow" ></td>

             <td class="lastRow" ></td>
             <td class="lastRow" ></td>
             <td style="width: 18.8%" class="hide_all">Subtotal</td>
             <td style="width: 17.8%" >{{$sale[0]->Amount}}</td>
           </tr>
              
            <tr>
             <td class="lastRow" ></td>
             <td class="lastRow" ></td>

             <td class="lastRow" ></td>
             <td class="lastRow" ></td>
             <td style="width: 18.4%" class="hide_all">Rounding</td>
             <td style="width: 17.8%" ></td>
            </tr>
           
              <tr>
             <td class="lastRow" ></td>
             <td class="lastRow" ></td>

             <td class="lastRow" ></td>
             <td class="lastRow" ></td>
             <td style="width: 18.4%;font-weight:bold" class="hide_all">Total</td>
             <td style="width: 17.8%;font-weight:bold">{{$sale[0]->Amount}}</td>
           </tr>
                
        </tbody>
        <tbody>      
              
        </tbody>     
     </table>
</div>
 </body>
 </html>