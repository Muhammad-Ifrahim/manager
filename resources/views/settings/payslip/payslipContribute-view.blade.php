    <section class="content" style="width:46%;margin-left: 0">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payslip Contribution Items</h3>

              <a type="button" href="{{url('pcontributeitem/create')}}" class="btn btn-block btn-primary" style="float:right;width:30%;">New Payslip Item</a>
            </div> 
            
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1" >Name</th>
                  <th class="col-md-1">Expense Account</th> 
                  <th class="col-md-1">Liablility Account</th> 
                  <th class="col-md-1" >Actions</th>              
                </tr>
                </thead>
                <tbody>
                @Foreach($pContributItem as $key => $value)
                    <tr>
                      <td class="col-md-1">{{$value->name}}</td>
                      <td class="col-md-1">{{$value->eAccount}}</td>
                      <td class="col-md-1">{{$value->lAccount}}</td>
                      <td class="col-md-1">
                      <div class="action-region">
                       <a href="{{ URL::to('pcontributeitem/' . $value->cId . '/edit') }}">
                        <span class="fa fa-pencil-square-o" data-toggle="tooltip" data-original-title="Edit Payslip Earning Item"></span>
                       </a>
                       {{ Form::open(array('url' => 'pcontributeitem/' . $value->cId, 'class' => 'pull-left')) }}
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