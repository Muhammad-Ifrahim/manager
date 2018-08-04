@extends('layouts.master')
@section('content')
<style type="text/css">
.box-header .box-title {
display: inline-block;
font-size: 23px;
margin: 3px;
line-height: 1;
color: rgba(76, 175, 80, 0.87);
}
button{
padding: 0;
border: none;
background: none;
}
.pull-left{
margin-right: 10px;
}
.action-region span{
font-size: 20px;
text-decoration: none;
margin: 0 10px;
}
</style>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Page is not Available</h3>
        </div>
        
        <div class="box-body">
          Sorry for inconvenience.<br/><br/>
          <b>The page you are looking for is not developed yet</b>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection('content')