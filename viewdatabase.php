<?php 
	require_once("include/functions.php");

	if (isset($_REQUEST['id'])) {
		$id 	= intval($_REQUEST['id']);
		$data 	= get_data("iprs_database", "*", "id = '$id'");
?>

		<div class="table-responsive">
           	<table class="table table-hover table-centered m-0">

				<?php foreach ($data as $row) { ?>
	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Person Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Name</i></td>
	        			<td width="70%"><?php echo $row["name"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Address</i></td>
	        			<td width="70%"><?php echo $row["address"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Phone</i></td>
	        			<td width="70%"><?php echo $row["phone"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Email</i></td>
	        			<td width="70%"><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Position</i></td>
	        			<td width="70%"><?php echo $row["position"]; ?></td>
	        		</tr>
	        		<tr></tr>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Company Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Name</i></td>
	        			<td width="70%"><?php echo $row['company']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Address</i></td>
	        			<td width="70%"><?php echo $row['comp_address']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Type</i></td>
	        			<td width="70%"><?php echo $row['comp_types']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Email</i></td>
	        			<td width="70%"><a href="mailto:<?php echo $row['comp_email']; ?>"><?php echo $row['comp_email']; ?></a></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Contact</i></td>
	        			<td width="70%"><?php echo $row['comp_contact']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Fax</i></td>
	        			<td width="70%"><?php echo $row['comp_fax']; ?></td>
	        		</tr>
	        		<tr></tr>

	        		<?php
	        			if($row['stats'] == "alumni") $stats = "<span class='badge badge-success'>Alumni</span>";
		        		if($row['stats'] == "non_alumni") $stats = "<span class='badge badge-danger'>Non Alumni</span>";

	        			if($row['department'] != null) {
		        			$data = get_data("iprs_department", "name", "slug = '$row[department]'");
		        			foreach ($data as $get) {
		        				$department = $get['name'];
		        			}
		        		}
		        		else $department = "Nothing, because not an alumni";

		        		if($row['generation'] != null) $generation = $row['generation'];
		        		else $generation = "----";
	        		?>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Alumni Stats</strong></th>
	        		<tr>
	        			<td width="30%"><i>Stats</i></td>
	        			<td width="70%"><?php echo $stats; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Department</i></td>
	        			<td width="70%"><?php echo $department; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Generation</i></td>
	        			<td width="70%"><?php echo $generation; ?></td>
	        		</tr>
	        		<tr></tr>

        			<?php
			        	if($row['updated_by'] == null) $updated_by = "NoBody";
			        	else $updated_by = $row['updated_by'];

			        	if($row['updated_date'] == "0000-00-00 00:00:00") $updated_date = "Not Yet";
			        	else $updated_date = show_datetime($row['updated_date']);
        			?>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Database Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Added By</i></td>
	        			<td width="70%"><?php echo $row['created_by']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Added Date</i></td>
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

        		<?php } ?>

        	</table>
        </div>
        
	<?php } ?>