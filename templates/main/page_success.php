
<?php 
	if (isset($_GET['success']) and $_GET['success'] != "") { 
 ?>

<div class="wow fadeInDown">
	<div class="row myrow">
		<div class="container">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="panel panel-success" style="margin-top: 50px;">
				<div class="panel-heading">
					<center>
							<h2 style="color:#056900">CONGRATULATIONS!</h2>
					</center>
					</div>
					<div class="panel-body">
						<div class="center" style="padding-bottom: 30px;">
								<p style="font-size: 13pt">
									Your control number is <b  class="text-danger ctrno"><?php echo $_GET['success']; ?></b> <br><br>
									You have successfully submitted the registration form, please be informed that you will be notified through the email or contact number that you gave us when your registration is already confirmed.<br><br>
									Thank you for your cooperation.<br><br>
								</p>
								<a href="./">Click here to redirect to home page</a> <br>
								<span id="timer"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<?php 
} else {
  	echo "<h1>";
	  echo "You are in the wrong page, click 'Home' to redirect";
	  echo "</h1>";
  }

 ?>


