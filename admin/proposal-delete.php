<?php
	require_once("../include/functions.php"); 
	header('Content-type: application/json; charset=UTF-8');

	$response = array();
	$location = "../upload/proposal/";

	if ($_POST['delete']) {
		$id = intval($_POST['delete']);

		$db->bind("id", $id);
		$query = "SELECT file_name FROM iprs_proposal WHERE id = :id";
		$data = $db->query($query);
		foreach ($data as $row) {
			$file_name = $row['file_name'];
		}

		/*$location = "../upload/proposal/";
		unlink($location.$file_name);
		if(file_exists($location.$file_name)) {
			unlink($location.$file_name);
		}*/

		$db->bind("id", $id);
		$query = "DELETE FROM iprs_proposal WHERE id = :id";
		$process = $db->query($query);

		if ($process) {
			unlink($location.$file_name);
			$response['message'] 	= "Your proposal has been deleted";
			$response['status'] 	= "success";
			log_system($_SESSION['username'], "admin", "delete", "Deleted proposal (ID: ". $id .").");
		}
		else {
			$response['message']	= "Unable to delete proposal ...";
			$response['status'] 	= "error";
			log_system($_SESSION['username'], "admin", "error", "Unable to delete proposal (ID: ". $id .").");
		}
		echo json_encode($response);
	}
?>