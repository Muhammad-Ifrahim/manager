
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
              <h3 class="box-title">Inventory</h3>
              <a type="button" href="{{url('Inventory/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Inventory Item</a>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Item Code</th>
                  <th class="col-md-1">Item Name</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Purchase Price</th>
                  <th class="col-md-1">Sale Price</th>
                  <th class="col-md-1">Qty on Hand</th>
                  <th class="col-md-1">Average Cost</th>
                  <th class="col-md-1">Total Cost</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($inventory as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->ItemCode}}</td>
                    <td class="col-md-1">{{$value->ItemName}} </td>
                    <td class="col-md-1">{{$value->UnitName}}</td>
                    <td class="col-md-1">{{$value->PurchasePrice}}</td>
                    <td class="col-md-1">{{$value->SalePrice}}</td>
                    <td class="col-md-1">{{$value->QtyOnHand}}</td>
                    <td class="col-md-1">{{$value->AverageCost}}</td>
                    <td class="col-md-1">{{$value->ValueOnHand}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('Inventory/' . $value->inventId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Item"></span>
                       </a>
                       
                       {{ Form::open(array('url' => 'Inventory/' . $value->inventId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Item"></span>', array( 'type'=>'submit')) }}
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