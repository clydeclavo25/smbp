
    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="<?php if ($page == 'index.php') { echo 'active'; }?>">
          <a href="./"><i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span></a>
        </li>

        <li class="treeview" id="nav-maintenance"> 
          <a href="#">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
            <span>Registration</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($page == 'submitted.php') { echo 'active'; }?>" ><a href="submitted.php"><i class="fa fa-dropbox" aria-hidden="true"></i> Uploaded forms</a></li>
            <li class="<?php if ($page == 'masterlist.php') { echo 'active'; }?>" ><a href="masterlist.php"><i class="fa fa-th-list" aria-hidden="true"></i> Masterlist</a></li>
            <li class="<?php if ($page == 'individual.php') { echo 'active'; }?>"><a href="individual.php"><i class="fa fa-user" aria-hidden="true"></i> Individual</a></li>
            <li class="<?php if ($page == 'group.php') { echo 'active'; }?>"><a href="group.php"><i class="fa fa-users" aria-hidden="true"></i> Group</a></li>
          </ul>
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
