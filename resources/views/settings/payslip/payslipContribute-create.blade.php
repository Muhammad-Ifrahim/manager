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
    </style>

  {!! Form::open(['url' => 'pcontributeitem',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
       <!-- Blade -->
        <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Payslip Contribution Item</h3>
            </div>
            <div class="box-body">
              <div class="bootstrap-iso">
                   <div class="container-fluid">
                    <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">

                    <!-- Form code begins -->
                      <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}} ">
                        {!! Form::label('Name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                            {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                             {!! $errors->first('Name', '<p class="help-block"> Name Required</p>') !!}
                          </div>
                      </div>

                      <div class="form-group">
                        {!! Form::label('Expense Account', 'Expense Account:', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">  
                          <select  name="eAccount" class="form-control">
                            @foreach ($expAccounts as $key => $value)
                             <option value="{{ $value->id}}">{{ $value->title}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                      {!! Form::label('Liability Account', 'Liability Account:', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">  
                          <select  name="lAccount" class="form-control">
                            @foreach ($expAccounts as $key => $value)
                              <option value="{{ $value->id}}">{{ $value->title}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      {{Form::hidden('bId', Session::get('bId'))}}

                      <div class="form-group"> <!-- Submit button -->
                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                      </div>
                         <!-- Form code ends --> 
                     </div>
                   </div>    
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection('content')