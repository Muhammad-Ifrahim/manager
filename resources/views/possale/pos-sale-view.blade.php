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
              <h3 class="box-title">Sale InProgess</h3>
              <a type="button" href="{{url('pos')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">POS</a>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Id</th>
                  <!-- <th class="col-md-1">Customer</th> -->
                  <th class="col-md-1">Number of Items</th>
                  <th class="col-md-1">Tax</th>
                  <th class="col-md-1">Discount</th>
                  <th class="col-md-1">Status</th>
                  <th class="col-md-1">Total</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($posSale as $key => $value)
                  @if($value->Status!="Completed")
                  <tr>
                    <td class="col-md-1">{{$value->posSaleId}}</td>
                    <td class="col-md-1">{{$value->Items}} </td>
                    <td class="col-md-1">{{$value->account->Tax}}</td>
                    <td class="col-md-1">{{$value->Discount}}</td>
                    <td class="col-md-1">{{$value->Status}}</td>
                    <td class="col-md-1">{{number_format($value->Total,2)}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('inProgress/' . $value->posSaleId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Sale"></span>
                       </a>
                       
                       {{ Form::open(array('url' => 'inProgress/' . $value->posSaleId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Sale"></span>', array( 'type'=>'submit')) }}
                        {{ Form::close() }} 

                      </div>

                    </td>

                  </tr> 
                 @endif 
               @endForeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    

      

    @endsection('content')