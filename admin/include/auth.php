<?php
	require_once("../include/functions.php");
	if(!isset($_SESSION["username"]) && !isset($_SESSION['level']) && ($_SESSION['level'] != "admin" || $_SESSION['level'] != "developer")) header("Location: ../404");
?>