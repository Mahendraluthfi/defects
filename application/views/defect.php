
<div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h5>Defect Code</h5>
			<button type="button" class="btn btn-primary btn-sm" onclick="add()"><span data-feather="plus"></span> Add</button>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-sm" id="example2">
				<thead>
					<tr class="bg-secondary text-white">
						<th width="1%">No</th>
						<th>Defect Code</th>
						<th>Remarks</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($get as $data) { ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $data->defect_code ?></td>
						<td><?php echo $data->remarks ?></td>
						<td>
							<button type="button" class="btn btn-success btn-sm" onclick="edit('<?php echo $data->id ?>')"><span data-feather="edit"></span></button>
							<a href="<?php echo base_url('dashboard/defect_delete/'.$data->id) ?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><span data-feather="trash"></span></button>
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
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="form">                                            				
			<div class="form-group row">
				<label class="form-control-label col-md-4">Defect Code</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="defect_code" placeholder="Defect Code">
				</div>
			</div>
            <div class="form-group row">
                <label class="form-control-label col-md-4">Remarks</label>
                <div class="col-md-8">
                  <textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>
                </div>
            </div>            
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      	               

<script>
	
    var save_method;
    var gid;

    function add() {
        save_method = 'add';        
        $('#form')[0].reset(); // reset form on modals
        $('.modal-title').text('Add Line'); // Set title to Bootstrap modal title        
        $('#exampleModal').modal('show');
    }

    function edit(id){
          save_method = 'update';
          gid = id;
          $('#form')[0].reset(); // reset form on modals

          //Ajax Load data from ajax
          $.ajax({
            url : "<?php echo site_url('index.php/dashboard/defect_get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                $('[name="defect_code"]').val(data.defect_code);            
                $('[name="remarks"]').val(data.remarks);                                
                // console.log(data);
                $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Line'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        // body...
        var url;
        if(save_method == 'add'){
          url = "<?php echo site_url('index.php/dashboard/defect_save')?>";          
      }else{          
          url = "<?php echo site_url('index.php/dashboard/defect_edit/')?>" + gid;         
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#exampleModal').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
</script>
