
<div class="box">
	<div class="box-header">
		<div class="form-group">
			<button class="btn btn-primary pull-right" id="btnNewAnnouncement">
				<i class="fa fa-plus" aria-hidden="true"></i> NEW ANNOUNCEMENT
			</button>
		</div>
	</div>
	<div class="box-body">
		<div class="row myrow">
			<div class="container-fluid">
			<?php if (isset($_GET['saved']) || isset($_GET['updated']) || isset($_GET['del']) ) { ?>
          <div class="alert alert-<?php echo $alert_type;?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $alert_info; ?></h4>
            <?php
            echo $alert_message;
            ?>
          </div>
      <?php } ?>



				<table class="table table-bordered table-hover DataTable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Date Saved</th>
							<th>Posted</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($get_all as $row):
						$posted = $row['is_posted'];
						$date_posted = "";
						$set_class = "";
						$date_saved = "";
						$date_saved = date_create($row['date_saved']);
						$date_saved = date_format($date_saved,"F d, Y");
						if ($posted == 1) {
							$date_posted = date_create($row['date_posted']);
							$date_posted = date_format($date_posted,"F d, Y");
							$posted = $date_posted;
							$set_caption = "Unpost";
							$set_class = "bg-success";
						} else {
							$posted = "NO";
							$set_caption = "Post it";
						}

						 ?>
						<tr class="<?php echo $set_class; ?>">
							<td><?php echo $row['id']; ?></td>
							<td style="max-width: 400px !important"><?php echo $row['title']; ?></td>
							<td><?php echo $date_saved ?></td>
							<td><?php echo $posted; ?></td>
							<td>
							 <div class="btn-group" role="group" aria-label="Basic example">
								 <button onclick="editAnnouncement(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                 <button onclick="deleteAnnouncement(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                 <button <?php if($posted == 1) {echo "disabled";} ?> onclick="change_posting(<?php echo $row['id'];?>)" class="btn btn-xs btn-primary"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <?php echo $set_caption; ?></button>
               </div>
							</td>
						</tr>

						<?php endforeach ?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>