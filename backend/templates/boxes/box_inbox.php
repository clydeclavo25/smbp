<div class="box">
	<div class="box-header">
	</div>
	<div class="box-body">
		<div class="row myrow">
			<div class="container-fluid">
				<table class="table table-bordered table-hover DataTable">
					<thead>
						<tr>
							<th></th>
							<th>ID</th>
							<th>Sender</th>
							<th>Email</th>
							<th>Subject</th>
							<th>Date Sent</th>
							<th>Actions</th>
						</tr>
					</thead>
					<?php  foreach ($get_all as $row):  
						$set_icon = "";
						$set_color = "";
						$set_text = "";
						$is_read = $row['is_read'];
						if ($is_read == 0) {
							$set_icon = "fa-envelope";
							$set_color = "text-danger";
						} else {
							$set_icon = "fa-envelope-open-o";
							$set_color = "text-success";
						}

					?>
						<tr>
							<td class="text-center"><span class="<?php echo $set_color ?>"><i class="fa <?php echo $set_icon?> fa-lg" aria-hidden="true"></i> <?php echo $set_text ?></span></td>
							<td> <?php echo $row['id']; ?> </td>
							<td> <?php echo $row['name']; ?> </td>
							<td> <?php echo $row['email']; ?>	</td>
							<td> <?php echo $row['subject']; ?></td>
							<td> <?php 
								$date_sent = date_create($row['date_sent']);
                 echo date_format($date_sent,"F d, Y");
							?> 
						</td>
							<td>
   								<div class="btn-group">
   									<button onclick="read_message(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> Read</button>
   									<button onclick="archive_message(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
   								</div>
							</td>

						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
