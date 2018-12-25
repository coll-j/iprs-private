<?php
	require_once("include/functions.php"); 
	header('Content-type: application/json; charset=UTF-8');

	$response = array();

	if ($_POST['delete']) {
		$id = intval($_POST['delete']);

		$db->bind("id", $id);

		$query = "DELETE FROM iprs_proposal WHERE id = :id";
		$process = $db->query($query);

		if ($process) {
			$response['message'] 	= "Your proposal has been deleted";
			$response['status'] 	= "success";

			log_system($_SESSION['username'], "proposal", "delete", "Deleted proposal (ID: ". $id .").");
		}
		else {
			$response['message']	= "Unable to delete product ...";
			$response['status'] 	= "error";
		}
		echo json_encode($response);
	}
?>