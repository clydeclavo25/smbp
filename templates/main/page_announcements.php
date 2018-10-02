<section id="announcements-main">
	<div class="wow fadeInDown">
		<div class="center">
			<h2 class='test'>Announcements
			</h2>
		</div>
		<div class="row myrow"> 
			<div class="container">
				<div class="col-lg-3">
				<ul id="announcement-year">
				<?php 
					for ($ctr=$max_year; $ctr >= $min_year ; $ctr--) { 
						?>

						<li class="
						<?php if ($ctr==$selectedyear) {echo "active"; } ?>" >
						
						<?php 
						echo "<a href='?year=";
						echo $ctr."'>".$ctr."</a>";
						 ?>

						</li>

				<?php
					}
				 ?>
				</ul>
				</div>	
			<div class="col-lg-9">
			
				<?php 
					if ($selectedyear == "") {
						?>
						<div class="center">
							<h3>
								Please select year
							</h3>
						</div>

				<?php
					} else {
				 ?>

				 		<div id="announcement-container">
				 		<?php if (isset($_GET['id']) and $_GET['id'] != "") {  ?>

				 		<div class="announcement-box">
				 			<b><?php echo $single_announcement['title']; ?></b><br><br>
				 			Date Posted: 
				 			<?php 
				 			$date_posted = date_create($single_announcement['date_posted']);
							$date_posted =  date_format($date_posted,"F d, Y"); 
							echo "<em>".$date_posted."</em>";
							echo "<br>";
							echo "<br>";
							echo "<p>";
							echo $single_announcement['content'];
							echo "</p>";
				 			 ?>
				 		</div>
				 

				 		<?php	}	else { ?>

					 			<table class="table" id="tbl_announcements" >
					 		 		<tbody>
						 		 		 <?php foreach ($get_announcements as $row) : ?>
								 			<tr >
								 				<td>
								 					<?php 
								 					$date_posted = date_create($row['date_posted']);
								 					$date_posted =  date_format($date_posted,"F d, Y"); 
								 					echo "<a href='?year=".$selectedyear."&id=";
								 					echo $row['id']."'>";
								 					echo $row['title']."</a> <br><br>";
								 					echo $date_posted;
								 					 ?>
								 				</td>
								 			</tr>
								 			<?php endforeach ?>
						 		 	</tbody>
						 		</table>

						 <?php } ?>

				 		</div>


				 <?php } ?>
			</div>
			</div>
		</div>
	</div>
</section>