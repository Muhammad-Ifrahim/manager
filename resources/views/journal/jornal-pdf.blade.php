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
      <h3 class="box-title">Journal Entry</h3>
      <div >
        <div style="width:400px;height: 100px;float: left" >
        </div>
        <div style="width:800px;height: 100px;">
          <b>Issue Date :<p>{{$Journal->Date}}</p></b>
          <b>Reference  :<p>{{$Journal->id}}</p></b>
        </div>
      </div>
    </div>
    <!-- /.box-header  -->
    <div style="margin-top: 10px;border: 1px solid black;">
      <table style=" width: 100%">
        <thead>
          <tr>
            <th>Account</th>
            <th>Debit</th>
            <th>Credit</th>
          </tr>
        </thead>
        <tbody>
          @Foreach($JournalEntry as $key=>$value)
          @Foreach($value->JournalEntries as $key=>$value)
          <tr>
            <td class="verticalSplit"" >{{$value->Accounts->AccountName}}</td>
            <td class="verticalSplit" >{{$value->Debit}}</td>
            <td class="verticalSplit" >{{$value->Credit}}</td>
          </tr>
          @endForeach
          @endForeach
        </tbody>
      </table>
    </div>
  </body>
</html>