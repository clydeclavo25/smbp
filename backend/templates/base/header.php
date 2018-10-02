<?php 
ob_start();
$profile = new Profile;
$myprofile = $profile->get_profile_by_id($_SESSION['admin']['login_id']);
$title = "";
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/',$link);
$page = end($link_array);
$acc = $_SESSION['admin']['access'];

switch ($page) {
  case 'submitted.php':
    $title = "Registration";
    break;

  case 'masterlist.php':
    $title = "Masterlist";
    break;

  case 'individual.php':
    $title = "Individual";
    break;

  case 'group.php':
    $title = "Group";
    break;

  case 'announcements.php':
    $title = "Announcements";
    break;

  case 'theme.php':
    $title = "Theme Management";
    break;

  case 'user.php':
    $title = "User Management";
    break;

  case 'forms.php':
    $title = "Forms Management";
    break;

    
  default:
    $title = "Home";
    break;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>SMBPP | <?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="assets/AdminLTE/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="assets/fa/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/ionicons/css/ionicons.min.css">
<link rel="stylesheet" type="text/css" href="assets/CSS/custom.css">
<link rel="stylesheet" type="text/css" href="assets/AdminLTE/dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" type="text/css" href="assets/AdminLTE/plugins/iCheck/square/blue.css">
<link rel="stylesheet" type="text/css" href="assets/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/CSS/toastr.css">
<link rel="stylesheet" type="text/css" href="assets/fileinput/css/fileinput.css">
<!-- <link rel="stylesheet" type="text/css" href="assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
<link rel="shortcut icon" href="../images/smbpp_icon.png">

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
	<div class="wrapper">
		<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SMBPP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SMBPP</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="assets/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"> Welcome! <?php echo $myprofile['fullname'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
             <li class="user-header">
                <p>
                 <?php echo $myprofile['fullname'];?>
                </p>
                <div class="row myrow profile-details">
                  Username: <?php echo $myprofile['username'] ?> <br>
                  Email: <?php echo $myprofile['email'] ?> <br>
                  Contact No.: <?php echo $myprofile['contact_no'] ?> <br>
                  <?php 
                  if ($myprofile['access']==1) {
                    $access = 'Administrator';
                   } else {
                    $access = 'Staff';
                   }
                   ?> 
                  Role: <?php echo $access ?>
                </div>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" onclick="edit_profile(<?php echo $_SESSION['admin']['login_id'];?>)" class="btn btn-default btn-flat btn-sm">Edit Profile</a>
                  <!--<a href="#" onclick="change_password(<?php echo $_SESSION['admin']['login_id'];?>)" class="btn btn-default btn-flat btn-sm">Change Password</a>-->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat btn-sm">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
