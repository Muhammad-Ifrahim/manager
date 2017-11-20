
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
              <h3 class="box-title">DELIVERY NOTES</h3>
              <a type="button" href="{{url('deliverynote/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Delivery</a>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Date</th>
                  <th class="col-md-1">Order No</th>
                  <th class="col-md-1">Invoice Number</th>
                  <th class="col-md-3">Customer</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($deliverySale as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->DeliveryDate}}</td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1">{{$value->Reference}}</td>
                    <td class="col-md-3">{{$value->user->Name}}</td>
                    <td class="col-md-1">{{$value->Description}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('deliverynote/' . $value->id . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit proforma"></span>
                       </a>
                       
                       {{ Form::open(array('url' => 'deliverynote/' . $value->id, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete proforma"></span>', array( 'type'=>'submit')) }}
                        {{ Form::close() }} 

                        <a href="{{ url('/deliverynote/' . $value->id . '/print') }}">
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