@extends('layouts.master')

@section('content')
  <style type="text/css">
  	.form-group {
    	margin-bottom: 35px;
    	width: 65%;
    	margin-left: 17%;
    	margin-top: 10px;
      }
    .form-horizontal{
   		margin-left:4px;
    }
    .btn-info,.btn-success{
     	margin-left: 2%;
     	width: 16%;
    }
    .box-footer{
    	margin-left: 10%;
    }
  </style>
  
  <section class="content">
   <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>
            </div>
            <!-- form start -->
            <!-- method="POST" action="{{url('customer/createRecord')}} -->

            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="Name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Code</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Code" placeholder="Code">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Buisness Identifier</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="BuisnessIdentifier" placeholder="Identifier">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Email" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Telephone</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Telephone" placeholder="Telephone">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Mobile" placeholder="Mobile">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Additional Information</label>
                  <div class="col-sm-10">
                    <input type="textarea" class="form-control" placeholder="Additional Information">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Code" class="col-sm-2 control-label">Credit Limit</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="optional">
                  </div>
                </div>
              </div>
              <div class="box-footer">
              
                <a href="{{url('customer/store')}}" type="submit" class="btn btn-success">Create</a>
                <a href="{{url('customer/createAnother')}}" type="submit" class="btn btn-info ">Create & Add Another </a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
   </div>
  </section>
@endSection('content')