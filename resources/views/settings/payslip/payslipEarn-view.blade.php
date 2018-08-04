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
    .container {
      width: 40%;
      margin-left:0;
    }
    </style>     

    <section class="content" style="width: 39%;margin-left: 0">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payslip Earning Items</h3>

              <a type="button" href="{{url('pearnitem/create')}}" class="btn btn-block btn-primary" style="float:right;width: 35%;">New Payslip Item</a>
            </div> 
            
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1" >Name</th>
                  <th class="col-md-1">Account</th> 
                  <th class="col-md-1" >Actions</th>              
                </tr>
                </thead>
                <tbody>
                @Foreach($pEarnItem as $key => $value)
                    <tr>
                      <td class="col-md-1">{{$value->name}}</td>
                      <td class="col-md-1">{{$value->eAccount}}</td>
                      <td class="col-md-1">
                      <div class="action-region">
                       <a href="{{ URL::to('pearnitem/' . $value->eId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Payslip Earning Item"></span>
                       </a>
                       {{ Form::open(array('url' => 'pearnitem/' . $value->eId, 'class' => 'pull-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<span class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Payslip Earning Item"></span>', array( 'type'=>'submit')) }}
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
    
    <div>
     @include('settings.payslip.payslipContribute-view') 
    </div>

    <div>
     @include('settings.payslip.payslipDeduct-view') 
    </div>
    @endsection('content')