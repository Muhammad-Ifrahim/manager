@extends('layouts.master') @section('content')
<style type="text/css">
.box-header .box-title {
display: inline-block;
font-size: 23px;
margin: 3px;
line-height: 1;
color: rgba(76, 175, 80, 0.87);
}
.form-control{
height: 30px;
}
.form-group {
margin-bottom: 35px;
width: 65%;
margin-left: 17%;
margin-top: 10px;
}
.form-horizontal{
margin-left:4px;
}
.btn-info, .btn-success {
padding-top: 6px;
height: 41px;
margin-left: 25%;
width: 25%;
float: left;
}
.box-footer{
margin-left: 10%;
}
button{
padding: 0;
border: none;
background: none;
}
.action-region span{
font-size: 20px;
text-decoration: none;
margin: 0 10px;
}
</style>
<section class="content">
  <div id="cashentry">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Cash Account</h3>
            <a type="button" href="{{url('cash/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Cash Account</a>
          </div>
          <!-- /.box-header  -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="col-md-1">Code</th>
                  <th class="col-md-2">Name</th>
                  <th class="col-md-1">Balance</th>
                  <th class="col-md-1">Action</th>
                </tr>
              </thead>
              <tbody>@Foreach($CashAccount as $key => $value)
                <tr>
                  <td class="col-md-1">{{$value->Code}}</td>
                  <td class="col-md-2">{{$value->Name}}</td>
                  <td class="col-md-1">{{$value->Amount}}</td>
                  <td class="col-md-1">
                    <div class="action-region">
                      <a href="{{ URL::to('cash/' . $value->id . '/edit') }}"> <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Cash Account"></span>
                      </a>{{ Form::open(array('url' => 'cash/' . $value->id, 'class' => 'pull-left')) }} {{ Form::hidden('_method', 'DELETE') }} {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Cash Account"></span>', array( 'type'=>'submit')) }} {{ Form::close() }}
                    </td>
                  </tr>@endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>@endSection('content')