

<div class="box">
  <div class="box-header">
    <button id="btnAddUser" type="button" class="btn btn-primary pull-right">
     <i class="fa fa-user-plus" aria-hidden="true"></i> ADD USER
    </button>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
   <div class="row myrow">
     <div class="container-fluid">
     <?php 
        if (isset($_GET['register']) || isset($_GET['update'])  ) {

        ?>

          <div class="alert alert-<?php echo $alert_type;?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $alert_info; ?></h4>
            <?php
            echo $alert_message;
            ?>
          </div>

        <?php } ?>
        <table id="Equipment" class="table table-bordered table-hover DataTable">
          <thead>
          <tr>
            <th>Member ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Username</th>
            <th>Access</th>
            <th></th>
          </tr>
          </thead>
          <tbody data-link="row" class="rowlink" id="EquipmentRecords">
            <?php 
            foreach ($get_all_active as $row): 
              $access = $row['access'];
                if ($access == 1) {
                  $access = "Admin";
                } else {
                  $access = "Staff";
                }

               $set_caption = "";
                  $set_status = "";
                  $set_class="";
                  $active = $row['is_active'];
                  if ($active == 1) {
                    $set_caption = 'Inactive';
                    $set_status = 'Active';
                  } else {
                    $set_caption = 'Active';
                    $set_status = 'Inactive';
                    $set_class = 'tr-inactive';
                  }
            ?>
            <tr class="<?php echo $set_class;?>">
              <td> <?php echo $row['id']; ?> </td>
              <td> <?php echo $row['last_name']; ?> </td>
              <td> <?php echo $row['first_name']; ?> </td>
              <td> <?php echo $row['address']; ?> </td>
              <td> <?php echo $row['email']; ?> </td>
              <td> <?php echo $row['username']; ?> </td>
              <td> <?php echo $access; ?> </td>
              <td> 
                <div class="btn-group" role="group" aria-label="Basic example">
                  
                   <button onclick="editUser(<?php echo $row['id']; echo ","; echo $row['access'].",'".$row['username']."'"; ?>)" type="button" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>

                   <button onclick="change_status(<?php echo $row['id'];?>)" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Set as <?php echo $set_caption;?></button>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>
     </div>
   </div>
  </div>
  <!-- /.box-body -->
 <!--  <div class="overlay" id="loadingSpinner">
    <i class="fa fa-refresh fa-spin"></i>
  </div> -->
</div>
<!-- /.box -->


<div class="box">
  <div class="box-header">
    <h4>Inactive users</h4>
  </div>
  <div class="box-body">
    <div class="row myrow">
      <div class="col-lg-12">
        <table class="table table-bordered table-hover DataTable">
               <thead>
                <tr>
                  <th>Member ID</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Access</th>
                  <th></th>
                </tr>
                </thead>
                <tbody data-link="row" class="rowlink" id="EquipmentRecords">
                      <?php 
                      foreach ($get_all_inactive as $row): 
                        $access = $row['access'];
                          if ($access == 1) {
                            $access = "Admin";
                          } else {
                            $access = "Staff";
                          }

                         $set_caption = "";
                            $set_status = "";
                            $set_class="";
                            $active = $row['is_active'];
                            if ($active == 1) {
                              $set_caption = 'Inactive';
                              $set_status = 'Active';
                            } else {
                              $set_caption = 'Active';
                              $set_status = 'Inactive';
                              $set_class = 'tr-inactive';
                            }
                      ?>
                      <tr class="">
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['last_name']; ?> </td>
                        <td> <?php echo $row['first_name']; ?> </td>
                        <td> <?php echo $row['address']; ?> </td>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['username']; ?> </td>
                        <td> <?php echo $access; ?> </td>
                        <td> 
                          <div class="btn-group" role="group" aria-label="Basic example">
                            
                             <button onclick="editUser(<?php echo $row['id']; echo ","; echo $row['access']; ?>)" type="button" class="btn btn-xs btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                              <button onclick="deleteUser(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                             <button onclick="change_status(<?php echo $row['id'];?>)" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Set as <?php echo $set_caption;?></button>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
               </tbody>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>