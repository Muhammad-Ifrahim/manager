
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
         
         
    </style>     
   
      <div>   
        <h3 class="box-title">Purchase Order</h3>
            <div  >
              <div style="width:400px;height: 100px;float: left" >
                <p>Name <b>{{$purchaseordersale->supplierName->Name}}</b></p>
                <p>Address <b>{{$purchaseordersale->DeliveryAddress}}</b></p>
              </div>
              <div style="width:800px;height: 100px;">
                <b>Issue Date :<p>{{$purchaseordersale->IssueDate}}</p></b>
                <b>Reference  :<p>{{$purchaseordersale->DeliveryDate}}</p></b>                
              </div>
            
            </div> 

        
              
            </div>
            
            <!-- /.box-header  -->
  <div style="margin-top: 50px;border: 1px solid black;">
     <table style=" width: 100%">
        <thead>
              <tr>
                <th>Code</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Unit price</th>
                <th>Discount</th>
                <th>Amount</th>
              </tr>
        </thead>
        <tbody>
          @Foreach($purchaseorder as $key=>$value)
          @Foreach($value->purchaseSale as $key=>$value) 
             <tr>
             
             <td class="verticalSplit" >{{$value->inventoryItem->ItemCode }}</td>
             <td class="verticalSplit" >{{$value->inventoryItem->Description}}</td>
             <td class="verticalSplit" >{{$value->Quantity}}</td>
             <td class="verticalSplit" >{{$value->SalePrice}}</td>
             <td class="verticalSplit" >{{$value->Discount}}</td>
             <td class="verticalSplit" >{{$value->Amount}}</td>
            
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
       
          </tr>
              <tr>
             <td class="lastRow" ></td>
             <td class="lastRow" ></td>

             <td class="lastRow" ></td>
             <td class="lastRow" ></td>
             <td style="width: 19%;font-weight:bold"  >Total</td>
             <td style="width: 17.6%;font-weight:bold" >{{$purchaseordersale->Amount}}</td>
           </tr>
                
        </tbody>
        <tbody>      
              
        </tbody>     
     </table>
</div>
<div>
  
</div>
          
 </body>
 </html>
