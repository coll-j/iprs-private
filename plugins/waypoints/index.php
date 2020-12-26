<?php
	require_once("../../include/functions.php");
	if(!logged_in()) header("Location: ./login");
	else header("Location: ./dashboard");
?>