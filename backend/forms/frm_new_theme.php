<?php 
  require_once('../com/config.php');
  require_once('../com/class_theme.php');

  $id = "";
  $record = "";
  $title = "";
  $description = "";
  $theme = new Theme;  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $record = $theme->get_theme_by_id($id);
    $title = $record['title'];
    $description = $record['description'];
  }

  
 ?>

  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            <?php
            if ($id == "") {
              echo "New Theme";
            } else {
              echo "Edit Theme";
            }
            ?>
            <small id="error-msg" class="text-danger"></small>
        </h4>

      </div>
      <div class="modal-body">
       <form name="frm_upload_form" action="controllers/act_save_theme.php?id=<?php echo $id;?>" enctype="multipart/form-data" method="post" >
        <div class="row myrow">
           <div class="col-lg-12">
              <div class="form-group">
              	<label>Title:</label>
              	<textarea class="form-control" rows="3" id="txtTitle" name="txtTitle"><?php echo $title; ?></textarea>
              </div>
              <div class="form-group">
              	<label>Description:</label>
              	<textarea class="form-control" rows="5" id="txtDescription" name="txtDescription"><?php echo $description; ?></textarea>
              </div>
            </div>
          </div>
          <input type="submit" hidden="" value="SUBMIT" name="btnSubmit" id="btnSubmit">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="saveTheme()" ><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>