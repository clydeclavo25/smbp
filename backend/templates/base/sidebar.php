
    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="<?php if ($page == 'index.php') { echo 'active'; }?>" style="display:none">
          <a href="./"><i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span></a>
        </li>

        <li class="<?php if ($page == 'registration.php') { echo 'active'; }?>"> 
          <a href="registration.php">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
            <span>Registration</span>
          </a>
        </li>

        <li class="<?php if ($page == 'inbox.php') { echo 'active'; }?>">
          <a href="inbox.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Inbox</span></a>
        </li>

        <?php
          if ($acc == 1) {
        ?>

        <li class="<?php if ($page == 'announcements.php') { echo 'active'; }?>">
          <a href="announcements.php"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span>Announcements</span></a>
        </li>

        <li class="<?php if ($page == 'theme.php') { echo 'active'; }?>">
          <a href="theme.php"><i class="fa fa-font" aria-hidden="true"></i> <span>Theme</span></a>
        </li>

        <li class="<?php if ($page == 'gallery.php') { echo 'active'; }?>">
          <a href="gallery.php"><i class="fa fa-file-image-o" aria-hidden="true"></i> <span>Gallery</span></a>
        </li>

        <li class="<?php if ($page == 'user.php') { echo 'active'; }?>">
          <a href="user.php"><i class="fa fa-wrench" aria-hidden="true"></i> <span>User Management</span></a>
        </li>

        <li class="<?php if ($page == 'forms.php') { echo 'active'; }?>">
          <a href="forms.php"><i class="fa fa-file" aria-hidden="true"></i> <span>Forms Management</span></a>
        </li>

        <?php } ?>

       
      </ul>
  
    </section>
    <!-- /.sidebar -->
  </aside>
