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
    <h1 class="box-title">Delivery Note</h1>
    <div style="width: 100%">
      <div>
        <div>
          <p>Name <b>{{$deliverySale[0]->user->Name}}</b></p>
          <p>Address <b>{{$deliverySale[0]->user->BillingAddress}}</b></p>
          <p>Delivery Date: <b>{{$deliverySale[0]->IssueDate}}</b></p>
          <p>Reference : <b>{{$deliverySale[0]->Reference}}</b></p>
          <p>Order Number :<b>{{$deliverySale[0]->OrderNumber}}</b></p>
          <p>Invoice Number :<b>{{$deliverySale[0]->InvoiceNumber}}</b></p>
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
          </tr>
        </thead>
        <tbody>
          @Foreach($deliverySale as $key=>$value)
          @Foreach($value->saleDelivery as $key=>$value)
          <tr>
            <td class="verticalSplit" >{{$value->inventoryItem->ItemCode }}</td>
            <td class="verticalSplit" >{{$value->inventoryItem->Description}}</td>
            <td class="verticalSplit" >{{$value->Quantity}}</td>
          </tr>
          @endForeach
          @endForeach
        </tbody>
      </table>
    </div>
  </body>
</html>