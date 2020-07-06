
<div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h5>Line</h5>
			<button type="button" class="btn btn-primary btn-sm" onclick="add()"><span data-feather="plus"></span> Add</button>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-sm" id="example">
				<thead>
					<tr class="bg-secondary text-white">
						<th width="1%">No</th>
						<th>Line</th>
						<th>Section</th>
						<th>Shift</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($get as $data) { ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $data->line ?></td>
						<td><?php echo $data->section ?></td>
						<td><?php echo $data->shift ?></td>
						<td>
							<button type="button" class="btn btn-success btn-sm" onclick="edit('<?php echo $data->id ?>')"><span data-feather="edit"></span></button>
							<a href="<?php echo base_url('dashboard/line_delete/'.$data->id) ?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><span data-feather="trash"></span></button>
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
				<label class="form-control-label col-md-4">Line</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="line" placeholder="Line Number">
				</div>
			</div>
            <div class="form-group row">
                <label class="form-control-label col-md-4">Category</label>
                <div class="col-md-8">
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
                <label class="form-control-label col-md-4">Remark</label>
                <div class="col-md-8">
                	<select name="shift" class="form-control">
                		<option value="Shift A">Shift A</option>
                		<option value="Shift B">Shift B</option>
                		
                	</select>
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
            url : "<?php echo site_url('index.php/dashboard/line_get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                $('[name="line"]').val(data.line);            
                $('[name="section"]').val(data.section);            
                $('[name="shift"]').val(data.shift);
                $('[name="section"]').trigger('change')                
                $('[name="shift"]').trigger('change')                
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
          url = "<?php echo site_url('index.php/dashboard/line_save')?>";          
      }else{          
          url = "<?php echo site_url('index.php/dashboard/line_edit/')?>" + gid;         
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
