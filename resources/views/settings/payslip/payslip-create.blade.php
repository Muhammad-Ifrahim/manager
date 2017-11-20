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

    <script type="text/javascript">
    $(document).ready(function() {
    $('.selectpicker').selectpicker();
});
    
    </script>

  {!! Form::open(['url' => 'payslip',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
       <!-- Blade -->
        <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Payslip</h3>
            </div>
            <div class="box-body">
              <div class="bootstrap-iso">
                   <div class="container-fluid">
                    <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">

                    <!-- Form code begins -->
                     <div class="form-group"> <!-- Date input -->
                      <div class="col-lg-4 col-lg-offset-0.5">
                       
                            {!! Form::label('Date', 'Date') !!}
                       
                        <input class="form-control" id="pdate" name="pdate" placeholder="MM/DD/YYY" type="text">
                        </div>
                      </div>

                    <div class="form-group"> <!-- Date input -->
                      <div class="col-lg-4 col-lg-offset-0.5"> 
                      {!! Form::label('Employee', 'Employee') !!}
                       <select class="selectpicker" data-live-search="true">
                          <option>Not Working</option>
                          <option>Burger, Shake and a Smile</option>
                          <option>Sugar, Spice and all things nice</option>
                        </select>
                      </div>
                    </div> 

                    
                      <div class="form-group" id="item">
                       <div class="col-lg-12 col-lg-offset-2"> 

                        <div class="col-lg-2">
                        {!!Form::label('Earnings','Earnings',['class' => 'col-lg-2 control-label head-item' ]) !!}
                         <select  class="form-control-heading" id="item">
                             <option value="Select">Select</option>
                             @foreach ($inventory as $key => $value)
                          <option value="{{ $value->inventId}}">{{$value->inventId}}-{{ $value->ItemName}}</option>
                             @endforeach
                        </select>
                        </div>


                        <div class="col-lg-4">
                        {!!Form::label('Description','Description:',['class' => 'col-lg-2 control-label head-item' ]) !!}
                        {!! Form::text('Description', $value=null,
                        [ 'id' => 'Description','class' => 'form-control-heading','placeholder' => 'Item Description','readonly' ])!!}
                          
                          </div> 

                         <div class="col-lg-2">
                        {!!Form::label('Qty','Qty',['class' => 'col-lg-2 control-label head-item' ]) !!}
                        {!! Form::text('Qty', $value=null, 
                        [ 'id' => 'Qty','class' => 'form-control-heading','placeholder' => 'Qty'])!!}
                          
                          </div>  

                        <div class="col-lg-2">
                          {!!Form::label('Rate','Rate',['class' => 'col-lg-2 control-label head-item' ]) !!}

                          {!! Form::text('rate', $value=null, 
                          ['id' => 'SalePrice','class' => 'form-control-heading','placeholder' => 'Unit Price','readonly'])!!}  
                        </div>  
                         
                        <div class="col-lg-2">
                          {!!Form::label('Total','Total',['class' => 'col-lg-1 control-label head-item' ]) !!}
                          {!! Form::text('', $value=null, [ 'id' => 'Amount','class' => 'form-control-heading','placeholder' => 'Amount', 'readonly'])!!}
                        </div> 
                      </div>
  
                      <div class="col-lg-12 col-sm-offset-10">
                        {!!Form::label('GrossPay','GrossPay',['class' => 'col-lg-2 control-label head-item' ]) !!}
                          {!! Form::text('', $value=null, [ 'id' => 'grossPay','class' => 'form-control-heading','placeholder' => 'grossPay', 'readonly'])!!}
                      </div>
  
                      <div class="col-lg-12 col-sm-offset-4">
                        
                           <div style="margin-top: 10px">
                                {!! Form::button('Add Row', ['id' => 'addRow','class' =>'btn btn-info float:right' ] ) !!}
                           </div>
                      </div>
                      </div>

                      <div class="form-group">
                        {!! Form::label('Notes', 'Notes', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                            {!! Form::text('notes', $value = null, ['class' => 'form-control', 'placeholder' => '']) !!}
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

    <script>
      $(document).ready(function(){
        var date_input=$('input[name="pdate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
          format: 'yyyy/mm/dd',
          container: container,
          todayHighlight: true,
          autoclose: true,
        };
        date_input.datepicker(options);
      })
    </script>
    @endsection('content')