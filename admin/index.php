<?php 
	require_once("../include/functions.php");
	if(!logged_in() && ($_SESSION['level'] != "developer" || $_SESSION['level'] != "admin")) {
		header("Location: ../404");
	}
	else {
		header("Location: ./dashboard");
	}
?>