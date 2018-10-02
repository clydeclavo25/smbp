<?php 
  require_once('../com/config.php');
  require_once('../com/class_message.php');
  $message = new Message;
  $id = $_GET['id'];
  $get_message = $message->get_message_by_id($_GET['id']);
  $is_read = $get_message['is_read'];
  if ($is_read == 0) {
  	$message->read_message($id);
  }

 ?>

<div class="modal-dialog modal-md">
	<div class="modal-content">
		<div class="modal-header">
			<h3 class="myh">Message</h3>
		</div>
		<div class="modal-body">
			<div class="row myrow">
				
			<div class="col-lg-12">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Sender</label>
						<input class="form-control" readonly="" type="text" value="<?php echo $get_message['name'] ?>" name="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Date sent</label>
						<input class="form-control" readonly="" type="text" value="<?php $date_sent = date_create($get_message['date_sent']); echo date_format($date_sent,"F d, Y"); ?>" name="">
					</div>
				</div>	
				<div class="col-lg-6">
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" readonly="" type="text" value="<?php echo $get_message['email'] ?>" name="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Contact No.</label>
						<input class="form-control" readonly="" type="text" value="<?php echo $get_message['phone'] ?>" name="">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Subject</label>
						<input class="form-control" readonly="" type="text" value="<?php echo $get_message['subject'] ?>" name="">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Message</label>
						<textarea rows="8" readonly="" class="form-control"><?php echo $get_message['message'] ?></textarea>
					</div>
				</div>
			</div>
			
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>