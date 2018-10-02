<?php 
require_once('../com/config.php');
require_once('../com/class_gallery.php');

$gallery = new Gallery;
$get_album = $gallery->get_album_by_id($_GET['id']);
$get_images = $gallery->get_images($_GET['id']);

?> 

  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            Album Details
            <small id="error-msg" class="text-danger"></small>
        </h4>

      </div>
      <div class="modal-body">
        <div class="row myrow">
        <div class="form-group">
          <label>Album Title:</label>
          <input type="text" class="form-control" value="<?php echo $get_album['album_name'] ?>" id="txtAlbumName" name="txtAlbumName">
        </div> 
        <div class="form-group">
          <label>Description:</label>
          <textarea class="form-control" rows="5" id="txtDescription" name="txtDescription"><?php echo $get_album['album_description'] ?></textarea>
        </div>

        </div>

        <div class="row myrow">
          <?php foreach ($get_images as $row):
            
           ?>
          <div class="col-lg-3" style="border: 1px solid #BFBFBF; padding: 5px;">
            <center>
            <img width="100%" height="150px" src="gallery/<?php echo $row['file_name']; ?>" class="img-rounded" alt=" <?php echo $row['file_name']; ?>">
            <br><button style="margin-top: 10px;" title="Delete" onclick="delete_image(<?php echo $row['id'];?>, <?php echo $_GET['id']; ?>)" class="btn btn-block btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></center>
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="save_album_changes(<?php echo $_GET['id']; ?>)">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>