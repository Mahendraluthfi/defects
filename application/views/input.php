<div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h5>Input Data</h5>
			<div class="btn-group dropleft">
			  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Add
			  </button>
			  <div class="dropdown-menu">
			  	 	<a class="dropdown-item" href="<?php echo base_url('dashboard/input_add/'.$date) ?>">Today (<?php echo date('d M') ?>)</a>
    				<a class="dropdown-item" href="#" onclick="cdate()">Choose Date</a>
			  </div>
			</div>

		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-sm" id="example2">
				<thead>
					<tr class="bg-secondary text-white">
						<th width="1%">No</th>
						<th>Date</th>
						<th>Line</th>
						<th>Defect</th>
						<th>Section</th>
						<th>Shift</th>
						<th>Total</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($get as $data) { ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo date('d M Y', strtotime($data->date)) ?></td>
						<td><?php echo $data->line ?></td>
						<td><?php echo $data->defect_code ?></td>
						<td><?php echo $data->section ?></td>
						<td><?php echo $data->shift ?></td>
						<td><?php echo $data->total ?></td>
						<td>
							<a href="<?php echo base_url('dashboard/input_delete2/'.$data->id_data) ?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><span data-feather="trash"></span></button>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>			
		</div> 
 	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form>
		  <div class="form-group">
		    <label for="date">Date</label>
		    <input type="date" class="form-control" id="date" name="date">
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="choose()">Submit</button>
      </div>
    </div>
  </div>
</div> 

<script>
	function cdate() {
		$('#exampleModal').modal('show');
	}

	function choose() {
		var hari = $('[name="date"]').val();
		if (hari == "") {
			alert('Choose Date first');
		}else{
			window.location.href="<?php echo base_url('dashboard/input_add/') ?>"+hari;
		}

		console.log(hari);
	}
</script>