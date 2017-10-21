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
          .action-region a{
            font-size: 22px;        
            text-decoration: none;
            margin: 0 10px;
         }
         .box{
         	margin-left: 10px;
         	width: 98%;
         } 
  </style>
  <section class="content">
  	 <div class="row">

  	 	<div class="box">
            <div class="box-header">
               <h2 class="box-title">Fixed Assest</h2>
                 <a type="button" href="{{url('fixedasset/create')}}" class="btn btn-block btn-success" style="float: right;width: 13%">New Fixed Assest</a>
            </div>

            <div class="box-body">
          
                  <table id="example1" class="table table-bordered table-striped">
                  	<thead>
                    <tr>
                  		<th class="col-md-1">Code</th>
                  		<th class="col-md-1">Name</th>
                  		<th class="col-md-1">Description</th>
                  		<th class="col-md-1">Purchase Cost</th>
                  		<th class="col-md-1">Accumulated Description</th>
                  		<th class="col-md-1">Book Value</th>
                  		<th class="col-md-1">Action</th>
                    </tr>
                  	</thead>
                  
                  	<tbody>
                     @Foreach($fixedasset as $key => $value)    
                      <tr>
                      <td class="col-md-1">{{$value->Code}}</td>
                  		<td class="col-md-1">{{$value->Name}}</td>
                  		<td class="col-md-1">{{$value->Description}}</td>
                  		<td class="col-md-1">{{$value->PurchaseCose}}</td>
                  		<td class="col-md-1">{{$value->AccumulatedDepreciation}}</td>
                  		<td class="col-md-1">{{$value->BookValue}}</td>
                  		<td class="col-md-1">
                          <div class="action-region">
                            <a href="{{ URL::to('fixedasset/' . $value->fixId . '/edit') }}">
                               <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Assest"></span>
                            </a>
                          </div>
                      </td> 
                    </tr>
                   @endForeach		
                  	</tbody>
                  </table>
            	
            </div>
  	 	  </div>
  	 </div>
  </section>

@endSection('content')