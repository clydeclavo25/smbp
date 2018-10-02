<?php 
  require_once('../com/config.php');
  require_once('../com/class_profile.php');

  $profile = new Profile;
  $get_profile = $profile->get_profile_by_id($_POST['txtID']);
 	$currentpass = $get_profile['password'];


 ?>


<div class="modal-dialog modal-md">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            Change Password
        </h4>
		</div>
		<div class="modal-body">
			<div id="loading">
				 <i class="fa fa-refresh fa-spin fa-lg"></i>
			</div>
			<div id="main_form">
				

			</div>
			<div class="form-group">
				<label>
					Current Password
				</label>
				<input type="password" class="form-control" name="txtCurrent">
			</div>

			<div class="form-group">
				<label>
					New Password
				</label>
				<input type="password" class="form-control" name="txtPassword">
			</div>

			<div class="form-group">
				<label>
					Confirm New Password&emsp; <small><b><span id="alert"></span></b></small>
				</label>
				<input type="password" class="form-control" name="txtConfirmPassword">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success" onclick="validate_form()">Save Changes</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>


<script type="text/javascript">
	function	validate_form() {
		var id = <?php echo $_POST['txtID'] ?>;
		var currpass = '<?php echo $currentpass ?>';
		var current = $("[name='txtCurrent']").val();
		var password = $("[name='txtPassword']").val();
		var confirmpass = $("[name='txtConfirmPassword']").val();
		if (password != confirmpass) {
			$("#alert").html("Passwords do not match");
		} else {

				var data = {
					txtID : id,
					txtCurrent : currpass,
					txtCurrentEntry : current,
					txtPassword : confirmpass
				} 

			$.post('controllers/act_change_pass.php', data, function (response) { })
				.done(function (data) {
					if (data == 0) {
						toastr.warning("Invalid current password");
					}
				})
				.fail(function () {
					alert("There seems to be an error trying to retrieve the data");
				});
				}
	}
</script>