<?php
/**
*	FUNCTION PROCESS SYSTEM
*	Used to process all data from form.
*	For examples to check login.
*	
*/
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    require 'vendor/autoload.php';

	require_once(__DIR__ . '/lib/db.class.php');
	require_once('functions.php');
	require_once('config.php');

	$db = new DB();

	// GET ACTION PROCESS
	$action = $_POST["action"];

	/**
	*	LOGIN SYSTEM
	*	Check username and password, and then set session if user logged in.
	*	
	*/
	if ($action == "login") {
		$username = addslashes(strtolower($_POST["username"]));
		$password = $_POST["password"];

		$query = "SELECT salt FROM iprs_user WHERE username = '$username'";
		$datas = $db->query($query);
		$salt  = "";
		foreach ($datas as $data) {
			$salt .= $data["salt"];
		}
		if ($salt == "") {
			log_system($username, "login", "error", "Login failed! Username not found.");
			$_SESSION["form_username"] = $_POST["username"];
			$_SESSION["form_error"]    = "Username not found!";
			header("Location: ../login");
			die();
		}
		else {
			$password_salted = hash("SHA512", $password.$salt);
			$query = "SELECT * FROM iprs_user WHERE username = '$username' AND password = '$password_salted' AND active = 'yes'";
			$datas = $db->query($query);
			$x     = 0;
			foreach ($datas as $data) {
				$x++;
				$_SESSION["username"]	= $data["username"];
				$_SESSION["level"]      = $data["level"];
			}
			if ($x>0) {
				log_system($username, "login", "success", "Successfully login.");
				header("Location: ../dashboard");
				die();
			}
			else {
				log_system($username, "login", "error", "Login failed! Password doesn't match.");
				$_SESSION["form_username"] = $_POST["username"];
				$_SESSION["form_error"]    = "Password doesn't match!";
				header("Location: ../login");
				die();
			}
		}
	}

	/**
	*	REGISTRATION SYSTEM
	*	Add new member to the system
	*	
	*/
	/* else if ($action == "register") {
		$username 	= addslashes(strtolower($_POST["username"]));
		$email		= $_POST["email"];

		$salt 		= hash("SHA256", rand());
		$password 	= hash("SHA512", $_POST["password"].$salt);

		$active		= "yes";
		$form 		= "active";
		$level		= "user";

		// Check the username is available or not
		$query		= "SELECT username FROM iprs_user WHERE username = '$username'";
		$process 	= $db->query($query);

		if($process) {
			log_system($username, "register", "error", "Register failed! Username is not available.");
			$_SESSION["form_error"] = "Failed to register, username is not available!";
			header("Location: ../register");
			die();
		}

		// Bind parameter to query
		$db->bindMore(array(
			"id" 			=> "",
			"username" 		=> "$username",
			"name"			=> "",
			"password"		=> "$password",
			"salt"			=> "$salt",
			"email"			=> "$email",
			"level"			=> "$level",
			"active"		=> "$active",
			"photo"			=> "avatar.png",
			"form"			=> "$form",
			"created_by"	=> "$username",
			"created_date"	=> get_date(),
			"updated_by"	=> "$username",
			"updated_date"	=> get_date(),
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
				"address"		=> "",
				"phone"			=> "",
				"website" 		=> "",
				"instagram"		=> "",
				"lineid"			=> "",
				"facebook"		=> "",
				"twitter"		=> "",
				"created_by"	=> "$username",
				"created_date"	=> get_date(),
				"updated_by"	=> "$username",
				"updated_date"	=> get_date(),
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
				"created_by"	=> "$username",
				"created_date"	=> get_date(),
				"updated_by"	=> "$username",
				"updated_date"	=> get_date(),
				"revision"		=> 0
			));
			$query 	= "INSERT INTO iprs_password_stats VALUES (:id, :username, :password, :stats, :created_by, :created_date, :updated_by, :updated_date, :revision)";
			$datas	= $db->query($query);

			if($datas) {
				log_system($username, "register", "success", "Successfully registered.");
				$_SESSION["form_success"] = "Your account has been successfully registered, please login!";
				header("Location: ../login");
				die();
			}
		}
		else {
			$_SESSION["form_error"] = "Failed to register! Please contact our staff to get more information.";
			log_system($username, "register", "error", "Register failed! Last ID not found.");
			header("Location: ../register");
			die();
		}
	} */

	/**
	*	INPUT PROPOSAL
	*	Add proposal by user
	*	
	*/
	else if ($action == "add_proposal") {
		$username 		= $_POST['username'];
		$event_name		= $_POST['event_name'];
		$event_desc 	= $_POST['event_desc'];
		$event_target	= $_POST['event_target'];
		$event_pic 		= $_POST['event_pic'];
		$event_cp 		= $_POST['event_cp'];

		$stakeholder1 	= $_POST['stakeholder1'];
		$stakeholder2	= $_POST['stakeholder2'];
		$stakeholder3 	= $_POST['stakeholder3'];
		$stakeholder4 	= $_POST['stakeholder4'];
		$stakeholder5	= $_POST['stakeholder5'];

		$time 			= explode("/", $_POST['event_time']);
		$event_time 	= $time[2] .'-'. $time[0] .'-'. $time[1];

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

		$name_file	= $_FILES['file']['name'];
		$size_file 	= $_FILES['file']['size'];
		$tmp_file 	= $_FILES['file']['tmp_name'];
		$allow_ext	= array('pdf');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../upload/proposal/";
		$max_size 	= 2097152; // 2 MB

		$name_new	= rand(0, 10000).'_'.$username.'_'.$name_file;

		if(in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['form_error'] = "Upload failed, maximum file size is 2 MB!";

				$_SESSION['event_name'] 	= $event_name;
				$_SESSION['event_desc'] 	= $event_desc;
				$_SESSION['event_time'] 	= $_POST['event_time'];
				$_SESSION['event_target'] 	= $event_target;
				$_SESSION['event_pic']		= $event_pic;
				$_SESSION['event_cp']		= $event_cp;
				$_SESSION['stakeholder1']	= $stakeholder1;
				$_SESSION['stakeholder2']	= $stakeholder2;
				$_SESSION['stakeholder3']	= $stakeholder3;
				$_SESSION['stakeholder4'] 	= $stakeholder4;
				$_SESSION['stakeholder5']	= $stakeholder5;

				if($_POST['event_type'] != "Others") {
					$_SESSION['event_type'] = $_POST['event_type'];
				}
				else {
					$_SESSION['event_type'] = "Others";
					$_SESSION['type_other'] = $_POST['type_other'];
				}

				if($_POST['relation1'] != "Other") {
					$_SESSION['relation1'] = $_POST['relation1'];
				}
				else {
					$_SESSION['relation1'] = "Other";
					$_SESSION['relation1_other'] = $_POST['relation1_other'];
				}

				if($_POST['relation2'] != "Other") {
					$_SESSION['relation2'] = $_POST['relation2'];
				}
				else {
					$_SESSION['relation2'] = "Other";
					$_SESSION['relation2_other'] = $_POST['relation2_other'];
				}

				if($_POST['relation3'] != "Other") {
					$_SESSION['relation3'] = $_POST['relation3'];
				}
				else {
					$_SESSION['relation3'] = "Other";
					$_SESSION['relation3_other'] = $_POST['relation3_other'];
				}

				if($_POST['relation4'] != "Other") {
					$_SESSION['relation4'] = $_POST['relation4'];
				}
				else {
					$_SESSION['relation4'] = "Other";
					$_SESSION['relation4_other'] = $_POST['relation4_other'];
				}

				if($_POST['relation5'] != "Other") {
					$_SESSION['relation5'] = $_POST['relation5'];
				}
				else {
					$_SESSION['relation5'] = "Other";
					$_SESSION['relation5_other'] = $_POST['relation5_other'];
				}

				log_system($username, "proposal", "error", "Upload failed! File size more than 2 MB (".size($size_file).")");
				header("Location: ../proposal");
				die();
			}
		} 
		else {
			$success = false;
			$_SESSION['form_error'] 	= "Upload failed, file format must be .pdf!";

			$_SESSION['event_name'] 	= $event_name;
			$_SESSION['event_desc'] 	= $event_desc;
			$_SESSION['event_time'] 	= $_POST['event_time'];
			$_SESSION['event_target'] 	= $event_target;
			$_SESSION['event_pic']		= $event_pic;
			$_SESSION['event_cp']		= $event_cp;
			$_SESSION['stakeholder1']	= $stakeholder1;
			$_SESSION['stakeholder2']	= $stakeholder2;
			$_SESSION['stakeholder3']	= $stakeholder3;
			$_SESSION['stakeholder4'] 	= $stakeholder4;
			$_SESSION['stakeholder5']	= $stakeholder5;

			if($_POST['event_type'] != "Others") {
				$_SESSION['event_type'] = $_POST['event_type'];
			}
			else {
				$_SESSION['event_type'] = "Others";
				$_SESSION['type_other'] = $_POST['type_other'];
			}

			if($_POST['relation1'] != "Other") {
				$_SESSION['relation1'] = $_POST['relation1'];
			}
			else {
				$_SESSION['relation1'] = "Other";
				$_SESSION['relation1_other'] = $_POST['relation1_other'];
			}

			if($_POST['relation2'] != "Other") {
				$_SESSION['relation2'] = $_POST['relation2'];
			}
			else {
				$_SESSION['relation2'] = "Other";
				$_SESSION['relation2_other'] = $_POST['relation2_other'];
			}

			if($_POST['relation3'] != "Other") {
				$_SESSION['relation3'] = $_POST['relation3'];
			}
			else {
				$_SESSION['relation3'] = "Other";
				$_SESSION['relation3_other'] = $_POST['relation3_other'];
			}

			if($_POST['relation4'] != "Other") {
				$_SESSION['relation4'] = $_POST['relation4'];
			}
			else {
				$_SESSION['relation4'] = "Other";
				$_SESSION['relation4_other'] = $_POST['relation4_other'];
			}

			if($_POST['relation5'] != "Other") {
				$_SESSION['relation5'] = $_POST['relation5'];
			}
			else {
				$_SESSION['relation5'] = "Other";
				$_SESSION['relation5_other'] = $_POST['relation5_other'];
			}

			log_system($username, "proposal", "error", "Upload failed! File extension is .".$ext_file);
			header("Location: ../proposal");
			die();
		}

		if($success) {
			$db->bindMore(array(
				"id"			=> "",
				"username"		=> "$username",
				"input_date"	=> get_date(),
				"event_name"	=> "$event_name",
				"event_type"	=> "$event_type",
				"event_desc"	=> "$event_desc",
				"event_time"	=> "$event_time",
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
				"file_name"		=> "$name_new",
				"file_type"		=> "$ext_file",
				"file_size"		=> $size_file,
				"stats"			=> "disapprove",
				"approved_by"	=> "",
				"approved_date"	=> "",
				"updated_by"	=> "",
				"updated_date"	=> "",
				"revision"		=> 0
			));
			$query = "INSERT INTO iprs_proposal VALUES (:id, :username, :input_date, :event_name, :event_type, :event_desc, :event_time, :event_target, :event_pic, :event_cp, :stakeholder1, :stakeholder2, :stakeholder3, :stakeholder4, :stakeholder5, :relation1, :relation2, :relation3, :relation4, :relation5, :file_name, :file_type, :file_size, :stats, :approved_by, :approved_date, :updated_by, :updated_date, :revision)";
			$process = $db->query($query);

			if($process) {
				$_SESSION['information'] = "Upload success! Wait until our staff check your proposal, we will notify you.";

				$db->bind("form", "deactive");
				$db->bind("username", "$username");
				$query = "UPDATE iprs_user SET form = :form WHERE username = :username";
				$db->query($query);

				$input_date = get_date();

				$mail = new PHPMailer(true);
		        try {
		            //Server settings
		            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		            $mail->isSMTP();                                      // Set mailer to use SMTP
		            $mail->Host = 'mail.udah.pw';                         // Specify main and backup SMTP servers
		            $mail->SMTPAuth = true;                               // Enable SMTP authentication
		            $mail->Username = 'hello@udah.pw';                    // SMTP username
		            $mail->Password = '@Varius298641';                    // SMTP password
		            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		            $mail->Port = 587;                                    // TCP port to connect to

		            //Recipients
		            $mail->setFrom('hello@udah.pw', 'IPRS BEM ITS');
		            $mail->addAddress($main_email);                       // Add a recipient

		            //Content
		            $mail->isHTML(true);                                  // Set email format to HTML
		            $mail->Subject = '[IPRS BEM ITS] New Proposal: '.$event_name;
		            $mail->Body    = '
		            	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						<head>
						<meta name="viewport" content="width=device-width"/>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
						<title>IPRS BEM ITS</title>


						<style type="text/css">
						img {
						    max-width: 100%;
						}

						body {
						    -webkit-font-smoothing: antialiased;
						    -webkit-text-size-adjust: none;
						    width: 100% !important;
						    height: 100%;
						    line-height: 1.6em;
						}

						body {
						    background-color: #f6f6f6;
						}

						@media only screen and (max-width: 640px) {
						    body {
						        padding: 0 !important;
						    }

						    h1 {
						        font-weight: 800 !important;
						        margin: 20px 0 5px !important;
						    }

						    h2 {
						        font-weight: 800 !important;
						        margin: 20px 0 5px !important;
						    }

						    h3 {
						        font-weight: 800 !important;
						        margin: 20px 0 5px !important;
						    }

						    h4 {
						        font-weight: 800 !important;
						        margin: 20px 0 5px !important;
						    }

						    h1 {
						        font-size: 22px !important;
						    }

						    h2 {
						        font-size: 18px !important;
						    }

						    h3 {
						        font-size: 16px !important;
						    }

						    .container {
						        padding: 0 !important;
						        width: 100% !important;
						    }

						    .content {
						        padding: 0 !important;
						    }

						    .content-wrap {
						        padding: 10px !important;
						    }

						    .invoice {
						        width: 100% !important;
						    }
						}
						</style>
						</head>

						<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

						<table class="body-wrap" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
						<tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						<td style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
						<td class="container" width="600" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
						    <div class="content" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
						        <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
						            <tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                <td class="" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #777edd; margin: 0; padding: 20px;"align="center" bgcolor="#71b6f9" valign="top">
						                    <a href="#"> <img src="https://arek.its.ac.id/iprs/assets/images/logo.png" height="28" alt="logo"/></a> <br/>
						                    <span style="margin-top: 10px;display: block;">Integrated Public Relation System BEM ITS</span>
						                </td>
						            </tr>
						            <tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                <td class="content-wrap" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
						                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                        <tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                            <td class="content-block" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"valign="top">
						                                You have <strong style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">new proposal</strong> awaiting to be approved.
						                            </td>
						                        </tr>
						                        <tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                            <td class="content-block" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"valign="top">
						                                This is the detail information about the new proposal:
						                                <br><hr>
						                                <strong>Event Name:</strong> '. $event_name .'
						                                <br>
						                                <strong>Event Type:</strong> '. $event_type .'
						                                <br>
						                                <strong>Event Desc:</strong> <br>'. $event_desc .'
						                                <br>
						                                <strong>Event Time:</strong> '. $event_time .'
						                                <br>
						                                <strong>Event Target:</strong> '. $event_target .'
						                                <br>
						                                <strong>Event PIC:</strong> '. $event_pic .'
						                                <br>
						                                <strong>Contact Person:</strong> '. $event_cp .'
						                                <br><br>
						                                <strong>Stakeholder 1:</strong> '. $stakeholder1 .' ('. $relation1 .')
						                                <br>
						                                <strong>Stakeholder 1:</strong> '. $stakeholder2 .' ('. $relation2 .')
						                                <br>
						                                <strong>Stakeholder 1:</strong> '. $stakeholder3 .' ('. $relation3 .')
						                                <br>
						                                <strong>Stakeholder 1:</strong> '. $stakeholder4 .' ('. $relation4 .')
						                                <br>
						                                <strong>Stakeholder 1:</strong> '. $stakeholdder5 .' ('. $relation5 .')
						                                <br><br>
						                                <strong>Upload By:</strong> '. $username .'
						                                <br>
						                                <strong>Upload Date:</strong> '. $input_date .'
						                                <hr><br>
						                                For more information, please check the proposal detail by click this button below. <strong>Please note,</strong> after check the proposal you must give an action to <strong>approve or disapprove</strong> this. If you have any question about the proposal, please contact the PIC.
						                            </td>
						                        </tr>
						                        <tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                            <td class="content-block" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
						                                <a href="#" class="btn-primary"style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #02c0ce; margin: 0; border-color: #02c0ce; border-style: solid; border-width: 8px 16px;">Check proposal</a>
						                            </td>
						                        </tr>
						                        <tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                        </tr>
						                    </table>
						                </td>
						            </tr>
						        </table>
						        <div class="footer" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
						            <table width="100%" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                <tr style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
						                    <td class="aligncenter content-block" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">This message sent from IPRS BEM ITS.
						                    </td>
						                </tr>
						            </table>
						        </div>
						    </div>
						</td>
						<td style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
						</tr>
						</table>
						</body>
						</html>';
					$mail->send();
				} catch (Exception $e) {
	                $_SESSION['form_error'] = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
		        }  
				log_system($username, "proposal", "success", "Upload proposal success! (". $event_name .")");
				echo "<script>window.location.href='../proposal';</script>";
				die();
			}
		}
		else {
			$_SESSION['form_error']		= "Upload failed! Please input and upload again.";

			$_SESSION['event_name'] 	= $event_name;
			$_SESSION['event_desc'] 	= $event_desc;
			$_SESSION['event_time'] 	= $_POST['event_time'];
			$_SESSION['event_target'] 	= $event_target;
			$_SESSION['event_pic']		= $event_pic;
			$_SESSION['event_cp']		= $event_cp;
			$_SESSION['stakeholder1']	= $stakeholder1;
			$_SESSION['stakeholder2']	= $stakeholder2;
			$_SESSION['stakeholder3']	= $stakeholder3;
			$_SESSION['stakeholder4'] 	= $stakeholder4;
			$_SESSION['stakeholder5']	= $stakeholder5;

			if($_POST['event_type'] != "Others") {
				$_SESSION['event_type'] = $_POST['event_type'];
			}
			else {
				$_SESSION['event_type'] = "Others";
				$_SESSION['type_other'] = $_POST['type_other'];
			}

			if($_POST['relation1'] != "Other") {
				$_SESSION['relation1'] = $_POST['relation1'];
			}
			else {
				$_SESSION['relation1'] = "Other";
				$_SESSION['relation1_other'] = $_POST['relation1_other'];
			}

			if($_POST['relation2'] != "Other") {
				$_SESSION['relation2'] = $_POST['relation2'];
			}
			else {
				$_SESSION['relation2'] = "Other";
				$_SESSION['relation2_other'] = $_POST['relation2_other'];
			}

			if($_POST['relation3'] != "Other") {
				$_SESSION['relation3'] = $_POST['relation3'];
			}
			else {
				$_SESSION['relation3'] = "Other";
				$_SESSION['relation3_other'] = $_POST['relation3_other'];
			}

			if($_POST['relation4'] != "Other") {
				$_SESSION['relation4'] = $_POST['relation4'];
			}
			else {
				$_SESSION['relation4'] = "Other";
				$_SESSION['relation4_other'] = $_POST['relation4_other'];
			}

			if($_POST['relation5'] != "Other") {
				$_SESSION['relation5'] = $_POST['relation5'];
			}
			else {
				$_SESSION['relation5'] = "Other";
				$_SESSION['relation5_other'] = $_POST['relation5_other'];
			}

			log_system($username, "proposal", "error", "Upload failed! Database cannot save the query.");
			header("Location: ../proposal");
			die();
		}
	}

	/**
	*	EDIT PROPOSAL
	*	Edit proposal by user (NOTE: User can edit the stakeholders only)
	*	
	*/
	elseif ($action == "edit_proposal") {
		$id 			= $_POST['id'];
		$username 		= $_POST['username'];

		$stakeholder1 	= $_POST['stakeholder1'];
		$stakeholder2	= $_POST['stakeholder2'];
		$stakeholder3 	= $_POST['stakeholder3'];
		$stakeholder4 	= $_POST['stakeholder4'];
		$stakeholder5	= $_POST['stakeholder5'];

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

		$db->bindMore(array(
			"id"			=> $id,
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
			"updated_by"	=> "$username",
			"updated_date"	=> get_date()
		));

		$query 	= "UPDATE iprs_proposal SET stakeholder1 = :stakeholder1, stakeholder2 = :stakeholder2, stakeholder3 = :stakeholder3, stakeholder4 = :stakeholder4, stakeholder5 = :stakeholder5, relation1 = :relation1, relation2 = :relation2, relation3 = :relation3, relation4 = :relation4, relation5 = :relation5, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if($process) {
			$_SESSION['information'] = "Edit success! Your proposal has been updated.";
			log_system($username, "proposal", "edit", "Edit proposal success! (ID: ". $id .")");
			header("Location: ../myproposal");
			die();
		}
		else {
			$_SESSION['form_error']	= "Edit failed! Something wrong, please edit again or contact our staff.";
			log_system($username, "proposal", "error", "Edit failed! Database cannot save the query.");
			header("Location: ../myproposal");
			die();
		}
	}

	/**
	*	INPUT DATABASE
	*	Add a database by user
	*	
	*/
	elseif ($action == "add_database") {
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
			$db->bind("username", "$username");
			$query = "SELECT * FROM iprs_database WHERE created_by = ':username'";
			$data = $db->query($query);
			$total = count($data);

			if ($total % 3 == 0) {
				$db->bind("form", "active");
				$db->bind("username", "$username");
				$query = "UPDATE iprs_user SET form = :form WHERE username = :username";
				$success = $db->query($query);
			}

			$_SESSION['information'] = "Input success! Your database has been successfully added.";
			log_system($username, "database", "success", "Input database success! (". $name .")");
			header("Location: ../database");
			die();
		}
		else {
			$_SESSION['form_error'] 	= "Input failed! Please input and upload again.";

			$_SESSION['data_name'] 			= $name;
			$_SESSION['data_address'] 		= $address;
			$_SESSION['data_phone']			= $phone;
			$_SESSION['data_email']			= $email;
			$_SESSION['data_position']		= $position;
			$_SESSION['data_company']		= $company;
			$_SESSION['data_comp_address'] 	= $comp_address;
			$_SESSION['data_comp_email']	= $comp_email;
			$_SESSION['data_comp_contact']	= $comp_contact;
			$_SESSION['data_comp_fax']		= $comp_fax;
			$_SESSION['data_stats']			= $stats;
			$_SESSION['data_department']	= $department;
			$_SESSION['data_generation']	= $generation;

			if($_POST['comp_type'] != "Others") {
				$_SESSION['data_comp_type'] = $_POST['comp_type'];
			}
			else {
				$_SESSION['data_comp_type'] = "Others";
				$_SESSION['data_comp_type_other'] = $_POST['comp_type_other'];
			}

			log_system($username, "database", "error", "Input failed! Database cannot save the query.");
			header("Location: ../database");
			die();
		}
	}

	/**
	*	EDIT DATABASE
	*	Edit a database
	*	
	*/
	elseif ($action == "edit_database") {
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
			$_SESSION['information'] = "Edit success! Your database has been updated.";
			log_system($username, "database", "edit", "Edit database success! (ID: ". $id .")");
			header("Location: ../mydatabase");
			die();
		}
		else {
			$_SESSION['form_error']	= "Edit failed! Something wrong, please edit again or contact our staff.";
			log_system($username, "database", "error", "Edit failed! Database cannot save the query.");
			header("Location: ../mydatabase");
			die();
		}
	}

	/**
	*	ACCOUNT SETTING
	*	User change their account information in setting page
	*	
	*/
	else if ($action == "account_setting") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$name		= $_POST['name'];
		$email 		= $_POST['email'];
		$address 	= $_POST['address'];

		if (!preg_match("/^[A-Z][a-zA-Z -]+$/", $name)) {
			$_SESSION['form_error'] = "Name must contain letters, dash, and space only!";
			log_system($username, "user", "error", "Failed change name because not contain letters, dash, or space (". $name .")");
			header("Location: ../setting");
			die();
		}

		$db->bindMore(array(
			"id"			=> $id,
			"username"		=> "$username",
			"name"			=> "$name",
			"email" 		=> "$email",
			"updated_by" 	=> "$username",
			"updated_date" 	=> get_date()
		));
		$query = "UPDATE iprs_user SET name = :name, email = :email, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id AND username = :username";
		$process = $db->query($query);

		if($process) {
			$db->bindMore(array(
				"id"			=> $id,
				"address" 		=> "$address",
				"updated_by"	=> "$username",
				"updated_date" 	=> get_date()
			));
			$query = "UPDATE iprs_contact SET address = :address, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
			$process = $db->query($query);

			if($process) {
				$_SESSION['information'] = "Your account information has been successfully changed.";
				log_system($username, "user", "edit", "Account information successfully changed.");
				header("Location: ../setting");
				die();
			}
			else {
				$_SESSION['form_error'] = "Failed save to the database! Please edit again or contact our staff.";
				log_system($username, "user", "error", "Failed edit account information because cannot save to database (iprs_contact).");
				header("Location: ../setting");
				die();
			}
		}
		else {
			$_SESSION['form_error'] = "Failed save to the database! Please edit again or contact our staff";
			log_system($username, "user", "error", "Failed edit account information because cannot save to database (iprs_user).");
			header("Location: ../setting");
			die();
		}
	}

	/**
	*	CONTACT SETTING
	*	User change their contact information in setting page
	*	
	*/
	else if ($action == "contact_setting") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$phone 		= $_POST['phone'];
		$lineid 	= $_POST['lineid'];
		$website 	= $_POST['website'];
		$facebook 	= $_POST['facebook'];
		$twitter 	= $_POST['twitter'];
		$instagram 	= $_POST['instagram'];

		if (!is_numeric($phone)) {
			$_SESSION['form_error'] = "The phone number was entered is not numeric!";
			log_system($username, "user", "error", "Edit failed! Phone number was entered is not numeric.");
			header("Location: ../setting");
			die();
		}

		$db->bindMore(array(
			"id" 			=> $id,
			"phone" 		=> "$phone",
			"lineid" 		=> "$lineid",
			"website" 		=> "$website",
			"facebook"		=> "$facebook",
			"twitter" 		=> "$twitter",
			"instagram" 	=> "$instagram",
			"updated_by" 	=> "$username",
			"updated_date"	=> get_date()
		));
		$query = "UPDATE iprs_contact SET phone = :phone, line = :lineid, website = :website, facebook = :facebook, twitter = :twitter, instagram = :instagram, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id";
		$process = $db->query($query);

		if ($process) {
			$_SESSION['information'] = "Your contact information has been successfully changed.";
			log_system($username, "user", "edit", "Contact information has been successfully changed.");
			header("Location: ../setting");
			die();
		}
		else {
			$_SESSION['form_error'] = "Failed save to database! Please edit again or contact our staff.";
			log_system($username, "user", "error", "Failed edit contact information because cannot save to database (iprs_contact).");
			header("Location: ../setting");
			die();
		}
	}

	/**
	*	CHANGE PASSWORD
	*	User change their password in setting page
	*	
	*/
	else if ($action == "change_password") {
		$id 			= $_POST['id'];
		$username 		= $_POST['username'];

		$old_pass 		= $_POST['old-password'];
		$new_pass		= $_POST['new-password'];
		$confirm_pass 	= $_POST['confirm-password'];

		// CHANGE PASSWORD PROCESS
		if ($new_pass != $confirm_pass) {
			$_SESSION['form_error']	= "Password doesn't match, please input it again.";
			log_system($username, "user", "error", "Change password failed because password doesn't match.");
			header("Location: ../setting");
			die();
		}

		$db->bind("username", "$username");
		$query = "SELECT salt FROM iprs_user WHERE username = :username";
		$datas = $db->query($query);
		$salt  = "";
		foreach ($datas as $data) {
			$salt .= $data["salt"];
		}
		if ($salt == null) {
			$_SESSION['form_error']	= "Salt didn't found! Please contact our staff.";
			log_system($username, "user", "error", "Change password failed because salt didn't found.");
			header("Location: ../setting");
			die();
		}
		else {
			$password_salted = hash("SHA512", $old_pass.$salt);
			$db->bindMore(array(
				"username"	=> "$username",
				"password"	=> "$password_salted",
				"active"	=> "yes"
			));
			$query = "SELECT * FROM iprs_user WHERE username = :username AND password = :password AND active = :active";
			$datas = $db->query($query);
			if($datas == null) {
				$_SESSION['form_error']	= "Wrong current password!";
				log_system($username, "user", "error", "Change password failed because wrong current password.");
				header("Location: ../setting");
				die();
			}
			else {
				$new_salt	= hash("SHA256", rand());
				$final_pass	= hash("SHA512", $new_pass.$new_salt);

				$db->bindMore(array(
					"username"		=> "$username",
					"password"		=> "$final_pass",
					"salt" 			=> "$new_salt",
					"updated_by"	=> "$username",
					"updated_date"	=> get_date()
				));
				$query = "UPDATE iprs_user SET password = :password, salt = :salt, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE username = :username";
				$process = $db->query($query);

				if($process) {
					$db->bindMore(array(
						"id"			=> $id,
						"username"		=> "$username",
						"password"		=> "",
						"stats"			=> "changed",
						"updated_by"	=> "$username",
						"updated_date"	=> get_date()
					));
					$query = "UPDATE iprs_password_stats SET password = :password, stats = :stats, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id AND username = :username";
					$process = $db->query($query);

					if($process) {
						$_SESSION['information'] = "Your password successfully changed! Please re-login to try your new password.";
						log_system($username, "user", "edit", "Password successfully changed (new: ". $new_pass .").");
						header("Location: ../setting");
						die();
					}
					else {
						$_SESSION['form_error'] = "Change password failed! Please try again.";
						log_system($username, "user", "error", "Change password failed because it can't save to database (iprs_password_stats).");
						header("Location: ../setting");
						die();	
					}
				}
				else {
					$_SESSION['form_error'] = "Change password failed! Please try again.";
					log_system($username, "user", "error", "Change password failed because it can't save to database (iprs_user).");
					header("Location: ../setting");
					die();
				}
			}
		}
	}

	/**
	*	CHANGE PHOTO PROFILE
	*	User change their photo profile in setting page
	*	
	*/
	else if ($action == "upload_photo") {
		$id 		= $_POST['id'];
		$username 	= $_POST['editor'];

		// PHOTO
		$name_file	= $_FILES['photo']['name'];
		$size_file 	= $_FILES['photo']['size'];
		$tmp_file 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $name_file);
		$ext_file	= strtolower(end($x));
		$location 	= "../upload/profile/";
		$max_size 	= 1048576; // 1 MB

		$name_new	= rand(0, 10000).'_'.$username.'_'.$name_file;

		if (in_array($ext_file, $allow_ext) === true) {
			if($size_file < $max_size) {
				move_uploaded_file($tmp_file, $location.$name_new);
				$success = true;
			}
			else {
				$success = false;
				$_SESSION['form_error'] = "Maximum file size of photo is 1 MB.";
				log_system($username, "user", "error", "Failed change photo because size is too large (". size($size_file) .").");
				header("Location: ../setting");
				die();
			}
		}
		else {
			$success = false;
			$_SESSION['form_error'] = "Format file must be .jpeg, .jpg, .png, or .gif";
			log_system($username, "user", "error", "Failed change photo because format file not suitable (format: ". $ext_file .").");
			header("Location: ../setting");
			die();
		}

		if ($success) {
			$db->bindMore(array(
				"id"			=> $id,
				"username"		=> "$username",
				"photo"			=> "$name_new",
				"updated_by" 	=> "$username",
				"updated_date" 	=> get_date()
			));
			$query = "UPDATE iprs_user SET photo = :photo, updated_by = :updated_by, updated_date = :updated_date, revision = revision + 1 WHERE id = :id AND username = :username";
			$process = $db->query($query);

			if($process) {
				$_SESSION['information'] = "Your account information has been successfully changed.";
				log_system($username, "user", "edit", "Account information successfully changed.");
				header("Location: ../setting");
				die();
			}
			else {
				$_SESSION['form_error'] = "Failed save to the database! Please edit again or contact our staff.";
				log_system($username, "user", "error", "Failed edit account information because cannot save to database (iprs_contact).");
				header("Location: ../setting");
				die();
			}
		}
		else {
			$_SESSION['form_error'] = "Failed! Because something wrong with the photo, please upload again.";
			log_system($username, "user", "error", "Failed change account information because the photo didn't want upload.");
			header("Location: ../setting");
			die();
		}
	}
?>