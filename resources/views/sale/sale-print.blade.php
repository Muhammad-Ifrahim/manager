<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sale Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body id="printingDiv ">

  <table width="100%">
    <tr>
       <td valign="top"><!-- <img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/> --></td>
        <td align="left">
            <h3 align="center">KOMPANIA SOLUTION</h3>
            <pre align="center">
                Customer :<b> {{$sale->user->Name}}</b>
                Invoice Date : <b>{{$sale->IssueDate}}</b>
                Due Date :     <b>{{$sale->DueDate}}</b>
                
            </pre>

        </td>
    </tr>

  </table>

<!--   <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table> -->
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#Item Code</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Discount</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
     @php($total=0); 
      @Foreach($salesItem as $key=>$value)
          @Foreach($value->saleQuote as $key=>$value) 
             <tr>

             <td scope="row">{{$value->inventoryItem->ItemCode }}</td>
             <td align="">{{$value->inventoryItem->Description}}</td>
             <td align="center">{{$value->Quantity}}</td>
             <td align="center">{{$value->Price}}</td>
             <td align="center">{{$value->Discount}}</td>
             <td align="center">{{$value->Amount}}</td>
               @php($total+=$value->Amount)  
           </tr>
          @endForeach
        @endForeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="4"></td>
            <td align="center">Subtotal $</td>
            <td align="center" class="gray">{{$total}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="center">Tax $</td>
            <td align="center">{{$sale->TaxAmount}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="center">Total $</td>
            <td align="center" class="gray">${{$sale->Amount}}</td>
        </tr>
    </tfoot>
  </table>

</body>

