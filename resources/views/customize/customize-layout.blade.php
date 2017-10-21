@extends('layouts.master')
@section('content')
  <style type="text/css">
  	.sidebar-customize{

    font-size: 18px;
    border: 2px solid lightblue;
    height: 44px;
    margin-top: 2px;
    margin-left: 25px;
    padding-top: 6px;
    list-style-position: inherit;
  	}
  	li{
  		list-style: none
  	}
  	input[type=checkbox], input[type=radio] {
    margin: 7px 0 0;
    margin-top: 1px\9;
    line-height: normal;
    margin-right: 80px;
    margin-left: 10px;
   
   }
  </style>
  <section class="section">
  <div class="row">
  	<div class="col-md-12">
  		<div class="box">
  			<div class="box-header">
               <h2 class="box-title"> Customize Dashboard</h2>
            </div>
  			<div class="box-body">
  			 
  				<div class="col-md-4 sidebar-customize">
  					<ul>
  						<li>
				          <a>
				          	<input type="checkbox" id="FixedAsset" name="FixedAsset" >
				            <i></i> <span>Fixed Asset</span>
				            <span class="pull-right-container">
                              <small class="label pull-right bg-green">0</small>
                            </span>
				          </a>
				        </li>
  					</ul>
  				</div>

  			</div>
  		</div>
  	
  	</div>
   </div>
 </section>
@endSection('content')
