<?php 
	$get_all = $gallery -> get_all_albums();
 ?>
<div class="box">
	<div class="box-header">
		<div class="col-lg-12">
			
		</div>
	</div>
	<div class="box-body">
		<div class="row myrow">
			<div class="container-fluid">
				<table class="table table-bordered table-hover DataTable">
					<thead>
						<tr>
							<th></th>
							<th>ID</th>
							<th>Album Title</th>
							<th>Date Created</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($get_all as $row): ?>
							<tr>
								<td style="width: 50px"><button class="btn btn-xs btn-block btn-danger" onclick="delete_album(<?php echo $row['generated_id'];?>)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
								<td><?php echo $row['generated_id']; ?></td>
								<td><a href="#" onclick="view_album(<?php echo $row['generated_id'];?>)"><?php echo $row['album_name']; ?></a></td>
								<td><?php 
								$date = date_create($row['date_saved']);
								echo date_format($date,"Y-m-d H:i"); 
								?></td>
							</tr>
					<?php endforeach ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>


