@extends('layouts.master')

@section('content')

<style type="text/css">

.padClass {
    padding: 50px;
 }

#div1 {
    display: inline-block;
    width: 45%;
}

#div2 {
    display: inline-block;
    width: 45%;
}	
</style>
<div class="padClass">
<nav class="navbar navbar-default" style="max-width:930px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
     <img alt="Reports">
    </a>
  </div>
</nav>

<div id="div1" class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Financial Statements</h3>
  </div>
  <div class="panel-body">
    Panel content
  </div>
</div>

<div id="div2" class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Accounts receivable</h3>
  </div>
  <div class="panel-body">
    Panel content
  </div>
</div>

<br>
<div id="div1" class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Cash Accounts</h3>
  </div>
  <div class="panel-body">
    Panel content
  </div>
</div>

<div id="div2" class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Accounts payable</h3>
  </div>
  <div class="panel-body">
    Panel content
  </div>
</div>

<br>

<div id="div1" class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">General Ledger</h3>
  </div>
    <ul class="list-group">
    <li class="list-group-item"><a href="#">Payslip Earning Summary</a></li>
    <li class="list-group-item"><a href="#">Payslip Deduction Summary</a></li>
    <li class="list-group-item"><a href="#">Payslip Contribution Summary</a></li>
    </ul>
</div>

<div id="div2" class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Payslips</h3>
  </div>

    <ul class="list-group">
    <li class="list-group-item"><a href="{{ url('printSummaryReport')}}">Payslip Summary</a></li>
    <li class="list-group-item"><a href="{{ url('printDeductionReport')}}">Payslip Deduction Summary</a>
    </li>
    <li class="list-group-item"><a href="{{url('printContributeReport')}}">Payslip Contribution Summary</a></li>
    </ul>
  
</div>
@endsection('content')