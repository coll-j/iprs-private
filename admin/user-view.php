<?php 
	require_once("../include/functions.php");

	if (isset($_REQUEST['id'])) {
		$id 	= intval($_REQUEST['id']);
		$data 	= get_data("iprs_user a INNER JOIN iprs_contact b ON a.`id` = b.`id`", "a.`username`, a.`name`, a.`email`, a.`level`, a.`active`, a.`photo`, a.`form`, a.`created_by`, a.`created_date`, a.`updated_by`, a.`updated_date`, a.`revision`, b.`address`, b.`phone`, b.`website`, b.`instagram`, b.`line`, b.`facebook`, b.`twitter`", "a.`id` = '$id' AND b.`id` = '$id'");
?>

		<div class="table-responsive">
           	<table class="table table-hover table-centered m-0">

				<?php foreach ($data as $row) { ?>
	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Account Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Photo Profile</i></td>
	        			<td width="70%"><img src="../upload/profile/<?php echo $row['photo']; ?>" alt="<?php echo $row['username']; ?>'s photo" class="thumb-lg rounded-circle"></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Name</i></td>
	        			<td width="70%"><?php echo $row["name"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Username</i></td>
	        			<td width="70%"><?php echo $row["username"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Email</i></td>
	        			<td width="70%"><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
	        		</tr>

	        		<?php
	        			if($row['level'] == "admin") $level = "<span class='badge badge-pink'>Administrator</span>";
                        if($row['level'] == "developer") $level = "<span class='badge badge-purple'>Developer</span>";
                        if($row['level'] == "user") $level = "<span class='badge badge-light'>Standard User</span>";
	        		?>

	        		<tr>
	        			<td width="30%"><i>Level</i></td>
	        			<td width="70%"><?php echo $level; ?></td>
	        		</tr>

	        		<?php
	        			if($row['active'] == 'yes') $active = "<span class='badge badge-success'>Yes</span>";
	        			if($row['active'] == 'no') $active = "<span class='badge badge-danger'>No</span>";

	        			if($row['form'] == 'active') $form = "<span class='badge badge-success'>Active</span>";
	        			if($row['form'] == 'deactive') $form = "<span class='badge badge-danger'>Deactive</span>";
	        		?>

	        		<tr>
	        			<td width="30%">Active</td>
	        			<td width="70%"><?php echo $active; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%">Proposal Form</td>
	        			<td width="70%"><?php echo $form; ?></td>
	        		</tr>

	        		<tr></tr>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Contact Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Address</i></td>
	        			<td width="70%"><?php echo $row['address']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Phone</i></td>
	        			<td width="70%"><?php echo $row['phone']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Line ID</i></td>
	        			<td width="70%"><?php echo $row['line']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Website</i></td>
	        			<td width="70%"><a href="http://<?php echo $row['website']; ?>" target="_blank"><?php echo $row['website']; ?></a></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Facebook</i></td>
	        			<td width="70%"><a href="http://www.facebook.com/<?php echo $row['facebook']; ?>" target="_blank"><?php echo $row['facebook']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Twitter</i></td>
	        			<td width="70%"><a href="http://twitter.com/<?php echo $row['twitter']; ?>" target="_blank"><?php echo $row['twitter']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Instagram</i></td>
	        			<td width="70%"><a href="http://www.instagram.com/<?php echo $row['instagram']; ?>" target="_blank"><?php echo $row['instagram']; ?></td>
	        		</tr>
	        		<tr></tr>

	        		<?php
	        			$proposal = get_data("iprs_proposal", "id, stats", "username = '$row[username]'");
	        			$total_proposal = count($proposal);
	        			$total_approved = 0;
	        			foreach ($proposal as $data) {
	        				if($data['stats'] == 'approve') $total_approved++;
	        			}

	        			$database = get_data("iprs_database", "id", "created_by = '$row[username]'");
	        			$total_database = count($database);

	        			$password = get_data("iprs_password_stats", "stats", "id = '$id'");
	        			foreach ($password as $pass) {
							if($pass['stats'] == 'changed') $pass_stats = "Has changed";
							if($pass['stats'] == 'not changed') $pass_stats = "Didn't change";
	        			}

	        			$login = get_data("iprs_log", "id", "username = '$row[username]'");
	        			$login_attempt = count($login);
	        			
	        			$last = get_data("iprs_log", "MAX(logdate) as last_login, ip", "username = '$row[username]'");
	        			foreach ($last as $get) {
	        				$last_login = $get['last_login'];
	        				$ip = $get['ip'];
	        			}
	        		?>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Log Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Prop Uploaded</i></td>
	        			<td width="70%"><?php echo $total_proposal; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Prop Approved</i></td>
	        			<td width="70%"><?php echo $total_approved; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Database Added</i></td>
	        			<td width="70%"><?php echo $total_database; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Password Stats</i></td>
	        			<td width="70%"><?php echo $pass_stats; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Login Attempt</i></td>
	        			<td width="70%"><?php echo $login_attempt; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Last Login</i></td>
	        			<td width="70%"><?php echo show_datetime($last_login); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>IP Address</i></td>
	        			<td width="70%"><?php echo $ip; ?></td>
	        		</tr>
	        		<tr></tr>

	        		<?php
	        			if($row['updated_by'] == null) $updated_by = "NoBody";
			        	else $updated_by = $row['updated_by'];

			        	if($row['updated_date'] == "0000-00-00 00:00:00") $updated_date = "Not Yet";
			        	else $updated_date = show_datetime($row['updated_date']);
	        		?>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Admin Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Created By</i></td>
	        			<td width="70%"><?php echo $row['created_by']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Created Date</i></td>
	        			<td width="70%"><?php echo show_datetime($row['created_date']); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Updated By</i></td>
	        			<td width="70%"><?php echo $updated_by; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Updated Date</i></td>
	        			<td width="70%"><?php echo $updated_date; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Revision</i></td>
	        			<td width="70%"><?php echo $row['revision']; ?></td>
	        		</tr>

        		<?php } ?>

        	</table>
        </div>
        
	<?php } ?>