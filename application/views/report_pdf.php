<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Report PDF</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="C:\xampp\htdocs\defect\assets\pdf\bootstrap.min.css">
    <script src="C:\xampp\htdocs\defect\assets\pdf\bootstrap.min.js"></script>
</head>
<body>
	<div class="alert alert-info">
			<strong>
				<?php echo $title ?>				
			</strong>
		</div>	
	<div class="row">
		<div class="col-xs-11">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="1%">Rank</th>
						<th>Code</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($get as $data) { ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td>
								<?php echo $data->defect_code.' / '.$data->remarks ?><hr>Top 3 Line <br>

								<?php foreach ($data->line_array as $linearray) {
									echo '<div class="alert alert-warning">
										<strong>Line '.$linearray->line.'</strong> => '.$linearray->total.' Defects
									</div>';
								} ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>