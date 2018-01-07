 <!DOCTYPE html>
 <html>
 <head>     
     <title>Report</title>
 </head>
 <body>
      <style type="text/css">
       .box-title {
          display: inline-block;
          font-size: 30px;
          font-weight:bold
          line-height: 1;
          color: rgba(76, 175, 80, 0.87);
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
      text-align: left;
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

    <h1 class="box-title">Payslip</h1>
            <div  >
              <div style="width:400px;height: 100px;float: left" >
                <p>Name <b>{{$payslip->User->name}}</b></p>
              </div>
              <div style="width:800px;height: 100px;">
                <b>Issue Date :<p>{{$payslip->Date}}</p></b>
              </div>            
            </div> 
     </div>
            <!-- /.box-header  -->
  <div style="margin-top: 30px;border: 1px solid black;">
<table style=" width: 100%" table table-striped pagin-table table-bordered>
        <thead>
              <tr>
                <th>Description</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Total</th>
              </tr>
        </thead>
        <tbody>
          @Foreach($PayslipsEarn as $key=>$value)
          @Foreach($value->PayslipsEarnItem as $key=>$value) 
             <tr>
             <td class="verticalSplit">{{$value->Earn->name}}</td>
             <td class="verticalSplit">{{$value->Quantity}}</td>
             <td class="verticalSplit">{{$value->Price}}</td>
             <td class="verticalSplit">{{$value->Amount}}</td>
           </tr>
          @endForeach
          @endForeach 
      
                
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
             <td style="width: 18.8%" class="hide_all">Gross Pay</td>
             <td style="width: 22.3%" >{{$payslip->GrossPay}}</td>
           </tr>
              
            <tr>
             <td class="lastRow" ></td>
             <td class="lastRow" ></td>

             <td class="lastRow" ></td>
             <td class="lastRow" ></td>
             <td style="width: 18.4%" class="hide_all">Deduction</td>
             <td style="width: 22.3%" >{{$payslip->Deduction}}</td>
            </tr>

            <tr>
             <td class="lastRow" ></td>
             <td class="lastRow" ></td>

             <td class="lastRow" ></td>
             <td class="lastRow" ></td>
             <td style="width: 18.4%" class="hide_all">Net Pay</td>
             <td style="width: 22.3%" >{{$payslip->NetPay}}</td>
            </tr>
           
              <tr>
             <td class="lastRow" ></td>
             <td class="lastRow" ></td>

             <td class="lastRow" ></td>
             <td class="lastRow" ></td>
             <td style="width: 18.4%;font-weight:bold" class="hide_all">Contribution</td>
             <td style="width: 22.3%;font-weight:bold">{{$payslip->Contribution}}</td>
           </tr>
                
        </tbody>
        <tbody>      
              
        </tbody>     
     </table>
</div>
 </body>
 </html>
