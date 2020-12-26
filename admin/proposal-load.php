<?php 
	require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    echo "<!-- Tooltipster css -->";
	echo "<link rel='stylesheet' href='../". $plugins_folder ."/tooltipster/tooltipster.bundle.min.css'>";

	/**
	*	LOAD MORE FILES
	*	Ajax load more proposal files
	*
	*/
	if($_POST['id']) {
		$id = intval($_POST['id']);

		$query = "SELECT COUNT(*) as num_rows FROM iprs_proposal WHERE id < $id ORDER BY id DESC";
		$data = $db->query($query);
		foreach($data as $row) {
			$total = $row['num_rows'];
		}
		$limit = 6;
		$location = "../upload/proposal/";

		$query = "SELECT * FROM iprs_proposal WHERE id < $id ORDER BY id DESC LIMIT $limit";
		$get = $db->query($query);

		echo "<div class='row'>";
		if($get) {
			foreach ($get as $list) {
				$id = $list['id'];
			?>
			
				<div class="col-lg-3 col-xl-2">
		            <div class="file-man-box" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $list['event_name']; ?>" title="<?php echo $list['event_name']; ?>">
		                <div class="file-img-box">
		                    <img src="../<?php echo $assets_folder; ?>/images/file_icons/pdf.svg" alt="icon">
		                </div>
		                <a href="<?php echo $location.$list['file_name']; ?>" class="file-download"><i class="mdi mdi-download"></i> </a>
		                <div class="file-man-title">
		                    <h5 class="mb-0 text-overflow"><?php echo $list['file_name']; ?></h5>
		                    <p class="mb-0"><small><?php echo size($list['file_size']); echo $id." ".$limit; ?></small></p>
		                </div>
		            </div>
		        </div>

			<?php } ?>
		<?php } ?>
		</div>
		<?php if ($total > $limit) { ?>
			<div class="text-center mt-3 show_more_main" id="show_more_main<?php echo $id; ?>">
                <button type="button" class="btn btn-outline-danger w-md waves-effect waves-light show_more" id="<?php echo $id; ?>"><i class="mdi mdi-refresh"></i> Load More Files</button>
                <button type="button" class="btn btn-outline-danger w-md waves-effect waves-light loading" style="display: none;"><i class="mdi mdi-refresh"></i> Loading...</button>
            </div>
		<?php 
		}
	}
?>

<!-- Tooltipster js -->
<script src="../<?php echo $plugins_folder; ?>/tooltipster/tooltipster.bundle.min.js"></script>
<script src="../<?php echo $assets_folder; ?>/pages/jquery.tooltipster.js"></script>