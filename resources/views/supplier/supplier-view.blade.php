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
         
          .action-region span{
            font-size: 20px;        
            text-decoration: none;
            margin: 0 10px;
         } 
    </style>     
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Supplier</h3>
              <a type="button" href="{{url('supplier/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Supplier</a>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Code</th>
                  <th class="col-md-1">Name</th>
                  <th class="col-md-1">Telephone</th>
                  <th class="col-md-1">Email</th>
                  <th class="col-md-1">Accounts Payable</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($supplier as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->Code}}</td>
                    <td class="col-md-1">{{$value->Name}} </td>
                    <td class="col-md-1">{{$value->Telephone}}</td>
                    <td class="col-md-1">{{$value->Email}}</td>
                    <td class="col-md-1">{{$value->CreditLimit}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('supplier/' . $value->supId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Supplier"></span>
                       </a>
                       
                       {{ Form::open(array('url' => 'supplier/' . $value->supId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Supplier"></span>', array( 'type'=>'submit')) }}
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
    

      

    @endsection('content')