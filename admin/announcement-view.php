<?php 
	require_once("../include/functions.php");

	if (isset($_REQUEST['id'])) {
		$id 	= intval($_REQUEST['id']);
		$data 	= get_data("iprs_announcement", "*", "id = '$id'");
?>

		<div class="table-responsive">
           	<table class="table table-hover table-centered m-0">

				<?php foreach ($data as $row) { ?>
	        		<tr>
	        			<td width="30%"><i>Title</i></td>
	        			<td width="70%"><?php echo $row["title"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Content</i></td>
	        			<td width="70%"><?php echo $row["text"]; ?></td>
	        		</tr>
	        		
	        		<?php
                        if($row['active'] == 'yes') $active = "<span class='badge badge-success'>Active</span>";
                        if($row['active'] == 'no') $active = "<span class='badge badge-danger'>Not Active</span>";
                    ?>

                    <tr>
	        			<td width="30%"><i>Stats</i></td>
	        			<td width="70%"><?php echo $active; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Created Time</i></td>
	        			<td width="70%"><?php echo show_date($row['input_date']); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Expired Time</i></td>
	        			<td width="70%"><?php echo show_date($row['until_date']); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Craeted By</i></td>
	        			<td width="70%"><?php echo $row["username"]; ?></td>
	        		</tr>

	        		<?php
	        			if($row['updated_by'] == null) $updated_by = "NoBody";
			        	else $updated_by = $row['updated_by'];

			        	if($row['updated_date'] == "0000-00-00 00:00:00") $updated_date = "Not Yet";
			        	else $updated_date = show_datetime($row['updated_date']);
	        		?>

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