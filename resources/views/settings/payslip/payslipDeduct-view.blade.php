    <section class="content" style="width:41%;margin-right: 0">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payslip Deduction Item</h3>

              <a type="button" href="{{url('pdeductitem/create')}}" class="btn btn-block btn-primary" style="float:right;width:35%;">New Payslip Item</a>
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
                @Foreach($pDeductItem as $key => $value)
                    <tr>
                      <td class="col-md-1">{{$value->name}}</td>
                      <td class="col-md-1">{{$value->lAccount}}</td>
                      <td class="col-md-1">
                      <div class="action-region">
                       <a href="{{ URL::to('pdeductitem/' . $value->dId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Payslip Deduction Item"></span>
                       </a>
                       {{ Form::open(array('url' => 'pdeductitem/' . $value->dId, 'class' => 'pull-left')) }}
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