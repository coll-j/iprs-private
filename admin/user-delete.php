<?php
	require_once("../include/functions.php"); 
	header('Content-type: application/json; charset=UTF-8');

	$response = array();

	if ($_POST['delete']) {
		$id = intval($_POST['delete']);

		$db->bind("id", $id);
		$query = "SELECT username FROM iprs_user WHERE id = :id";
		$data = $db->query($query);
		foreach ($data as $row) {
			$username = $row['username'];
		}

		$db->bind("id", $id);
		$query = "DELETE FROM iprs_user WHERE id = :id";
		$process = $db->query($query);

		if ($process) {
			$db->bind("id", $id);
			$query = "DELETE FROM iprs_contact WHERE id = :id";
			$process = $db->query($query);

			$db->bind("username", "$username");
			$query = "DELETE FROM iprs_password_stats WHERE username = :username";
			$process = $db->query($query);

			if($process) {
				$response['message'] 	= "The user has been deleted";
				$response['status'] 	= "success";
				log_system($_SESSION['username'], "admin", "delete", "Deleted user (ID: ". $id .").");
			}
			else {
				$response['message']	= "Unable to delete user ...";
				$response['status'] 	= "error";
				log_system($_SESSION['username'], "admin", "error", "Unable to delete user (ID: ". $id .").");
			}
		}
		else {
			$response['message']	= "Unable to delete user ...";
			$response['status'] 	= "error";
			log_system($_SESSION['username'], "admin", "error", "Unable to delete user (ID: ". $id .").");	
		}
		echo json_encode($response);
	}
?>