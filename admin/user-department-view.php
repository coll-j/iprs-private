<?php 
	require_once("../include/functions.php");

	if (isset($_REQUEST['id'])) {
		$id 	= intval($_REQUEST['id']);
		$data = get_data("iprs_department a INNER JOIN iprs_faculty b ON a.`faculty` = b.`id`", "a.`id` as id, a.`faculty` as faculty_id, a.`name` as name, a.`slug` as slug, a.`active` as active, a.`created_by` as created_by, a.`created_date` as created_date, a.`updated_by` as updated_by, a.`updated_date` as updated_date, a.`revision` as revision, b.`id` as faculty_id, b.`name` as faculty_name", "a.`id` = '$id'");
?>

		<div class="table-responsive">
           	<table class="table table-hover table-centered m-0">

				<?php foreach ($data as $row) { ?>
	        		<tr>
	        			<td width="30%"><i>Name</i></td>
	        			<td width="70%"><?php echo $row["name"]; ?></td>
	        		</tr>

	        		<tr>
	        			<td width="30%"><i>Slug</i></td>
	        			<td width="70%"><?php echo $row["slug"]; ?></td>
	        		</tr>

	        		<tr>
	        			<td width="30%"><i>Faculty</i></td>
	        			<td width="70%"><?php echo $row["faculty_name"]; ?></td>
	        		</tr>

	        		<?php 
	        			if($row['active'] == 'yes') $stats = "<span class='badge label-table badge-success'>Active</span>";
	        			if($row['active'] == 'no') $stats = "<span class='badge label-table badge-danger'>Deactive</span>";

	        			if($row['updated_by'] == null) $updated_by = "NoBody";
			        	else $updated_by = $row['updated_by'];

			        	if($row['updated_date'] == "0000-00-00 00:00:00") $updated_date = "Not Yet";
			        	else $updated_date = show_datetime($row['updated_date']);
	        		?>

	        		<tr>
	        			<td width="30%"><i>Stats</i></td>
	        			<td width="70%"><?php echo $stats; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Created By</i></td>
	        			<td width="70%"><?php echo $row["created_by"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Created Date</i></td>
	        			<td width="70%"><?php echo show_datetime($row["created_date"]); ?></td>
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
	        			<td width="70%"><?php echo $row["revision"]; ?></td>
	        		</tr>

        		<?php } ?>

        	</table>
        </div>
        
	<?php } ?>