
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Form</h4>
      </div>
      <div class="modal-body">
       <form name="frm_upload_form" action="controllers/act_upload_form.php" enctype="multipart/form-data" method="post" >
          <div class="row myrow">
          <div class="col-lg-12">
              <label>Upload PDF/WORD file</label>
              <div class="form-group">
                <input type="file" name="fileForm">
              </div>
            </div>
            <div class="col-lg-12">
              <label>Form Type</label>
              <div class="col-lg-12">
                <select class="form-control" name="slcType">
                  <option value="Individual">Individual</option>
                  <option value="Group">Group</option>
                </select>
              </div>
            </div>
          </div>
          <input type="submit" hidden="" value="SUBMIT" name="btnSubmit" id="btnSubmit">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="uploadForm()" ><i class="fa fa-upload" aria-hidden="true"></i> UPLOAD</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>