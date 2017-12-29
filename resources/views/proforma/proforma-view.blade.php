
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
              <h3 class="box-title">Proforma</h3>
              <a type="button" href="{{url('proforma/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Proframa</a>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Date</th>
                  <th class="col-md-1">Id</th>
                  <th class="col-md-4">Customer</th>
                  <th class="col-md-1">Amount</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($sale as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->Date}}</td>
                    <td class="col-md-1">{{$value->SaleId}}</td>
                    <td class="col-md-4">{{$value->user->Name}} </td>
                    <td class="col-md-1">{{number_format($value->Amount,2)}}</td>
                    <td class="col-md-1">
                     <div class="action-region">
                       <a href="{{ URL::to('proforma/' . $value->SaleId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit proforma"></span>
                       </a>
                       
                       {{ Form::open(array('url' => 'proforma/' . $value->SaleId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete proforma"></span>', array( 'type'=>'submit')) }}
                        {{ Form::close() }} 

                        <a href="{{ url('/proformaPrint/' . $value->SaleId . '/print') }}">
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