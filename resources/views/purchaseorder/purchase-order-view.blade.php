
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
              <h3 class="box-title">Purchase Order</h3>
              <a type="button" href="{{url('purchaseorder/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Purchase Order</a>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Date</th>
                  <th class="col-md-1">Id</th>
                  <th class="col-md-3">Supplier</th>
                  <th class="col-md-3">Delivery Address</th>
                  <th class="col-md-1">Amount</th>
                  <th class="col-md-2">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($purchaseordersale as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->IssueDate}}</td>
                    <td class="col-md-1">{{$value->id}}</td>
                    <td class="col-md-3">{{$value->supplierName->Name}}</td>
                    <td class="col-md-3">{{$value->DeliveryAddress}}</td>
                    <td class="col-md-1">{{number_format($value->Amount,2)}}</td>
                    <td class="col-md-2">
                     <div class="action-region">
                       <a href="{{ URL::to('purchaseorder/' . $value->id . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit proforma"></span>
                       </a>
                       
                       {{ Form::open(array('url' => 'purchaseorder/' . $value->id, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete proforma"></span>', array( 'type'=>'submit')) }}
                        {{ Form::close() }} 

                        <a href="{{ url('/purchaseorder/' . $value->id . '/print') }}">
                        <span class="fa fa-print" data-toggle="tooltip" data-original-title="Print Report"></span>
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
      </div>
    </section>
    

      

    @endsection('content')