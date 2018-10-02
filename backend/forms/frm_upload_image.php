<?php 
$latest = $gallery->generate_id();
$gallery->insert_generated_id($latest);
// echo $latest;
 ?>

<script type="text/javascript">
	localStorage.setItem("album_id",<?php echo $latest; ?>)
</script>
<div class="box">
	<div class="box-header">
		<h2>Upload Pictures</h2>
	</div>
	<div class="box-body">
		<div class="row myrow">
			<div class="container-fluid">
				<div class="form-group">
					<label>Album Title:</label>
					<input type="text" class="form-control" value="Album <?php echo $latest;?>" id="txtAlbumName" name="txtAlbumName">
				</div> 
				<div class="form-group">
					<label>Description:</label>
					<textarea class="form-control" rows="5" id="txtDescription" name="txtDescription">N/A</textarea>
				</div>

					<div class="">
					    <input id="input-44" name="input44[]" type="file" multiple>
					</div>
				

			</div>
		</div>
	</div>
</div>

