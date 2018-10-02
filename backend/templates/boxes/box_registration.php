
<div class="box">
  <div class="box-header">
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row myrow">
      <div class="container-fluid">
      <?php 
        if ($alert_type != "") {

        ?>

          <div class="alert alert-<?php echo $alert_type;?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $alert_info; ?></h4>
            <?php
            echo $alert_message;
            ?>
          </div>

        <?php } ?>
          <table id="" class="table table-bordered table-hover DataTable">
            <thead>
            <tr>
              <th>Name</th>
              <th>Control No</th>
              <th>Form</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Date sent</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody data-link="row" class="rowlink" id="">

                <?php foreach ($get_unconfirmed as $row):  ?>
                  <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['control_no']; ?></td>
                    <td><a class="btn btn-xs btn-default" download href="../registration/<?php echo $row['filename']; ?>"><i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD</a></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo date_format(date_create($row['date_sent']),"F d, Y"); ?></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" onclick="confirm_registration(<?php echo $row['id']; ?>)" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> CONFIRM</button>
                      <button type="button" onclick="delete_registration(<?php echo $row['id']; ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> DELETE</button>
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

<!-- <div class="overlay" id="loadingSpinner">
    <i class="fa fa-refresh fa-spin"></i>
  </div>  -->
</div>
<!-- /.box -->




<!-- 
######################################
CONFIRMED REGISTRATIONS 
######################################
-->


<div class="box">
  <div class="box-header">
    <h3 class="myh">Confirmed Registrations</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row myrow">
      <div class="container-fluid">
         <table id="Equipment" class="table table-bordered table-hover DataTable">
      <thead>
      <tr>
        <th>Name</th>
        <th>Control No</th>
        <th>Form</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Date confirmed</th>
      </tr>
      </thead>
      <tbody data-link="row" class="rowlink" id="EquipmentRecords">
            <?php foreach ($get_confirmed as $row): 
                $status = $row['confirmed'];
                $set_status = "";
                if ($status == 0) {
                  $set_status = 'For confirmation';
                }
                ?>
                  <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['control_no']; ?></td>
                    <td><a class="btn btn-xs btn-default" download href="../registration/<?php echo $row['filename']; ?>"><i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD</a></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo date_format(date_create($row['date_confirmed']),"F d, Y"); ?></td>
                  </tr>
                <?php endforeach ?>
      </tbody>
    </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->

<!--<div class="overlay" id="loadingSpinner">
    <i class="fa fa-refresh fa-spin"></i>
  </div> -->
</div>
<!-- /.box -->