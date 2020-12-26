<?php 
	require_once("../include/functions.php");

	if (isset($_REQUEST['id'])) {
		$id 	= intval($_REQUEST['id']);
		$data 	= get_data("iprs_proposal", "*", "id = '$id'");
?>

		<div class="table-responsive">
           	<table class="table table-hover table-centered m-0">

				<?php foreach ($data as $row) { ?>
	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Event Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Name</i></td>
	        			<td width="70%"><?php echo $row["event_name"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Type</i></td>
	        			<td width="70%"><?php echo $row["event_type"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Description</i></td>
	        			<td width="70%"><?php echo $row["event_desc"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Time</i></td>
	        			<td width="70%"><?php echo show_date($row["event_time"]); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Target</i></td>
	        			<td width="70%"><?php echo $row["event_target"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>PIC</i></td>
	        			<td width="70%"><?php echo $row["event_pic"]; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Contact Person</i></td>
	        			<td width="70%"><?php echo $row["event_cp"]; ?></td>
	        		</tr>
	        		<tr></tr>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Stakeholders</strong></th>
	        		<?php for ($i = 1; $i <= 5; $i++) { ?>
	        			<tr>
	        				<?php if ($row["relation".$i] == null) {
	        					$relation = "No Relation";
	        				} else {
	        					$relation = $row["relation".$i];
	        				} ?>
	        				<?php if (!empty($row["stakeholder".$i])) { ?>
	        					<td width="30%"><i><?php echo $i.'. '. $relation; ?></i></td>
			        			<td width="70%"><?php echo $row["stakeholder".$i]; ?></td>
			        		<?php } ?>
	        			</tr>
	        		<?php } ?>

		        	<?php 
		        	if($row['stats'] == "approve") $stats = "<span class='badge badge-success'>Approve</span>";
		        	if($row['stats'] == "disapprove") $stats = "<span class='badge badge-danger'>Disapprove</span>";

		        	if($row['approved_by'] == null) $approved_by = "NoBody";
		        	else $approved_by = $row['approved_by'];

		        	if($row['approved_date'] == "0000-00-00 00:00:00") $approved_date = "Not Yet";
		        	else $approved_date = show_datetime($row['approved_date']);

		        	if($row['updated_by'] == null) $updated_by = "NoBody";
		        	else $updated_by = $row['updated_by'];

		        	if($row['updated_date'] == "0000-00-00 00:00:00") $updated_date = "Not Yet";
		        	else $updated_date = show_datetime($row['updated_date']);
		        	?>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  Proposal Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Stats</i></td>
	        			<td width="70%"><?php echo $stats; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Approved By</i></td>
	        			<td width="70%"><?php echo $approved_by; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Approved Date</i></td>
	        			<td width="70%"><?php echo $approved_date; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Updated By</i></td>
	        			<td width="70%"><?php echo $updated_by; ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Updated Date</i></td>
	        			<td width="70%"><?php echo $updated_date; ?></td>
	        		</tr>

        			<?php $download = "location.href='../upload/proposal/". $row['file_name'] ."'"; ?>

	        		<th class="thead-dark" colspan="3" align="center"><strong>—  File Information</strong></th>
	        		<tr>
	        			<td width="30%"><i>Uploaded Date</i></td>
	        			<td width="70%"><?php echo show_datetime($row['input_date']); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>Size</i></td>
	        			<td width="70%"><?php echo size($row['file_size']); ?></td>
	        		</tr>
	        		<tr>
	        			<td width="30%"><i>File Name</i></td>
	        			<td width="70%"><button type="button" onclick="<?php echo $download; ?>" class="btn btn-icon waves-effect waves-light btn-custom" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-custom" title="" data-original-title="Download"><i class="mdi mdi-download"></i> <?php echo $row['file_name']; ?></button></td>
	        		</tr>

        		<?php } ?>

        	</table>
        </div>
        
	<?php } ?>