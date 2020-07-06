
<div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h5>Input Data</h5>			
			<a href="<?php echo base_url('dashboard/input') ?>" class="btn btn-warning btn-sm text-white"><span data-feather="chevron-left"></span>Back</a>
		</div>
		Date : <?php echo date('d M', strtotime($this->uri->segment(3))); ?><p></p>
		<div class="table-responsive">			
			<table class="table table-bordered table-sm" style="">
				<thead>
					<tr class="bg-secondary text-white">
						<th width="5%">Date</th>
						<th width="10%">Line</th>
						<th width="8%">Code</th>
						<th width="10%">Total</th>
						<th>Defect Name</th>
						<th>Section</th>
						<th>Shift</th>
						<th width="1%">#</th>
					</tr>
				</thead>
				<tbody>
					<div id="show_data">
						
					</div>
					<?php foreach ($get as $data) { ?>
					<tr>
						<td><?php echo date('d M', strtotime($data->date)) ?></td>
						<td><?php echo $data->line ?></td>
						<td><?php echo $data->defect_code ?></td>
						<td><?php echo $data->total ?></td>
						<td><?php echo $data->remarks ?></td>
						<td><?php echo $data->section ?></td>
						<td><?php echo $data->shift ?></td>
						<td>
							<a href="<?php echo base_url('dashboard/input_delete/'.$data->id_data.'/'.$data->date) ?>" class="btn btn-danger btn-sm"><span data-feather="trash"></span></a>
						</td>
					</tr>
					<?php } ?>
					<tr class="bg-info text-white">
						<?php echo form_open('dashboard/input_save'); ?>
						<td><?php echo date('d M', strtotime($this->uri->segment(3))); ?></td>
						<td>
							<select name="line" class="form-control select2" onchange="getline(this)" style=" height: 30px;">
								<option value="0">Choose..</option>
								<?php foreach ($line as $data) { ?>
									<option value="<?php echo $data->id ?>"><?php echo $data->line ?></option>
								<?php } ?>
							</select>
						</td>
						<td>
							<select name="defect" class="form-control select2" onchange="getdefect(this)" style=" height: 30px;">
								<option value="0">Choose..</option>								
								<?php foreach ($defect as $data) { ?>
									<option value="<?php echo $data->id ?>"><?php echo $data->defect_code ?></option>
								<?php } ?>
							</select>
						</td>
						<td>
							<input type="number" min="0" name="total" class="form-control" style="height: 29px;" placeholder="Total">
							<input type="hidden" name="date" value="<?php echo $this->uri->segment(3) ?>">
						</td>
						<td><span class="remarks"></span></td>
						<td><span class="section"></span></td>
						<td><span class="shift"></span></td>
						<td>
							<button type="submit" class="btn btn-sm btn-success"><span data-feather="plus"></span></button>
						</td>
					</tr>
					<?php echo form_close(); ?>
				</tbody>
			</table>
		</div>
 	</div>
</div>


<script>
	function getline(id) {
		$.ajax({
            url : "<?php echo site_url('index.php/dashboard/line_get')?>/" + id.value,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
               if (data == null) {
               	   $('.section').text('');
	               $('.shift').text('');
               }else{
	               $('.section').text(data.section);
	               $('.shift').text(data.shift);               	
               }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
	}

	function getdefect(id) {
		$.ajax({
            url : "<?php echo site_url('index.php/dashboard/defect_get')?>/" + id.value,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
               if (data == null) {
               	   $('.remarks').text('');
               }else{
               	   $('.remarks').text(data.remarks);
               }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
	}
</script>