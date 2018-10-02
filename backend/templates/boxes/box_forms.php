
<div class="box">
  <div class="box-header">
    <!-- <h3 class="box-title">Click on an item below to view the member's full details.</h3> -->
    <div class="form-group">
      <button id="btnNewUpload" type="button" class="btn btn-primary pull-right">
       <i class="fa fa-upload" aria-hidden="true"></i> UPLOAD
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
<?php
if (isset($_GET['uploaded']) && $_GET['uploaded'] == 1) {
?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    Form was succesfully uploaded. <a href='forms.php'>Refresh page</a>
  </div>
<?php
}
?>

<?php
if (isset($_GET['err']) && $_GET['err'] == 1) {
?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-times"></i> Error!</h4>
    There was an error trying to process your request, please check the proper file format/size. 
  </div>
<?php
}
?>
    <div class="row myrow">
        <div class="container-fluid">
          <table id="Forms" class="table table-bordered table-hover DataTable">
            <thead>
            <tr>
              <th></th>
              <th>Filename</th>
              <th>Type</th>
              
              <th>Date Updated</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody data-link="row" class="rowlink" id="FormsRecords">
              
              <?php 
              $ctr = 0;
              foreach ($get_all as $row): 
                  $set_caption = "";
                  $set_status = "";
                  $set_class="";
                  $active = $row['is_active'];
                  if ($active == 1) {
                    $set_caption = 'Inactive';
                    $set_status = 'Active';
                    $set_class = 'success';
                  } else {
                    $set_caption = 'Active';
                    $set_status = 'Inactive';
                    $set_class = 'danger';
                  }

              ?>
                  <tr>
                    <td>
                      <?php echo ++$ctr;?>
                    </td>
                    <td>
                      <?php echo $row['filename']; ?>
                    </td>
                    <td>
                      <?php echo $row['type']; ?>
                    </td>
                   
                    <td>
                      <?php 
                      $date = date_create($row['date_updated']);
                      echo date_format($date,"F d, Y");?>
                    </td>
                     <td>
                      <b class="text-<?php echo $set_class;?>"><?php echo $set_status; ?> </b>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                         <button onclick="deletefile(<?php echo $row['id'];?>)" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                         <a href="?change_status=<?php echo $row['id'];?>" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Set as <?php echo $set_caption;?></a>
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

 <!--<div class="overlay" id="loadingSpinner">
    <i class="fa fa-refresh fa-spin"></i>
  </div> -->

</div>
<!-- /.box -->


<div class="box">
  <div class="box-header">
    <h3 class="myh">Currently On-line</h3>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>Type</th>
        <th>Filename</th>
        <th>Date updated</th>
      </tr>
    </thead>
     <tbody>
      <tr>
        <th>INDIVIDUAL REGISTRATION FORM</th>
        <td><?php echo $get_latest_individual['filename'];?></td>
        <td><?php 
                $date = date_create($get_latest_individual['date_updated']);
                echo date_format($date,"F d, Y");?>
        </td>
      </tr>
      <tr>
        <th>GROUP REGISTRATION FORM</th>
        <td><?php echo $get_latest_group['filename'];?></td>
        <td><?php 
                $date = date_create($get_latest_group['date_updated']);
                 echo date_format($date,"F d, Y");?>
        </td>
      </tr>
     </tbody>
    </table>
  </div>

</div>
<!-- /.box -->