<!DOCTYPE html>
<html>
<head>
	<title>SMBPP | Log in</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="../images/smbpp_icon.png">
</head>
<?php 
ob_start();
require_once 'settings/styles.php'; 
$alert_type = "";
$alert_message = "";
$alert_info = "";
$type = 0;
if (isset($_GET['register'])) {
  $type = $_GET['register'];
  switch ($type) {
    case 'dup1':
      $alert_type = "danger";
      $alert_message = "The email you have entered is no longer available.";
      $alert_info = "Alert!";
      break;
    case 'dup2':
      $alert_type = "danger";
      $alert_message = "The username you have entered is no longer available.";
      $alert_info = "Alert!";
      break;
    case 'fail':
      $alert_type = "danger";
      $alert_message = "There is an error trying to save your registration, registration was unsuccessful.";
      $alert_info = "Alert!";
      break;
    case '1':
      $alert_type = "success";
      $alert_message = "Registration successful, you may now log in using your registered username and password";
      $alert_info = "Success!";
      break;
    default:
      $alert_type = "";
      $alert_message = "";
      $alert_info = "";
      break;
  }
}

?>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>SMBPP</b>Admin</a>
  </div>

<?php 
if (isset($_GET['register'])) {

?>

  <div class="alert alert-<?php echo $alert_type;?> alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $alert_info; ?></h4>
    <?php
    echo $alert_message;
    ?>
  </div>

<?php } ?>

<?php 
if (isset($_GET['err'])) {
  switch ($_GET['err']) {
    case '1':
      $login_message = "You do not have access to this page";
      break;

    case '2':
      $login_message = "Invalid username or password";
      break;

    default:
      # code...
      break;
  }

?>

  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Alert!</h4>
    <?php
    echo $login_message;
    ?>
  </div>

<?php } ?>




  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="controllers/act_login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="txtUserName" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="txtPassword" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row myrow">
       <!--  <div class="col-xs-6">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-9">
          
        </div>
        <div class="col-xs-3">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          <!-- <a href="register.php" role="button" class="btn btn-danger btn-block btn-flat">Register</a> -->
        </div>
        <!-- /.col -->
      </div>
    </form>

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


</body>
</html>

<?php require_once 'settings/scripts.php' ?>


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>