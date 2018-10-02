<style type="text/css">
	.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
		padding-right: 5px;
		padding-left: 5px;
	}
</style>

<?php 

// $getlatest = $form->generate_ctr_no(date('y')) ;
// $yearexists = $form->year_exists(date('y'));

// if ($yearexists) {
// 	echo "Year already exists";
// } else {
// 	echo "Year does not exists";
// }

// echo "<br>";

// // if ($getlatest == '') {
// // 	$getlatest = 1;
// // }

// echo $getlatest;

?>




<div class="row myrow">
	<div class="container">
		      <?php 
        if ($alert_type != "") {

        ?>

          <div class="alert alert-<?php echo $alert_type;?> alert-dismissible wow bounceIn" style="margin-top: 20px; margin-bottom: 0px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $alert_info; ?></h4>
            <?php
            echo $alert_message;
            ?>
          </div>

        <?php } ?>
		<form enctype="multipart/form-data" method="post" action="controller/act_send_form.php">
			<div class="center wow fadeInDown">
			<div class="row myrow">
				<div class="col-lg-3">
					
				</div>
				<div class="col-lg-6">
				<h3>UPLOAD REGISTRATION FORM</h3>
					<div class="form-group">
					<input type="file" data-show-upload="false" class="file" name="fileForm">
				</div>
				
				<label>Your Name</label>
				<div class="row myrow">
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control" name="txtLastName" required="" placeholder="Last Name">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control" name="txtFirstName" required="" placeholder="First Name">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control" name="txtMiddleName" placeholder="Middle Name">
						</div>
					</div>
				</div>

				<label>Your <span class="text-danger">VALID</span> Email</label>
				<div class="row myrow">
						<div class="form-group">
							<input class="form-control" type="text" name="txtEmail" required="" placeholder="Email Address"></input>
						</div>
				</div>


				<label>Your contact number</label>
				<div class="row myrow">
					<div class="form-group">
						<input class="form-control" type="text" name="txtContact" required="" placeholder="Contact number"></input>
					</div>
				</div>

				<div class="row myrow">
					<button type="button" class="btn btn-primary btn-block" onclick="confirm_registration()">SUBMIT</button>
					<button type="button" onclick="location.reload()" class="btn  btn-danger btn-block">RESET</button>
				</div>


				</div>
			</div>
		</div>
		<!-- Modal -->
			<div id="modal_confirm" class="modal fade" role="dialog">
			 	
			</div>
		</form>
	</div>
</div>


<script type="text/javascript">
	function confirm_registration() {
		var firstname = $("[name='txtFirstName']").val();
		var lastname = $("[name='txtLastName']").val();
		var middlename = $("[name='txtMiddleName']").val();
		var email = $("[name='txtEmail']").val();
		var contact = $("[name='txtContact']").val();

		var data = {
				txtFirstName : firstname,
				txtLastName : lastname,
				txtMiddleName : middlename,
				txtEmail : email,
				txtContact : contact
			};


	$.post('controller/act_view_details.php', data, function (response) { })
		.done(function (data) {
			$("#modal_confirm").modal("show");
			$("#modal_confirm").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to retrieve the data");
		});

	}
</script>


