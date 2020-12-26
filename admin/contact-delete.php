<?php
	require_once("../include/functions.php"); 
	header('Content-type: application/json; charset=UTF-8');

	$response = array();

	if ($_POST['delete']) {
		$id = intval($_POST['delete']);

		$db->bind("id", $id);

		$query = "DELETE FROM iprs_staff WHERE id = :id";
		$process = $db->query($query);

		if ($process) {
			$response['message'] 	= "The contact person has been deleted";
			$response['status'] 	= "success";
			log_system($_SESSION['username'], "admin", "delete", "Deleted contact person (ID: ". $id .").");
		}
		else {
			$response['message']	= "Unable to delete contact person ...";
			$response['status'] 	= "error";
			log_system($_SESSION['username'], "admin", "error", "Unable to delete contact person (ID: ". $id .").");
		}
		echo json_encode($response);
	}
?>