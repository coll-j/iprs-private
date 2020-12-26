<?php
	require_once("../include/functions.php"); 
	header('Content-type: application/json; charset=UTF-8');

	$response = array();

	if ($_POST['delete']) {
		$id = intval($_POST['delete']);

		$db->bind("id", $id);

		$query = "DELETE FROM iprs_changelog WHERE id = :id";
		$process = $db->query($query);

		if ($process) {
			$response['message'] 	= "The changelog has been deleted";
			$response['status'] 	= "success";
			log_system($_SESSION['username'], "admin", "delete", "Deleted changelog (ID: ". $id .").");
		}
		else {
			$response['message']	= "Unable to delete changelog ...";
			$response['status'] 	= "error";
			log_system($_SESSION['username'], "admin", "error", "Unable to delete changelog (ID: ". $id .").");
		}
		echo json_encode($response);
	}
?>