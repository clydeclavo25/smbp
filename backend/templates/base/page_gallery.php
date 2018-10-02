<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="inbox.php" class="header-link">Gallery</a>
        <button type="button" onclick="window.location='?action=upload'" class="btn btn-success pull-right">
          <i class="fa fa-plus" aria-hidden="true"></i> New Album
        </button>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12">
          <?php 
          if (isset($_GET["action"]) && $_GET["action"] == 'upload' ) {
            include 'forms/frm_upload_image.php';
          } else {
            include 'templates/boxes/box_gallery.php';  
          }

          ?>
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Modal Add User -->
<div id="modalViewAlbum" class="modal fade" role="dialog">

</div>