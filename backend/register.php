<?php
// LOAD CLASSES
include 'com/config.php';
include 'com/class_register.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<?php include'settings/styles.php' ?>
</head>
<body class="hold-transition register-page">
<div class="register-box" style="margin-top: 10px !important">
  <div class="register-logo">
    <a href="#"><b>Registration</b></a>
<!--     <small>Errors:<span id="errordisplay"></span></small>   -->
  </div>

  <div class="register-box-body">
  
    <!-- form start -->
    <form role="form" method="post" action="controllers/act_save_registration.php">
    	<div class="box-body">
    	<div class="row">
      
    		<div class="col-lg-12">
    			<div class="col-lg-12">
    				<div class="form-group" id="LastNameContainer">
		        	<label for="LastName">Last Name</label> <small class="pull-right form-alert" id="LastNameAlert"></small>
		          <input type="text" class="form-control" id="LastName" name="txtLastName" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group" id="FirstNameContainer">
		        	<label for="FirstName">First Name</label> <small class="pull-right form-alert" id="FirstNameAlert"></small>
		          <input type="text" class="form-control" id="FirstName" name="txtFirstName" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group" id="MiddleNameContainer">
		        	<label for="MiddleName">Middle Name</label> <small class="pull-right form-alert" id="MiddleNameAlert"></small>
		          <input type="text" class="form-control" id="MiddleName" name="txtMiddleName" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group" id="UsernameContainer">
		        	<label for="UserName">Username </label> <small class="pull-right form-alert" id="UserNameAlert"></small>
		          <input type="text" class="form-control" id="UserName" name="txtUserName" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group PasswordContainer">
		        	<label for="Password">Password</label> <small class="pull-right form-alert" id="PasswordAlert"></small>
		          <input type="password" class="form-control" id="Password" name="txtPassword" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group PasswordContainer">
		        	<label for="ConfirmPassword">Confirm Password</label><small class="pull-right form-alert" id="ConfirmPasswordAlert"></small>
		          <input type="password" class="form-control" id="ConfirmPassword" name="txtConfirmPassword" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group" id="AddressContainer">
		        	<label for="Address">Address</label> <small class="pull-right form-alert" id="AddressAlert"></small>
		          <input type="text" class="form-control" id="Address" name="txtAddress" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group" id="EmailContainer">
		        	<label for="Email">Email</label> <small class="pull-right form-alert" id="EmailAlert"></small>
		          <input type="email" class="form-control" id="Email" name="txtEmail" placeholder="">
		        </div>
    			</div>
    			<div class="col-lg-12">
    				<div class="form-group" id="MobileContainer">
		        	<label for="Mobile">Mobile</label> <small class="pull-right form-alert" id="MobileAlert"></small>
                    <input type="text" class="form-control" id="Mobile" name="txtMobileNo" placeholder="" value="">
                 
		        </div>
    			</div>
    		</div>

    	</div>
    		

    	</div>
      <div class="row">
          <div class="col-lg-6">
            
        </div>
        <div class="col-lg-6">
            <div class="col-lg-6">
               <button type="button" class="btn btn-info" id="btnValidate">SUBMIT</button>
            </div>
           <div class="col-lg-6">
                <button type="button" class="btn btn-danger" onclick="location.reload()">RESET</button>
           </div>
             <input type="submit" id="btnSubmit" hidden="" name="">
        </div>
      </div>

    </form>

   

    <a href="login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<div class="modal fade" id="modalConfirmRegistration">
    <div class="modal-dialog  modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Default Modal</h4>
      </div>
      <div class="modal-body">
        <p>Submit Registration?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="$('#btnSubmit').click()">Yes</button>
      </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php include'settings/scripts.php' ?>
<script type="text/javascript" src="assets/js/register.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>