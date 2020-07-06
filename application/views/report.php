<div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h5>Reports</h5>			
		</div>	
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Report Plant</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Report Section</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Report Shift</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent">
		  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		  	<p></p>
		  	<div class="row">
		  		<div class="col-md-6 col-lg-6">
				  	<?php echo form_open('dashboard/report_plant'); ?>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label">Date Start</label>
					    <div class="col-sm-6">
					      <input type="date" name="dateplant1" required="" class="form-control" id="datestart">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="dateend" class="col-sm-2 col-form-label">Date End</label>
					    <div class="col-sm-6">
					      <input type="date" name="dateplant2" required="" class="form-control" id="dateend">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label">Plant</label>
					    <div class="col-sm-6">
					    	<select name="shiftplant" class="form-control">
					    		<option value="Shift A">Shift A</option>
					    		<option value="Shift B">Shift B</option>
					    		<option value="null">Shift A+B</option>
					    	</select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label"></label>
					    <div class="col-sm-2">
					    	<button type="submit" class="btn btn-primary btn-sm"><span data-feather="download"></span> Export</button>
					    </div>
					  </div>
					<?php echo form_close(); ?>
		  			
		  		</div>
		  	</div>
		  </div>
		  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		  	
		  	<p></p>
		  	<div class="row">
		  		<div class="col-md-6 col-lg-6">
				  	<?php echo form_open('dashboard/report_section'); ?>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label">Date Start</label>
					    <div class="col-sm-6">
					      <input type="date" class="form-control" id="datestart" name="datesection1">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="dateend" class="col-sm-2 col-form-label">Date End</label>
					    <div class="col-sm-6">
					      <input type="date" class="form-control" id="dateend" name="datesection2">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label">Section</label>
					    <div class="col-sm-6">
					    	<select name="section" class="form-control">
		                		<option value="Section A1">Section A1</option>
		                		<option value="Section A2">Section A2</option>
		                		<option value="Section B">Section B</option>
		                		<option value="Section C">Section C</option>
		                		<option value="Section D">Section D</option>
		                		<option value="Section E">Section E</option>
		                	</select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label">Shift</label>
					    <div class="col-sm-6">
					    	<select name="shift" class="form-control">
					    		<option value="Shift A">Shift A</option>
					    		<option value="Shift B">Shift B</option>
					    	</select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label"></label>
					    <div class="col-sm-2">
					    	<button type="submit" class="btn btn-primary btn-sm"><span data-feather="download"></span> Export</button>
					    </div>
					  </div>
					<?php echo form_close(); ?>
		  			
		  		</div>
		  	</div>
		  
		  </div>
		  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
		  	
		  	<p></p>
		  	<div class="row">
		  		<div class="col-md-6 col-lg-6">
				  	<?php echo form_open('dashboard/report_shift', array('target' => '_blank')); ?>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label">Date Start</label>
					    <div class="col-sm-6">
					      <input type="date" name="dateshift1" required="" class="form-control" id="datestart">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="dateend" class="col-sm-2 col-form-label">Date End</label>
					    <div class="col-sm-6">
					      <input type="date" name="dateshift2" required="" class="form-control" id="dateend">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label">Plant</label>
					    <div class="col-sm-6">
					    	<select name="shift1" class="form-control">
					    		<option value="Shift A">Shift A</option>
					    		<option value="Shift B">Shift B</option>
					    	</select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="datestart" class="col-sm-2 col-form-label"></label>
					    <div class="col-sm-2">
					    	<button type="submit" class="btn btn-primary btn-sm"><span data-feather="download"></span> Export</button>
					    </div>
					  </div>
					<?php echo form_close(); ?>
		  			
		  		</div>
		  	</div>
		  
		  </div>
		</div>	
 	</div>
</div>
