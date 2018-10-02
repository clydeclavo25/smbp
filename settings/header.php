<?php
   ob_start();
   $link = $_SERVER['PHP_SELF'];
   $link_array = explode('/',$link);
   $page = end($link_array);
   $yearnow = date("Y");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sci-Math Brainpower PH</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main-blue.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fileinput.min.css">
<!--     <link rel="stylesheet" href="gallery-master/css/blueimp-gallery.css"> -->
    <link rel="stylesheet" href="photoswipe/dist/photoswipe.css">
    <link rel="stylesheet" href="photoswipe/dist/default-skin/default-skin.css">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/smbpp_icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->

<body class="homepage">


<!-- NAV BAR -->
    <header id="header">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <div class="container-fluid" style="margin-left: 20px; margin-right: 20px;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./"><img src="images/weblogo3.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="<?php if ($page == 'index.php') { echo 'active'; }?>" ><a href="./">Home</a></li>
                        <li class="<?php if ($page == 'about-us.php') { echo 'active'; }?>" ><a href="about-us.php">About Us</a></li>
                        <li class="<?php if ($page == 'announcements.php') { echo 'active'; }?>" ><a href="announcements.php?year=<?php echo $yearnow; ?>">Announcements</a></li>
                        <li class="<?php if ($page == 'projects.php') { echo 'active'; }?>" ><a href="projects.php">Projects</a></li>
                        <li class="<?php if ($page == 'events.php') { echo 'active'; }?>" ><a href="events.php">Events</a></li>
                        <li class="<?php if ($page == 'gallery.php') { echo 'active'; }?>" ><a href="gallery.php">Gallery</a></li>
                        <li class="<?php if ($page == 'register.php') { echo 'active'; }?>" ><a href="register.php">Register now</a></li>                        
                        <li class="<?php if ($page == 'contact.php') { echo 'active'; }?>" ><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <div class="row myrow" id="main-container">
        

 