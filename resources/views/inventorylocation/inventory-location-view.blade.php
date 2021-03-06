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
.action-region{
margin: 0px;
}
.action-region span{
font-size: 20px;
text-decoration: none;
margin: 0 10px;
}
.box{
  margin-left: 10px;
  width: 98%;
}
button{
padding: 0;
border: none;
background: none;
}
.pull-left{
margin-right: 10px;
}
</style>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h2 class="box-title">Inventory Location</h2>
          <a type="button" href="{{url('InventoryLocation/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Inventory Location</a>
        </div>
        <div class="box-body">
          <!--  -->
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="col-md-8">Name</th>
                <th class="col-md-2">Action</th>
              </tr>
            </thead>
            
            <tbody>
              @Foreach($InventoryLocation as $key => $value)
              <tr>
                <td class="col-md-8">{{$value->Name}}</td>
                <td class="col-md-2">
                  <div class="action-region">
                    <a href="{{ URL::to('InventoryLocation/' . $value->id . '/edit') }}">
                      <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Location"></span>
                    </a>
                    {{ Form::open(array('url' => 'InventoryLocation/' . $value->id, 'class' => 'pull-left')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Location"></span>', array( 'type'=>'submit')) }}
                    {{ Form::close() }}
                  </div>
                </td>
              </tr>
              @endForeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endSection('content')