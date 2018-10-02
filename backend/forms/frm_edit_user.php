
<?php 
  $access = $_POST['txtAccess'];
  $username = $_POST['txtUsername'];
 ?>


  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            Edit Access
        </h4>

      </div>
      <div class="modal-body">
       <form name="frm_upload_form" action="controllers/act_save_user.php?id=<?php echo $_POST['txtID'];?>" enctype="multipart/form-data" method="post" >
       <input type="hidden" value="<?php echo $_POST['txtID'];?>" name="txtID">
        <div class="row myrow">
            <div class="col-lg-12">
              
              <div class="form-group">
              <label>Username</label>
                <input type="text" class="form-control" name="txtUserName" value="<?php echo $username; ?>">  
              </div>

              <div class="form-group">
                <label>Select Access level</label>
                   <select class="form-control" name="slcAccess">
                      <option value="1" <?php if ($access == 1) { echo "selected";} ?> >Admin</option>
                      <option value="2" <?php if ($access == 2) { echo "selected";} ?>>Staff</option>
                    </select>
              </div>
            </div>
          </div>
          <input type="submit" hidden="" value="SUBMIT" name="btnSubmit" id="btnSubmit">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="saveNewAccess()" ><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>