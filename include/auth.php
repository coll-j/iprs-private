<?php
	require_once("functions.php");
	if(!isset($_SESSION["username"])) header("Location: ../iprs/login");
?>