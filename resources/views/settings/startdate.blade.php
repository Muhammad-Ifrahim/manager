
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
 
       <!-- Blade -->
        <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Start Date</h3>
            </div>
            <div class="box-body">
              <div class="bootstrap-iso">
                   <div class="container-fluid">
                    <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">

                      <!-- Form code begins -->
                        <div class="form-group"> <!-- Date input -->
                          <label class="control-label" for="date">Date</label>
                          <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                        </div>
                        <div class="form-group"> <!-- Submit button -->
                          <button class="btn btn-primary " name="submit" type="submit">Submit</button>
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
    
       <!-- Try to put Script at the End -->
       <script>
      $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
          format: 'mm/dd/yyyy',
          container: container,
          todayHighlight: true,
          autoclose: true,
        };
        date_input.datepicker(options);
      })
    </script>

        
       
    @endsection('content')