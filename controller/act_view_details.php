<?php 
$fullname = ucwords($_POST['txtLastName']).", ".ucwords($_POST['txtFirstName'])." ".ucwords($_POST['txtMiddleName']);
$lastname = $_POST['txtLastName'];
$firstname = $_POST['txtFirstName'];
$email = $_POST['txtEmail'];
$contact = $_POST['txtContact'];
$disabled = '';


if ($lastname == "" || $firstname == "" || $email == "" || $contact == "") {
	$disabled = 'disabled';
}


 ?>




 <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to submit the registration form now?<Br> <br>
        	<div class="form-group">
        		<label>Your Name:</label>
        			<input type="text" class="form-control" readonly="" name="" value="<?php echo $fullname; ?>">
        	</div>

        	<div class="form-group">
        		<label>Your Email:</label>
        			<input type="text" class="form-control" readonly="" name="" value="<?php echo $_POST['txtEmail']; ?>">
        	</div>

        	<div class="form-group">
        		<label>Your Contact No.:</label>
        			<input type="text" class="form-control" readonly="" name="" value="<?php echo $_POST['txtContact']; ?>">
        	</div>

        <em>NOTE: Please ensure that all fields have valid entries.</em></p>
      </div>
      <div class="modal-footer">
      	<b class="text-danger"><?php 
      		if ($disabled == 'disabled') {
      			echo "You have vacant fields.&emsp;";
      		}

      	 ?></b>
      	<input type="submit" name="" class="btn btn-info" value="Yes" <?php echo $disabled; ?>>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>




