<?php 
	require_once("../include/functions.php");

	if (isset($_REQUEST['id'])) {
		$id 	= intval($_REQUEST['id']);
		$data 	= get_data("iprs_changelog", "*", "id = '$id'");
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
	        			<td width="70%"><?php echo $row["content"]; ?></td>
	        		</tr>
                    <tr>
	        			<td width="30%"><i>Version</i></td>
	        			<td width="70%"><?php echo $row['version']; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Release Date</i></td>
	        			<td width="70%"><?php echo show_date($row['date']); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Craeted By</i></td>
	        			<td width="70%"><?php echo $row["created_by"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Created Date</i></td>
	        			<td width="70%"><?php echo show_datetime($row['created_date']); ?></td>
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