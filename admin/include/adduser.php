<?php
/**
*	FUNCTION ADMIN PROCESS SYSTEM
*	Used to process all data from form.
*	For examples to check login.
*	
*/

	require_once('../../include/lib/db.class.php');
	require_once('../../include/functions.php');
	require_once('../../include/config.php');
	$db = new DB();

	// GET ACTION PROCESS
	$get_action = $_GET["get_action"];

	/**
	*	ADD USER
	*	Add an user by admin
	*	
	*/
	if ($get_action == "add_user") {
		$editor 	= $_GET['editor'];
		$username 	= addslashes(strtolower($_GET["username"]));
		$salt 		= hash("SHA256", rand());
		$password 	= hash("SHA512", $_GET["password"].$salt);

		$name		= $_GET['name'];
		$email 		= $_GET['email'];
		$level 		= $_GET['level'];
		$active		= "yes";
		$form 		= "active";
		$photo 		= "avatar.png";

		$address 	= $_GET['address'];
		$phone 		= $_GET['phone'];
		$lineid 	= $_GET['lineid'];
		$website 	= $_GET['website'];
		$facebook 	= $_GET['facebook'];
		$twitter 	= $_GET['twitter'];
		$instagram 	= $_GET['instagram'];

		// Bind parameter to query
		$db->bindMore(array(
			"id" 			=> "",
			"username" 		=> "$username",
			"name"			=> "$name",
			"password"		=> "$password",
			"salt"			=> "$salt",
			"email"			=> "$email",
			"level"			=> "$level",
			"active"		=> "$active",
			"photo"			=> "$photo",
			"form"			=> "$form",
			"created_by"	=> "$editor",
			"created_date"	=> get_date(),
			"updated_by"	=> "",
			"updated_date"	=> "",
			"revision"		=> 0
		));

		// Execute the query
		$query	= "INSERT INTO iprs_user VALUES (:id, :username, :name, :password, :salt, :email, :level, :active, :photo, :form, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$datas	= $db->query($query);

		// Get the last ID from query
		$id = $db->lastInsertId();

		if($id != "") {
			// Save user contact information
			$db->bindMore(array(
				"id"			=> $id,
				"address"		=> "$address",
				"phone"			=> "$phone",
				"website" 		=> "$website",
				"instagram"		=> "$instagram",
				"lineid"		=> "$lineid",
				"facebook"		=> "$facebook",
				"twitter"		=> "$twitter",
				"created_by"	=> "$editor",
				"created_date"	=> get_date(),
				"updated_by"	=> "",
				"updated_date"	=> "",
				"revision"		=> 0
			));

			$query 	= "INSERT INTO iprs_contact VALUES (:id, :address, :phone, :website, :instagram, :lineid, :facebook, :twitter, :created_by, :created_date, :updated_by, :updated_date, :revision)";
			$datas	= $db->query($query);

			// Save user contact information
			$db->bindMore(array(
				"id"			=> $id,
				"username" 		=> "$username",
				"password"		=> "$_POST[password]",
				"stats"			=> "not changed",
				"created_by"	=> "$editor",
				"created_date"	=> get_date(),
				"updated_by"	=> "",
				"updated_date"	=> "",
				"revision"		=> 0
			));
			$query 	= "INSERT INTO iprs_password_stats VALUES (:id, :username, :password, :stats, :created_by, :created_date, :updated_by, :updated_date, :revision)";
			$datas	= $db->query($query);

			if($datas) {
				log_system($editor, "admin", "success", "Successfully added user ". $username ."!");
				$_SESSION["admin_info"] = "". $username ." has been successfully added!";
				header("Location: ../user-add");
				die();
			}
		}
		else {
			$_SESSION["admin_error"] = "Failed to add user! Query cannot save the data.";
			log_system($editor, "admin", "error", "Add user failed! Last ID not found.");
			header("Location: ../user-add");
			die();
		}
	}	
?>