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
	$action = $_POST["action"];

	/**
	*	AJAX CHECK USERNAME
	*	Check username is available or not
	*	
	*/
	if ($action == "ajax_check_username") {
		$username 		= $_POST["username"];
		$user_id	    = "";
		// $query          = "SELECT id_anggota FROM aluni_anggota_dasar WHERE nama_panggilan = '$nama_panggilan'";
		$query          = "SELECT username FROM iprs_user WHERE username = '$username'";
		$datas          = $db->query($query);
		foreach ($datas as $data) {
			// $id_anggota = $data["id_anggota"];
			$user_id = $data["username"];
		}
		if ($user_id != "") {
			$result = "'$username' is not available, please use another username.";
		} 
		else {
			$result = "";
		}
		echo $result;
	}

	/**
	*	AJAX CHECK USERNAME FOR EDIT USER
	*	Check username is available or not
	*	
	*/
	else if ($action == "ajax_check_edit_username") {
		$username 		= $_POST["username"];
		$last 			= $_POST["last"];
		$user_id	    = "";
		// $query          = "SELECT id_anggota FROM aluni_anggota_dasar WHERE nama_panggilan = '$nama_panggilan'";
		$query          = "SELECT * FROM iprs_user WHERE username = '$username'";
		$datas          = $db->query($query);
		foreach ($datas as $data) {
			// $id_anggota = $data["id_anggota"];
			$user_id = $data["username"];
		}
		if ($user_id != "") {
			if ($user_id == $last) {
				$result = "This username is currently used now.";
			}
			else {
				//$result = "'$username' is not available, please use another username.";
				$result = "This username is not available, please use another username.";
			}
		} 
		else {
			$result = "";
		}
		echo $result;
	}

	/**
	*	EDIT PROPOSAL
	*	Edit a proposal by admin
	*	
	*/
	else if ($action == "edit_proposal") {
		$id 			= $_POST['id'];
		$username 		= $_POST['username'];
		$stats			= $_POST['stats'];

		$event_name		= $_POST['event_name'];
		$event_desc 	= $_POST['event_desc'];
		$event_target	= $_POST['event_target'];
		$event_pic 		= $_POST['event_pic'];
		$event_cp 		= $_POST['event_cp'];

		$time 			= explode("/", $_POST['event_time']);
		$event_time 	= $time[2] .'-'. $time[0] .'-'. $time[1];

		$stakeholder1 	= $_POST['stakeholder1'];
		$stakeholder2	= $_POST['stakeholder2'];
		$stakeholder3 	= $_POST['stakeholder3'];
		$stakeholder4 	= $_POST['stakeholder4'];
		$stakeholder5	= $_POST['stakeholder5'];

		if($_POST['event_type'] != "Others") $event_type = $_POST['event_type'];
		else $event_type = $_POST['type_other'];

		if($_POST['relation1'] != "Other") $relation1 = $_POST['relation1'];
		else $relation1 = $_POST['relation1_other'];

		if($_POST['relation2'] != "Other") $relation2 = $_POST['relation2'];
		else $relation2 = $_POST['relation2_other'];

		if($_POST['relation3'] != "Other") $relation3 = $_POST['relation3'];
		else $relation3 = $_POST['relation3_other'];

		if($_POST['relation4'] != "Other") $relation4 = $_POST['relation4'];
		else $relation4 = $_POST['relation4_other'];

		if($_POST['relation5'] != "Other") $relation5 = $_POST['relation5'];
		else $relation5 = $_POST['relation5_other'];

		if($_POST['stats'] == "approve") {
			$approved_by = $username;
			$approved_date = get_date();
		}
		if($_POST['stats'] == "disapprove") {
			$approved_by = "";
			$approved_date = "";
		}

		$db->bindMore(array(
			"id"			=> $id,
			"event_name"	=> "$event_name",
			"event_type"	=> "$event_type",
			"event_desc"	=> "$event_desc",
			"event_time"	=> $event_time,
			"event_target"	=> "$event_target",
			"event_pic"		=> "$event_pic",
			"event_cp"		=> "$event_cp",
			"stakeholder1"	=> "$stakeholder1",
			"stakeholder2"	=> "$stakeholder2",
			"stakeholder3"	=> "$stakeholder3",
			"stakeholder4"	=> "$stakeholder4",
			"stakeholder5"	=> "$stakeholder5",
			"relation1"		=> "$relation1",
			"relation2"		=> "$relation2",
			"relation3"		=> "$relation3",
			"relation4"		=> "$relation4",
			"relation5"		=> "$relation5",
			"stats"			=> "$stats",
			"approved_by"	=> "$approved_by",
			"approved_date"	=> "$approved_date",
			"updated_by"	=> "$username",
			"updated_date"	=> get_date()
		));

		$query 	= "UPDATE iprs_proposal SET event_name = :event_name, event_type = :event_type, event_desc = :event_desc, event_time = :event_time, event_target = :event_target, event_pic = :event_pic, event_cp = :event_cp, stakeholder1 = :stakeholder1, stakeholder2 = :stakeholder2, stakeholder3 = :stakeholder3, stakeholder4 = :stakeholder4, stakeholder5 = :stakeholder5, relation1 = :relation1, relation2 = :relation2, relation3 = :relation3, relation4 = :relation4, relation5 = :relation5, stats = :stats, approved_by = :approved_by, approved_date = :approved_date, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $event_name ." has been updated.";
			log_system($username, "admin", "edit", "Edit proposal success! (ID: ". $id .")");
			header("Location: ../proposal-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Edit failed! Something wrong, query cannot save the data.";
			log_system($username, "admin", "error", "Edit proposal failed! Query cannot save the data (ID: ". $id .")");
			header("Location: ../proposal-list");
			die();
		}
	}

	/**
	*	EDIT DATABASE
	*	Edit a database by admin
	*	
	*/
	else if ($action == "edit_database") {
		$id 			= $_POST['id'];
		$username 		= $_POST['username'];
		$name 			= $_POST['name'];
		$address 		= $_POST['address'];
		$phone			= $_POST['phone'];
		$email 			= $_POST['email'];
		$position		= $_POST['position'];
		$company 		= $_POST['company'];
		$comp_address	= $_POST['comp_address'];
		$comp_email		= $_POST['comp_email'];
		$comp_contact	= $_POST['comp_contact'];
		$comp_fax		= $_POST['comp_fax'];
		$stats 			= $_POST['stats'];
		$department 	= $_POST['department'];
		$generation 	= $_POST['generation'];

		if ($_POST['comp_type'] != "Others") $comp_type = $_POST['comp_type'];
		else $comp_type = $_POST['comp_type_other'];

		$db->bindMore(array(
			"id"			=> $id,
			"name"			=> "$name",
			"phone"			=> "$phone",
			"address"		=> "$address",
			"position"		=> "$position",
			"email"			=> "$email",
			"company"		=> "$company",
			"comp_types"	=> "$comp_type",
			"comp_address"	=> "$comp_address",
			"comp_email"	=> "$comp_email",
			"comp_contact"	=> "$comp_contact",
			"comp_fax"		=> "$comp_fax",
			"stats"			=> "$stats",
			"department"	=> "$department",
			"generation"	=> $generation,
			"updated_by"	=> "$username",
			"updated_date"	=> get_date()
		));

		$query = "UPDATE iprs_database SET name = :name, phone = :phone, address = :address, position = :position, email = :email, company = :company, comp_types = :comp_types, comp_address = :comp_address, comp_email = :comp_email, comp_contact = :comp_contact, comp_fax = :comp_fax, stats = :stats, department = :department, generation = :generation, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $name ." has been updated.";
			log_system($username, "admin", "edit", "Edit database success! (ID ". $id .")");
			header("Location: ../database-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Edit failed! Something wrong, query cannot save the data.";
			log_system($username, "admin", "error", "Edit database failed! Query cannot save the data (ID: ". $id .")");
			header("Location: ../database-list");
			die();
		}
	}

	/**
	*	ADD DATABASE
	*	Add a database by admin
	*	
	*/
	else if ($action == "add_database") {
		$username 		= $_POST['username'];
		$name 			= $_POST['name'];
		$address 		= $_POST['address'];
		$phone			= $_POST['phone'];
		$email 			= $_POST['email'];
		$position		= $_POST['position'];
		$company 		= $_POST['company'];
		$comp_address	= $_POST['comp_address'];
		$comp_email		= $_POST['comp_email'];
		$comp_contact	= $_POST['comp_contact'];
		$comp_fax		= $_POST['comp_fax'];
		$stats 			= $_POST['stats'];
		$department 	= $_POST['department'];
		$generation 	= $_POST['generation'];

		if ($_POST['comp_type'] != "Others") $comp_type = $_POST['comp_type'];
		else $comp_type = $_POST['comp_type_other'];

		$db->bindMore(array(
			"id"			=> "",
			"name"			=> "$name",
			"phone"			=> "$phone",
			"address"		=> "$address",
			"position"		=> "$position",
			"email"			=> "$email",
			"company"		=> "$company",
			"comp_types"	=> "$comp_type",
			"comp_address"	=> "$comp_address",
			"comp_email"	=> "$comp_email",
			"comp_contact"	=> "$comp_contact",
			"comp_fax"		=> "$comp_fax",
			"stats"			=> "$stats",
			"department"	=> "$department",
			"generation"	=> $generation,
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by"	=> "",
			"updated_date"	=> "",
			"revision"		=> 0
		));

		$query = "INSERT INTO iprs_database VALUES (:id, :name, :phone, :address, :position, :email, :company, :comp_types, :comp_address, :comp_email, :comp_contact, :comp_fax, :stats, :department, :generation, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if ($process) {
			$_SESSION['admin_info'] = "Add database success! Your database has been successfully added.";
			log_system($username, "admin", "success", "Add database success! (". $name .")");
			header("Location: ../database-add");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Add database failed! Something wrong, query cannot save the data.";
			log_system($username, "admin", "error", "Add database failed! Query cannot save the data (". $name .")");
			header("Location: ../database-add");
			die();
		}
	}

	/**
	*	ADD USER
	*	Add an user by admin
	*	
	*/
	else if ($action == "add_user") {
		$editor 	= $_POST['editor'];
		$name 		= $_POST['name'];
		$username 	= addslashes($_POST['username']);
		$email 		= $_POST['email'];
		$level 		= $_POST['level'];
		$password 	= $_POST['password'];
		$confirm 	= $_POST['confirm-password'];

		$address 	= $_POST['address'];
		$phone 		= $_POST['phone'];
		$lineid 	= $_POST['lineid'];
		$website 	= $_POST['website'];
		$facebook 	= $_POST['facebook'];
		$twitter 	= $_POST['twitter'];
		$instagram 	= $_POST['instagram'];

		if ($password != $confirm) {
			$_SESSION['admin_error'] = "The password didn't match.";
			log_system($editor, "admin", "error", "The password of new user didn't match (Pass: ". $password .".");
			header("Location: ../user-add");
			die();
		}

		$salt 		= hash("SHA256", rand());
		$password 	= hash("SHA512", $password.$salt);
		$active 	= "yes";
		$form 		= "active";
		$photo 		= "avatar.png";

		$db->bindMore(array(
			"id"	 		=> "",
			"username"		=> "$username",
			"name" 			=> "$name",
			"password"		=> "$password",
			"salt"			=> "$salt",
			"email"			=> "$email",
			"level" 		=> "$level",
			"active"		=> "$active",
			"photo" 		=> "$photo",
			"form"			=> "$form",
			"created_by"	=> "$editor",
			"created_date"	=> get_date(),
			"updated_by"	=> "",
			"updated_date"	=> "",
			"revision" 		=> 0
		));

		$query 		= "INSERT INTO iprs_user VALUES (:id, :username, :name, :password, :salt, :email, :level, :active, :photo, :form, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process 	= $db->query($query);

		$id 		= $db->lastInsertId();

		if(!empty($id)) {
			$db->bindMore(array(
				"id" 			=> $id,
				"address" 		=> "$address",
				"phone" 		=> "$phone",
				"lineid" 		=> "$lineid",
				"website" 		=> "$website",
				"facebook"	 	=> "$facebook", 
				"twitter" 		=> "$twitter",
				"instagram" 	=> "$instagram",
				"created_by" 	=> "$editor",
				"created_date"	=> get_date(),
				"updated_by" 	=> "",
				"updated_date"	=> "",
				"revision" 		=> 0
			));

			$query 	= "INSERT INTO iprs_contact VALUES (:id, :address, :phone, :website, :instagram, :lineid, :facebook, :twitter, :created_by, :created_date, :updated_by, :updated_date, :revision)";
			$process = $db->query($query);

			$db->bindMore(array(
				"id" 			=> $id,
				"username" 		=> "$username",
				"password"		=> "$_POST[password]",
				"stats" 		=> "not changed",
				"created_by" 	=> "$editor",
				"created_date"	=> get_date(),
				"updated_by"	=> "",
				"updated_date"	=> "",
				"revision"		=> 0
			));

			$query 	= "INSERT INTO iprs_password_stats VALUES (:id, :username, :password, :stats, :created_by, :created_date, :updated_by, :updated_date, :revision)";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = "". $username ." has been successfully created!";
				log_system($editor, "admin", "success", "Successfully created user ". $username .".");
				header("Location: ../user-add");
				die();
			}
			else {
				$_SESSION['admin_error'] = "Failed to add user! Query cannot save the data.";
				log_system($editor, "admin", "error", "Failed to create user, because query cannot save the data (iprs_password_stats)");
				header("Location: ../user-add");
				die();
			}
		}
		else {
			$_SESSION['admin_error'] = "Failed to add user! The last ID is not found.";
			log_system($editor, "admin", "error", "Failed to add user, because the last ID is not found.");
			header("Location: ../user-add");
			die();
		}
	}

	/**
	*	EDIT ACCOUNT INFORMATION USER
	*	Edit account information of user by admin
	*	
	*/
	else if ($action == "edit_account_user") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$name		= $_POST['name'];
		$email 		= $_POST['email'];
		$level 		= $_POST['level'];
		$active 	= $_POST['active'];
		$form 		= $_POST['proposal-form'];
		$editor 	= $_POST['editor'];

		if (!preg_match("/^[A-Z][a-zA-Z -]+$/", $name)) {
			$_SESSION['admin_error'] = "Name must contain letters, dash, and space only!";
			log_system($editor, "admin", "error", "Failed change name because not contain letters, dash, or space (". $name .")");
			header("Location: ../user-edit/".$id);
			die();
		}

		$db->bindMore(array(
			"id"			=> $id,
			"username"		=> "$username",
			"name"			=> "$name",
			"email" 		=> "$email",
			"level" 		=> "$level",
			"active"		=> "$active",
			"form" 			=> "$form",
			"updated_by" 	=> "$editor",
			"updated_date" 	=> get_date()
		));
		$query = "UPDATE iprs_user SET name = :name, username = :username, email = :email, level = :level, active = :active, form = :form, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "". $username ."'s account information has been successfully changed.";
			log_system($editor, "admin", "edit", "". $username ."'s account information successfully changed.");
			header("Location: ../user-edit/".$id);
			die();
		}
		else {
			$_SESSION['admin_error'] = "Failed save to the database! Query cannot save the data.";
			log_system($editor, "admin", "error", "Failed edit account information because query cannot save the data (". $username .")");
			header("Location: ../user-edit/".$id);
			die();
		}
	}

	/**
	*	EDIT CONTACT INFORMATION USER
	*	Edit contact information of user by admin
	*	
	*/
	else if ($action == "edit_contact_user") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$address 	= $_POST['address'];
		$phone 		= $_POST['phone'];
		$lineid 	= $_POST['lineid'];
		$website 	= $_POST['website'];
		$facebook 	= $_POST['facebook'];
		$twitter 	= $_POST['twitter'];
		$instagram 	= $_POST['instagram'];

		$db->bind("id", $id);
		$query = "SELECT username FROM iprs_user WHERE id = :id";
		$data = $db->query($query);
		foreach ($data as $row) {
			$user = $row['username'];
		}

		if (!is_numeric($phone)) {
			$_SESSION['admin_error'] = "The phone number was entered is not numeric!";
			log_system($username, "admin", "error", "Edit failed! Phone number was entered is not numeric (". $phone .")");
			header("Location: ../user-edit/".$id);
			die();
		}

		$db->bindMore(array(
			"id" 			=> $id,
			"address" 		=> "$address",
			"phone" 		=> "$phone",
			"lineid" 		=> "$lineid",
			"website" 		=> "$website",
			"facebook"		=> "$facebook",
			"twitter" 		=> "$twitter",
			"instagram" 	=> "$instagram",
			"updated_by" 	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_contact SET address = :address, phone = :phone, `line` = :lineid, website = :website, facebook = :facebook, twitter = :twitter, instagram = :instagram, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if ($process) {
			$_SESSION['admin_info'] = "". $user ."'s contact information has been successfully changed.";
			log_system($username, "admin", "edit", "". $user ."'s contact information has been successfully changed.");
			header("Location: ../user-edit/".$id);
			die();
		}
		else {
			$_SESSION['admin_error'] = "Failed save to the database! Query cannot save the data.";
			log_system($username, "admin", "error", "Failed edit contact information because query cannot save the data (". $user .")");
			header("Location: ../user-edit/".$id);
			die();
		}
	}

	/**
	*	CHANGE PASSWORD USER
	*	Change password of user by admin
	*	
	*/
	else if ($action == "edit_password_user") {
		$id 			= $_POST['id'];
		$username 		= $_POST['username'];
		$new_pass		= $_POST['password'];
		$confirm_pass 	= $_POST['confirm-password'];

		// CHANGE PASSWORD PROCESS
		if ($new_pass != $confirm_pass) {
			$_SESSION['admin_error'] = "Password doesn't match, please input it again.";
			log_system($username, "admin", "error", "Change password failed because password doesn't match. (". $new_pass ." and ". $confirm_pass .")");
			header("Location: ../user-edit/".$id);
			die();
		}

		$db->bind("id", $id);
		$query = "SELECT username FROM iprs_user WHERE id = :id";
		$data = $db->query($query);
		foreach ($data as $row) {
			$user = $row['username'];
		}

		$new_salt	= hash("SHA256", rand());
		$final_pass	= hash("SHA512", $new_pass.$new_salt);

		$db->bindMore(array(
			"id"			=> $id,
			"password"		=> "$final_pass",
			"salt" 			=> "$new_salt",
			"updated_by"	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_user SET password = :password, salt = :salt, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$db->bindMore(array(
				"id"			=> $id,
				"password"		=> "",
				"stats"			=> "changed",
				"updated_by"	=> "$username",
				"updated_date"	=> get_date()
			));
			$query = "UPDATE iprs_password_stats SET password = :password, stats = :stats, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = "". $user ."'s password successfully changed! (new: ". $new_pass .")";
				log_system($username, "admin", "edit", "". $user ."'s password successfully changed (new: ". $new_pass .").");
				header("Location: ../user-edit/".$id);
				die();
			}
			else {
				$_SESSION['admin_error'] = "Change password failed! Query cannot save the data.";
				log_system($username, "admin", "error", "Change ". $user ."'s password failed because query cannot save the data (iprs_password_stats).");
				header("Location: ../user-edit/".$id);
				die();	
			}
		}
		else {
			$_SESSION['admin_error'] = "Change password failed! Query cannot save the data.";
			log_system($username, "admin", "error", "Change ". $user ."'s password failed because query cannot save the data (iprs_user).");
			header("Location: ../user-edit/".$id);
			die();
		}
	}

	/**
	*	UPLOAD PHOTO OF USER
	*	Upload photo profile of user by admin
	*	
	*/
	else if ($action == "upload_photo") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$editor 	= $_POST['editor'];

		// PHOTO
		$name_file	= $_FILES['photo']['name'];
		$size_file 	= $_FILES['photo']['size'];
		$tmp_file 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../../upload/profile/";
		$max_size 	= 1048576; // 1 MB

		$name_new	= rand(0, 10000).'_'.$username.'_'.$name_file;

		if (in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['admin_error'] = "Maximum file size of photo is 1 MB.";
				log_system($editor, "admin", "error", "Failed change photo because size is too large (". size($size_file) .").");
				header("Location: ../user-edit/".$id);
				die();
			}
		}
		else {
			$success = false;
			$_SESSION['admin_error'] = "Format file must be .jpeg, .jpg, .png, or .gif";
			log_system($editor, "admin", "error", "Failed change photo because format file not suitable (format: ". $ext_file .").");
			header("Location: ../user-edit/".$id);
			die();
		}

		if ($success) {
			$db->bindMore(array(
				"id"			=> $id,
				"username"		=> "$username",
				"photo"			=> "$name_new",
				"updated_by" 	=> "$editor",
				"updated_date" 	=> get_date()
			));
			$query = "UPDATE iprs_user SET photo = :photo, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id AND username = :username";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = "". $username ."'s account information has been successfully changed.";
				log_system($editor, "admin", "edit", "". $username ."'s account information successfully changed.");
				header("Location: ../user-edit/".$id);
				die();
			}
			else {
				$_SESSION['admin_error'] = "Failed save to the database! Query cannot save the data.";
				log_system($editor, "admin", "error", "Failed edit account information because query cannot save the data (". $username .")");
				header("Location: ../user-edit/".$id);
				die();
			}
		}
		else {
			$_SESSION['admin_error'] = "Failed! Because the photo cannot uploaded to the host.";
			log_system($editor, "admin", "error", "Failed change ". $username ."'s account information because the photo didn't want upload.");
			header("Location: ../user-edit/".$id);
			die();
		}
	}

	/**
	*	ADD EVENT TYPE
	*	Add new event type to proposal input
	*
	*/
	else if($action == "add_event_type") {
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id"			=> "",
			"name" 			=> "$name",
			"active" 		=> "$active",
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by" 	=> "",
			"updated_date" 	=> "",
			"revision" 		=> 0
		));
		$query = "INSERT INTO iprs_event_type VALUES (:id, :name, :active, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = $name." has been successfully created!";
			log_system($username, "admin", "success", "An event type has been added (Name: ". $name .")");
			header("Location: ../proposal-types");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to database (add_event_type).");
			header("Location: ../proposal-types");
			die();
		}
	}

	/**
	*	EDIT EVENT TYPE
	* 	Edit an event type of proposal input by admin
	*
	*/
	else if($action == "edit_event_type") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id" 			=> $id,
			"name" 			=> "$name",
			"active" 		=> "$active",
			"updated_by" 	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_event_type SET name = :name, active = :active, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $name ." has been updated.";
			log_system($username, "admin", "edit", "An event type has been updated (ID: ". $id .")");
			header("Location: ../proposal-types");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_event_type).");
			header("Location: ../proposal-types");
			die();
		}
	}

	/**
	*	ADD COMPANY TYPE
	*	Add new company type to database input
	*
	*/
	else if($action == "add_company_type") {
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id"			=> "",
			"name" 			=> "$name",
			"active" 		=> "$active",
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by" 	=> "",
			"updated_date" 	=> "",
			"revision" 		=> 0
		));
		$query = "INSERT INTO iprs_comp_type VALUES (:id, :name, :active, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = $name." has been successfully created!";
			log_system($username, "admin", "success", "A company type has been added (Name: ". $name .")");
			header("Location: ../database-company");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to database (add_company_type).");
			header("Location: ../database-company");
			die();
		}
	}

	/**
	*	EDIT COMPANY TYPE
	* 	Edit a company type of database input by admin
	*
	*/
	else if($action == "edit_company_type") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id" 			=> $id,
			"name" 			=> "$name",
			"active" 		=> "$active",
			"updated_by" 	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_comp_type SET name = :name, active = :active, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $name ." has been updated.";
			log_system($username, "admin", "edit", "A company type has been updated (ID: ". $id .")");
			header("Location: ../database-company");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_company_type).");
			header("Location: ../database-company");
			die();
		}
	}

	/**
	*	ADD FACULTY
	*	Add new faculty
	*
	*/
	else if($action == "add_faculty") {
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$slug 		= $_POST['slug'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id"			=> "",
			"name" 			=> "$name",
			"slug"			=> "$slug",
			"active" 		=> "$active",
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by" 	=> "",
			"updated_date" 	=> "",
			"revision" 		=> 0
		));
		$query = "INSERT INTO iprs_faculty VALUES (:id, :name, :slug, :active, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = $name." has been successfully created!";
			log_system($username, "admin", "success", "A faculty has been added (Name: ". $name .")");
			header("Location: ../user-faculty");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to database (add_faculty).");
			header("Location: ../user-faculty");
			die();
		}
	}

	/**
	*	EDIT FACULTY
	* 	Edit a faculty by admin
	*
	*/
	else if($action == "edit_faculty") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$slug 		= $_POST['slug'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id" 			=> $id,
			"name" 			=> "$name",
			"slug" 			=> "$slug",
			"active" 		=> "$active",
			"updated_by" 	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_faculty SET name = :name, slug = :slug, active = :active, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $name ." has been updated.";
			log_system($username, "admin", "edit", "A faculty has been updated (ID: ". $id .")");
			header("Location: ../user-faculty");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_faculty).");
			header("Location: ../user-faculty");
			die();
		}
	}

	/**
	*	ADD DEPARTMENT
	*	Add new department
	*
	*/
	else if($action == "add_department") {
		$username 	= $_POST['username'];
		$faculty 	= $_POST['faculty'];
		$name 		= $_POST['name'];
		$slug 		= $_POST['slug'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id"			=> "",
			"faculty"		=> $faculty,
			"name" 			=> "$name",
			"slug"			=> "$slug",
			"active" 		=> "$active",
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by" 	=> "",
			"updated_date" 	=> "",
			"revision" 		=> 0
		));
		$query = "INSERT INTO iprs_department VALUES (:id, :faculty, :name, :slug, :active, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = $name." has been successfully created!";
			log_system($username, "admin", "success", "A department has been added (Name: ". $name .")");
			header("Location: ../user-department");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to database (add_department).");
			header("Location: ../user-department");
			die();
		}
	}

	/**
	*	EDIT DEPARTMENT
	* 	Edit a deparment by admin
	*
	*/
	else if($action == "edit_department") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$faculty 	= $_POST['faculty'];
		$name 		= $_POST['name'];
		$slug 		= $_POST['slug'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id" 			=> $id,
			"faculty" 		=> $faculty,
			"name" 			=> "$name",
			"slug" 			=> "$slug",
			"active" 		=> "$active",
			"updated_by" 	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_department SET faculty = :faculty, name = :name, slug = :slug, active = :active, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $name ." has been updated.";
			log_system($username, "admin", "edit", "A department has been updated (ID: ". $id .")");
			header("Location: ../user-department");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_department).");
			header("Location: ../user-department");
			die();
		}
	}

	/**
	*	ADD ANNOUNCEMENT
	*	Add new announcement
	*
	*/
	else if($action == "add_announcement") {
		$username 	= $_POST['username'];
		$title	 	= $_POST['title'];
		$text 		= $_POST['content'];
		$active 	= $_POST['active'];

		$time 			= explode("/", $_POST['expired_date']);
		$expired_date	= $time[2] .'-'. $time[0] .'-'. $time[1];

		$db->bindMore(array(
			"id"			=> "",
			"username"		=> "$username",
			"input_date" 	=> get_date(),
			"until_date"	=> "$expired_date",
			"title"			=> "$title",
			"text" 			=> "$text",
			"active" 		=> "$active",
			"updated_by" 	=> "",
			"updated_date" 	=> "",
			"revision" 		=> 0
		));
		$query = "INSERT INTO iprs_announcement VALUES (:id, :username, :input_date, :until_date, :title, :text, :active, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = $title." has been successfully created!";
			log_system($username, "admin", "success", "An announcement has been added (Title: ". $title .").");
			header("Location: ../announcement-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to database (add_announcement).");
			header("Location: ../announcement-list");
			die();
		}
	}

	/**
	*	EDIT ANNOUNCEMENT
	* 	Edit an announcement by admin
	*
	*/
	else if($action == "edit_announcement") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$title	 	= $_POST['title'];
		$text 		= $_POST['content'];
		$active 	= $_POST['active'];

		$time 			= explode("/", $_POST['expired_date']);
		$expired_date	= $time[2] .'-'. $time[0] .'-'. $time[1];

		$db->bindMore(array(
			"id" 			=> $id,
			"until_date"	=> "$expired_date",
			"title"			=> "$title",
			"text" 			=> "$text",
			"active" 		=> "$active",
			"updated_by" 	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_announcement SET until_date = :until_date, title = :title, text = :text, active = :active, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $title ." has been updated.";
			log_system($username, "admin", "edit", "An announcement has been updated (ID: ". $id .")");
			header("Location: ../announcement-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_announcement).");
			header("Location: ../announcement-list");
			die();
		}
	}

	/**
	* 	ADD FAQ
	*	Add a frequently asked question
	*
	*/
	else if ($action == "add_faq") {
		$username 	= $_POST['username'];
		$question 	= $_POST['question'];
		$answer 	= $_POST['answer'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id" 			=> "",
			"question"		=> "$question",
			"answer" 		=> "$answer",
			"active"		=> "$active",
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by"	=> "",
			"updated_date"	=> "",
			"revision"		=> 0
		));
		$query = "INSERT INTO iprs_faq VALUES (:id, :question, :answer, :active, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = $question." has been successfully created!";
			log_system($username, "admin", "success", "A FAQ has been added (Question: ". $question .")");
			header("Location: ../faq-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (add_faq).");
			header("Location: ../faq-list");
			die();
		}
	}

	/**
	*	EDIT FAQ
	* 	Edit a frequently asked question by admin
	*
	*/
	else if($action == "edit_faq") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$question 	= $_POST['question'];
		$answer 	= $_POST['answer'];
		$active 	= $_POST['active'];

		$db->bindMore(array(
			"id" 			=> $id,
			"question"		=> "$question",
			"answer"		=> "$answer",
			"active" 		=> "$active",
			"updated_by"	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_faq SET question = :question, answer = :answer, active = :active, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $question ." has been updated.";
			log_system($username, "admin", "edit", "A FAQ has been updated (ID: ". $id .")");
			header("Location: ../faq-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_faq)");
			header("Location: ../faq-list");
			die();
		}
	}

	/**
	* 	ADD CONTACT PERSON
	*	Add a contact person
	*
	*/
	else if ($action == "add_contact") {
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$position	= $_POST['position'];
		$active 	= $_POST['active'];
		$whatsapp	= "+62".$_POST['whatsapp'];
		$lineid 	= $_POST['lineid'];
		$facebook	= $_POST['facebook'];
		$twitter 	= $_POST['twitter'];
		$instagram 	= $_POST['instagram'];

		// PHOTO
		$name_file	= $_FILES['photo']['name'];
		$size_file 	= $_FILES['photo']['size'];
		$tmp_file 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../../upload/contact/";
		$max_size 	= 1048576; // 1 MB

		$name_new	= rand(0, 10000).'_'.$id.'_'.$name_file;

		if (in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['admin_error'] = "Maximum file size of photo is 1 MB.";
				log_system($username, "admin", "error", "Failed upload contact photo because size is too large (". size($size_file) .").");
				header("Location: ../contact-add");
				die();
			}
		}
		else {
			$success = false;
			$_SESSION['admin_error'] = "Format file must be .jpeg, .jpg, .png, or .gif";
			log_system($username, "admin", "error", "Failed upload contact photo because format file not suitable (format: ". $ext_file .").");
			header("Location: ../contact-add");
			die();
		}

		if($success) {
			$db->bindMore(array(
				"id" 			=> "",
				"name"			=> "$name",
				"position"		=> "$position",
				"photo"			=> "$name_new",
				"facebook"		=> "$facebook",
				"twitter"		=> "$twitter",
				"instagram"		=> "$instagram",
				"lineid"		=> "$lineid",
				"whatsapp"		=> "$whatsapp",
				"active"		=> "$active",
				"created_by"	=> "$username",
				"created_date"	=> get_date(),
				"updated_by"	=> "",
				"updated_date"	=> "",
				"revision"		=> 0
			));
			$query = "INSERT INTO iprs_staff VALUES (:id, :name, :position, :photo, :facebook, :twitter, :instagram, :lineid, :whatsapp, :active, :created_by, :created_date, :updated_by, :updated_date, :revision)";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = $name." has been successfully created!";
				log_system($username, "admin", "success", "A contact person has been added (Name: ". $name .")");
				header("Location: ../contact-list");
				die();
			}
			else {
				$_SESSION['admin_error'] = "Error! Something wrong with the query.";
				log_system($username, "admin", "error", "Error! The query cannot save to the database (add_contact).");
				header("Location: ../contact-list");
				die();
			}
		}
		else {
			$_SESSION['admin_error'] = "Failed! Because the photo cannot uploaded to the host.";
			log_system($editor, "admin", "error", "Error! Contact photo didn't want upload (add_contact)");
			header("Location: ../contact-add");
			die();
		}
	}

	/**
	*	EDIT FAQ
	* 	Edit a frequently asked question by admin
	*
	*/
	else if($action == "edit_contact") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$name 		= $_POST['name'];
		$position	= $_POST['position'];
		$active 	= $_POST['active'];
		$whatsapp	= "+62".$_POST['whatsapp'];
		$lineid 	= $_POST['lineid'];
		$facebook	= $_POST['facebook'];
		$twitter 	= $_POST['twitter'];
		$instagram 	= $_POST['instagram'];

		$db->bindMore(array(
			"id" 			=> $id,
			"name"			=> "$name",
			"position"		=> "$position",
			"facebook"		=> "$facebook",
			"twitter"		=> "$twitter",
			"instagram"		=> "$instagram",
			"lineid"		=> "$lineid",
			"whatsapp"		=> "$whatsapp",
			"active"		=> "$active",
			"updated_by"	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_staff SET name = :name, position = :position, facebook = :facebook, twitter = :twitter, instagram = :instagram, lineid = :lineid, whatsapp = :whatsapp, active = :active, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Edit success! ". $name ." has been updated.";
			log_system($username, "admin", "edit", "A contact person has been updated (ID: ". $id .")");
			header("Location: ../contact-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something wrong with the query";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_contact)");
			header("Location: ../contact-list");
			die();
		}
	}

	/**
	*	UPLOAD PHOTO OF CONTACT PERSON
	*	Upload photo profile of contact person by admin
	*	
	*/
	else if ($action == "upload_contact_photo") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];

		// PHOTO
		$name_file	= $_FILES['photo']['name'];
		$size_file 	= $_FILES['photo']['size'];
		$tmp_file 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../../upload/contact/";
		$max_size 	= 1048576; // 1 MB

		$name_new	= rand(0, 10000).'_'.$id.'_'.$name_file;

		if (in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['admin_error'] = "Maximum file size of photo is 1 MB.";
				log_system($username, "admin", "error", "Failed change contact photo because size is too large (". size($size_file) .").");
				header("Location: ../contact-edit/".$id);
				die();
			}
		}
		else {
			$success = false;
			$_SESSION['admin_error'] = "Format file must be .jpeg, .jpg, .png, or .gif";
			log_system($username, "admin", "error", "Failed change contact photo because format file not suitable (format: ". $ext_file .").");
			header("Location: ../contact-edit/".$id);
			die();
		}

		if ($success) {
			$db->bindMore(array(
				"id"			=> $id,
				"photo"			=> "$name_new",
				"updated_by" 	=> "$username",
				"updated_date" 	=> get_date()
			));
			$query = "UPDATE iprs_staff SET photo = :photo, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = "Contact photo has been successfully changed.";
				log_system($editor, "admin", "edit", "". "A contact photo updated (ID: ". $id .")");
				header("Location: ../contact-edit/".$id);
				die();
			}
			else {
				$_SESSION['admin_error'] = "Failed save to the database! Query cannot save the data.";
				log_system($editor, "admin", "error", "Error! The query cannot save to the database (upload_contact_photo)");
				header("Location: ../contact-edit/".$id);
				die();
			}
		}
		else {
			$_SESSION['admin_error'] = "Failed! Because the photo cannot uploaded to the host.";
			log_system($editor, "admin", "error", "Error! Contact photo didn't want upload (ID: ". $id .")");
			header("Location: ../contact-edit/".$id);
			die();
		}
	}

	/**
	*	UPLOAD LOGO
	*	Upload logo by admin
	*	
	*/
	else if ($action == "upload_logo") {
		$username 	= $_POST['username'];
		$name 		= "logo";

		// PHOTO
		$name_file	= $_FILES['photo']['name'];
		$size_file 	= $_FILES['photo']['size'];
		$tmp_file 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../../". $assets_folder ."/images/";
		$max_size 	= 1048576; // 1 MB

		$name_new	= "logo.".$ext_file;

		if (in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				unlink($location.$logo);
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['admin_error'] = "Maximum file size of photo is 1 MB.";
				log_system($username, "admin", "error", "Failed change logo because size is too large (". size($size_file) .").");
				header("Location: ../setting-main");
				die();
			}
		}
		else {
			$success = false;
			$_SESSION['admin_error'] = "Format file must be .jpeg, .jpg, .png, or .gif";
			log_system($username, "admin", "error", "Failed change logo because format file not suitable (format: ". $ext_file .").");
			header("Location: ../setting-main");
			die();
		}

		if ($success) {
			$db->bindMore(array(
				"name"			=> "$name",
				"value"			=> "$name_new",
				"updated_by" 	=> "$username",
				"updated_date" 	=> get_date()
			));
			$query = "UPDATE iprs_setting SET value = :value, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE name = :name";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = "Logo has been successfully changed.";
				log_system($username, "admin", "edit", "Logo updated.");
				header("Location: ../setting-main");
				die();
			}
			else {
				$_SESSION['admin_error'] = "Failed save to the database! Query cannot save the data.";
				log_system($username, "admin", "error", "Error! The query cannot save to the database (upload_logo)");
				header("Location: ../setting-main");
				die();
			}
		}
		else {
			$_SESSION['admin_error'] = "Failed! Because the photo cannot uploaded to the host.";
			log_system($username, "admin", "error", "Error! Logo didn't want upload.");
			header("Location: ../setting-main");
			die();
		}
	}

	/**
	*	UPLOAD FAVICON
	*	Upload favicon by admin
	*	
	*/
	else if ($action == "upload_favicon") {
		$username 	= $_POST['username'];
		$name 	 	= "favicon";

		// PHOTO
		$name_file	= $_FILES['photo']['name'];
		$size_file 	= $_FILES['photo']['size'];
		$tmp_file 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../../". $assets_folder ."/images/";
		$max_size 	= 1048576; // 1 MB

		$name_new	= "favicon.".$ext_file;

		if (in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				unlink($location.$favicon);
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['admin_error'] = "Maximum file size of photo is 1 MB.";
				log_system($username, "admin", "error", "Failed change favicon because size is too large (". size($size_file) .").");
				header("Location: ../setting-main");
				die();
			}
		}
		else {
			$success = false;
			$_SESSION['admin_error'] = "Format file must be .jpeg, .jpg, .png, or .gif";
			log_system($username, "admin", "error", "Failed change favicon because format file not suitable (format: ". $ext_file .").");
			header("Location: ../setting-main");
			die();
		}

		if ($success) {
			$db->bindMore(array(
				"name"			=> "$name",
				"value"			=> "$name_new",
				"updated_by" 	=> "$username",
				"updated_date" 	=> get_date()
			));
			$query = "UPDATE iprs_setting SET value = :value, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE name = :name";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = "Favicon has been successfully changed.";
				log_system($username, "admin", "edit", "Favicon updated.");
				header("Location: ../setting-main");
				die();
			}
			else {
				$_SESSION['admin_error'] = "Failed save to the database! Query cannot save the data.";
				log_system($username, "admin", "error", "Error! The query cannot save to the database (upload_favicon)");
				header("Location: ../setting-main");
				die();
			}
		}
		else {
			$_SESSION['admin_error'] = "Failed! Because the photo cannot uploaded to the host.";
			log_system($username, "admin", "error", "Error! Favicon didn't want upload.");
			header("Location: ../setting-main");
			die();
		}
	}

	/**
	*	UPLOAD PHOTO OF LOGIN BACKGROUND
	*	Upload login background by admin
	*	
	*/
	else if ($action == "upload_login_background") {
		$username 	= $_POST['username'];
		$name 		= "login_background";

		// PHOTO
		$name_file	= $_FILES['photo']['name'];
		$size_file 	= $_FILES['photo']['size'];
		$tmp_file 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../../". $assets_folder ."/images/";
		$max_size 	= 1048576; // 1 MB

		$name_new	= "bg.".$ext_file;

		if (in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				unlink($location.$login_background);
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['admin_error'] = "Maximum file size of photo is 1 MB.";
				log_system($username, "admin", "error", "Failed change login background because size is too large (". size($size_file) .").");
				header("Location: ../setting-main");
				die();
			}
		}
		else {
			$success = false;
			$_SESSION['admin_error'] = "Format file must be .jpeg, .jpg, .png, or .gif";
			log_system($username, "admin", "error", "Failed change login background because format file not suitable (format: ". $ext_file .").");
			header("Location: ../setting-main");
			die();
		}

		if ($success) {
			$db->bindMore(array(
				"name"			=> "$name",
				"value"			=> "$name_new",
				"updated_by" 	=> "$username",
				"updated_date" 	=> get_date()
			));
			$query = "UPDATE iprs_setting SET value = :value, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE name = :name";
			$process = $db->query($query);

			if($process) {
				$_SESSION['admin_info'] = "Login background has been successfully changed.";
				log_system($username, "admin", "edit", "Login background updated.");
				header("Location: ../setting-main");
				die();
			}
			else {
				$_SESSION['admin_error'] = "Failed save to the database! Query cannot save the data.";
				log_system($username, "admin", "error", "Error! The query cannot save to the database (login_background)");
				header("Location: ../setting-main");
				die();
			}
		}
		else {
			$_SESSION['admin_error'] = "Failed! Because the photo cannot uploaded to the host.";
			log_system($username, "admin", "error", "Error! Login background didn't want upload.");
			header("Location: ../setting-main");
			die();
		}
	}

	/** 
	* 	MAIN SETTING
	* 	Set the main setting of IPRS BEM ITS
	*
	*/
	else if($action == "main_setting") {
		$username 		= $_POST['username'];
		$system_name	= $_POST['system_name'];
		$main_email		= $_POST['main_email'];
		$timezone 		= $_POST['timezone'];
		$footer			= str_replace(chr(194), '', $_POST['footer']);

		$x = 0;

		$db->bind("system_name", "system_name");
		$db->bind("value_one", "$system_name");
		$query = "UPDATE iprs_setting SET value = :value_one WHERE name = :system_name";
		$process = $db->query($query);
		if($process) $x++;
		$process = "";

		$db->bind("main_email", "main_email");
		$db->bind("value_two", "$main_email");
		$query = "UPDATE iprs_setting SET value = :value_two WHERE name = :main_email";
		$process = $db->query($query);
		if($process) $x++;
		$process = "";

		$db->bind("timezone", "timezone");
		$db->bind("value_three", "$timezone");
		$query = "UPDATE iprs_setting SET value = :value_three WHERE name = :timezone";
		$process = $db->query($query);
		if($process) $x++;
		$process = "";

		$db->bind("footer", "footer");
		$db->bind("value_four", "$footer");
		$query = "UPDATE iprs_setting SET value = :value_four WHERE name = :footer";
		$process = $db->query($query);
		if($process) $x++;

		if($x = 4) {
			$_SESSION['admin_info'] = "Setting has been successfully changed.";
			log_system($username, "admin", "edit", "Setting has been updated.");
			header("Location: ../setting-main");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something was wrong.";
			log_system($username, "admin", "error", "Error! The query cannot save the database (main_setting)");
			header("Location: ../setting-main");
			die();
		}
	}

	/**
	*	ADD CHANGELOG
	* 	Add a changelog
	*
	*/
	else if($action == "add_changelog") {
		$username 	= $_POST['username'];
		$title 		= $_POST['title'];
		$content	= $_POST['content'];
		$version 	= $_POST['version'];

		$time		= explode("/", $_POST['date']);
		$date		= $time[2] .'-'. $time[0] .'-'. $time[1];

		$db->bindMore(array(
			"id" 			=> "",
			"title"			=> "$title",
			"content"		=> "$content",
			"version"		=> "$version",
			"date"			=> "$date",
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by"	=> "",
			"updated_date"	=> "",
			"revision"		=> 0
		));
		$query = "INSERT INTO iprs_changelog VALUES (:id, :title, :content, :version, :date, :created_by, :created_date, :updated_by, :updated_date, :revision)";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Changelog version ". $version ." successfully created.";
			log_system($username, "admin", "success", "A changelog has been created (Version: ". $version .")");
			header("Location: ../changelog-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something was wrong.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (add_changelog)");
			header("Location: ../changelog-list");
			die();
		}
	}

	/**
	* 	EDIT CHANGELOG
	* 	Edit a changelog by admin
	*
	*/
	else if($action == "edit_changelog") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$title 		= $_POST['title'];
		$content 	= $_POST['content'];
		$version 	= $_POST['version'];

		$time		= explode("/", $_POST['date']);
		$date		= $time[2] .'-'. $time[0] .'-'. $time[1];

		$db->bindMore(array(
			"id" 			=> $id,
			"title" 		=> "$title",
			"content"		=> "$content",
			"version"		=> "$version",
			"date_time"		=> "$date",
			"updated_by"	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_changelog SET title = :title, content = :content, version = :version, date = :date_time, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['admin_info'] = "Changelog version ". $version ." has been updated.";
			log_system($username, "admin", "edit", "Changelo version ". $version ." has been updated.");
			header("Location: ../changelog-list");
			die();
		}
		else {
			$_SESSION['admin_error'] = "Error! Something was wrong.";
			log_system($username, "admin", "error", "Error! The query cannot save to the database (edit_changelog)");
			header("Location: ../changelog-list");
			die();
		}
	}
?>