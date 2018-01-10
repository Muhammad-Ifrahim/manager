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

    <script>

      function ConfirmDelete()
      {
      var x = confirm("Are you sure you want to delete?");
      if (x)
        return true;
      else
        return false;
      }

    </script>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payslip Contribution Summary</h3>

              <a type="button" href="{{url('EarnReport/sum/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Report</a>
            </div>
            
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">From</th>
                  <th class="col-md-1">To</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">Last Modified</th>
                  <th class="col-md-1">Action</th>                 
                </tr>
                </thead>
                <tbody>
                @Foreach($earnRep as $key => $value)
                @if($value->payType=='Earn')
                    <tr>
                      <td class="col-md-1">{{$value->from}}</td>
                      <td class="col-md-1">{{$value->to}}</td>
                      <td class="col-md-1">{{$value->description}} </td>
                      <td class="col-md-1">{{$value->updated_at}}</td>
                      <td class="col-md-1">
                      <div class="action-region">
                       <a href="{{ URL::to('EarnReport/' . $value->id . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Report"></span>
                       </a>

                       <a href="{{ url('/EarnReport/printReport') }}">
                        <span class="fa fa-print" data-toggle="tooltip" data-original-title="Print Report"></span>
                       </a>

                       {{ Form::open(array('url' => 'EarnReport/' . $value->id, 'class' => 'pull-left', 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Report"></span>', array( 'type'=>'submit')) }}
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