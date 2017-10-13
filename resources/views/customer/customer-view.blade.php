
  @extends('layouts.master')
    @section('content')
     
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer</h3>
              <a type="button" href="{{url('customer/create')}}" class="btn btn-block btn-primary" style="float: right;width: 13%">New Customer</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="col-md-1">Code</th>
                  <th class="col-md-1">Name</th>
                  <th class="col-md-1">Telephone</th>
                  <th class="col-md-1">Email</th>
                  <th class="col-md-1">Qty to Deliver</th>
                  <th class="col-md-1">A/R</th>
                  <th class="col-md-1">Tax No Holding</th>
                  <th class="col-md-1">Available Credit</th>
                  <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
              @Foreach($customers as $key => $value)
                  <tr>
                    <td class="col-md-1">{{$value->Code}}</td>
                    <td class="col-md-1">{{$value->Name}} </td>
                    <td class="col-md-1">{{$value->Telephone}}</td>
                    <td class="col-md-1">{{$value->Email}}</td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1">{{$value->CreditLimit}}</td>
                    <td class="col-md-1">Action</td>

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