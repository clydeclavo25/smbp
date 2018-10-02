<div class="box">
	<div class="box-header">
		<button class="btn btn-primary pull-right" id="btnNewTheme">
			<i class="fa fa-plus" aria-hidden="true"></i> NEW THEME
		</button>		
	</div>
	<div class="box-body">
		<div class="row myrow">
			<div class="container-fluid">
			<?php 
        if ($alert_type != "") {

        ?>

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
							<th>Description</th>
							<th>Date Saved</th>
							<th>Date Posted</th>
							<th>Actions</th>
						</tr>
					</thead>
					<?php  foreach ($get_all as $row):  
						$set_caption = "";
						$posted = $row['is_posted'];
						if ($posted == 1) {
							$set_caption = "POSTED";
						} else {
							$set_caption = "Post it";
						}

					?>
						<tr class="<?php if ($posted==1) echo "bg-success"; ?>">
							<td> <?php echo $row['id']; ?> </td>
							<td> <?php echo $row['title']; ?> </td>
							<td style="max-width: 700px !important;"> <?php echo $row['description']; ?> </td>
							<td> <?php 
								$date_saved = date_create($row['date_saved']);
                 echo date_format($date_saved,"F d, Y");
							?> </td>
							<td>
								<?php 
								$date_posted = date_create($row['date_posted']);
                 echo date_format($date_posted,"F d, Y");
								 ?>
							</td>
							<td>

								 <button onclick="editTheme(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                 <button onclick="deleteTheme(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                 <button <?php if($posted == 1) {echo "disabled";} ?> onclick="post_unpost(<?php echo $row['id'];?>)" class="btn btn-xs btn-primary"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <?php echo $set_caption; ?></button>
   
							</td>

						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
