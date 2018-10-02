  
  <footer class="main-footer">

<?php

	$myvar =  substr($page, 0, -4);
	$myvar = $myvar.".js";

?>
   
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">Sci-Math Brain Power Phils.</a></strong> All rights
    reserved.
  </footer>
</div>
<!-- Modal -->
<div id="modalEditProfile" class="modal fade" role="dialog">

</div>


<!-- Modal -->
<div id="modalChangePass" class="modal fade" role="dialog">

</div>

<!-- ./wrapper -->
<script src="assets/JS/jquery-3.1.1.min.js"></script>
<script src="assets/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="assets/AdminLTE/plugins/input-mask/jquery.inputmask.js"></script>
<script src="assets/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script src="assets/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/JS/custom.js"></script>
<script src="assets/tinymce/tinymce.min.js"></script>
<script src="assets/JS/toastr.min.js"></script>

<script src="assets/fileinput/js/plugins/sortable.js"></script>
<script src="assets/fileinput/js/fileinput.js"></script>
<script src="assets/fileinput/themes/explorer-fa/theme.js"></script>
<script src="assets/fileinput/themes/fa/theme.js"></script>
<script src="assets/JS/<?php echo $myvar?>"></script>
</body>
</html>


<!-- <script type="text/javascript" src="assets/AdminLTE/dist/js/app.min.js"></script> -->

