<?php 
  require_once('../com/config.php');
  require_once('../com/class_announcement.php');


  $id = "";
  $record = "";
  $title = "";
  $content = "";
  $announcement = new Announcement;  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $record = $announcement->get_announcement_by_id($id);
    $title = $record['title'];
    $content = $record['content'];
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
              echo "New Announcement";
            } else {
              echo "Edit Announcement";
            }
            ?>
            <small id="error-msg" class="text-danger"></small>
        </h4>

      </div>
      <div class="modal-body">
       <form name="frm_upload_form" action="controllers/act_save_announcement.php?id=<?php echo $id;?>" enctype="multipart/form-data" method="post" >
        <div class="row myrow">
           <div class="col-lg-12">
              <div class="form-group">
              	<label>Title:</label>
              	<textarea class="form-control" rows="3" id="txtTitle" name="txtTitle"><?php echo $title; ?></textarea>
              </div>
              <div class="form-group">
              	<label>Content:</label>
              	 <textarea class="textarea" id="txtContent" name="txtContent" placeholder="Place some text here" style=""><?php echo $content; ?></textarea>
              </div>
            </div>
          </div>
          <input type="submit" hidden="" value="SUBMIT" name="btnSubmit" id="btnSubmit" />
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="save_announcement()" ><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>