<?php
include '../com/class_profile.php';
include '../com/config.php';

$profile = new Profile;
$get_profiles = $profile->get_all_profiles(1);

?>
	<table border='1px'>
		<thead>
			<tr>
				<th>USERNAME</th>
				<th>DATE REGISTERED</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($get_profiles as $row): ?>
				<tr>
					<td><?php echo $row['username'] ?></td>
					<td><?php echo $row['date_saved'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>


