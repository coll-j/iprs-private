<?php session_start();
// session_destroy();
	unset(
		$_SESSION["username"],
		$_SESSION["name"],
		$_SESSION["level"],
		$_SESSION["email"],
		$_SESSION["photo"]
	);
	
	header("Location: ./index");
	die();
?>