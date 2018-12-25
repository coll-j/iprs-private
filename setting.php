<?php 
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");

    $username   = $_SESSION['username'];
    $level      = $_SESSION['level'];
    $data = get_data("iprs_user a INNER JOIN iprs_contact b ON a.`id` = b.`id`", "*", "a.`username` = '$_SESSION[username]'");
    foreach ($data as $row) {
        $id         = $row['id'];
        $email      = $row['email'];
        $user_photo = $row['photo'];
        $form       = $row['form'];
        $address    = $row['address'];
        $phone      = $row['phone'];
        $website    = $row['website'];
        $instagram  = $row['instagram'];
        $line       = $row['line'];
        $facebook   = $row['facebook'];
        $twitter    = $row['twitter'];
    }
?>

<?php require_once("include/pages/header_start.php"); ?>

<!-- Custom box css -->
<link href="<?php echo $plugins_folder; ?>/custombox/css/custombox.min.css" rel="stylesheet">

<?php require_once("include/pages/header_end.php"); ?>

<body onload="">

    <!-- Begin page -->
    <div id="wrapper">

        <?php require_once("include/pages/sidebar.php"); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <?php require_once("include/pages/topbar.php"); ?>

            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <?php require_once("include/pages/announcement.php"); ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- meta -->
                            <div class="profile-user-box card-box bg-custom">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span class="pull-left mr-3"><img src="upload/profile/<?php echo $user_photo; ?>" alt="" class="thumb-lg rounded-circle"></span>
                                        <div class="media-body text-white">
                                            <h4 class="mt-1 mb-1 font-18"><?php echo $name; ?></h4>
                                            <p class="font-13 text-light"><?php echo $username; ?></p>
                                            <p class="text-light mb-0"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-light waves-effect" onclick="location.href='./profile'">
                                                <i class="mdi mdi-account mr-1"></i> View Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- end row -->

                    <?php if(isset($_SESSION['information'])) { ?>
                        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo $_SESSION['information']; ?>
                            <?php unset($_SESSION['information']); ?>
                        </div>
                    <?php } ?>

                    <?php if(isset($_SESSION["form_error"])) { ?>
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo $_SESSION['form_error']; ?>
                            <?php unset($_SESSION['form_error']); ?>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Personal-Information -->
                            <div class="card-box">
                            	<h4 class="header-title mt-0 m-b-20">Setting
	                            	<div class="pull-right">
	                            		<small>You are now setting your account, be careful!</small>
	                            	</div>
	                            </h4>
	                            <hr>
                           		
                       			<div class="tabs-vertical-env">
                                    <ul class="nav tabs-vertical">
                                        <li class="nav-item">
                                            <a href="#account" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                <i class="fi-head mr-2"></i> Account Information
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#contact" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                <i class="fi-mail mr-2"></i> Contact Information
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#password" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="fi-cog mr-2"></i> Change Password
                                            </a>
                                        </li>
                                    </ul>

	                                    
                                	<div class="tab-content col-md-12">
                                    	<div class="tab-pane active" id="account">
                                    		<form role="form" action="include/process.php" enctype="multipart/form-data" method="post">
	                                    		<div class="form-group row">
		                                            <label for="" class="col-2 col-form-label">Photo</label>
		                                            <div class="col-10">
		                                            	<img src="upload/profile/<?php echo $user_photo; ?>" alt="" class="thumb-lg rounded-circle">
		                                            	<br><br>
		                                            	<a href="#photo" class="btn btn-custom waves-effect w-md mr-2 mb-2" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Upload Photo</a>
		                                            </div>
		                                        </div>
	                                    		<div class="form-group row">
		                                            <label for="fullname" class="col-2 col-form-label">Full Name</label>
		                                            <div class="col-10">
		                                                <input type="text" class="form-control" id="fullname" name="name" value="<?php echo $name; ?>">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="username" class="col-2 col-form-label">Username</label>
		                                            <div class="col-10">
		                                                <input type="text" class="form-control" id="username" aria-describedby="usernamehelp" value="<?php echo $username; ?>" disabled="">
		                                                <small id="usernamehelp" class="form-text text-muted">Username cannot be edited.</small>
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="email" class="col-2 col-form-label">Email</label>
		                                            <div class="col-10">
		                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="address" class="col-2 col-form-label">Address</label>
		                                            <div class="col-10">
		                                            	<textarea class="form-control" id="address" name="address" rows="3"><?php echo $address; ?></textarea>
		                                            </div>
		                                        </div>

		                                        <hr>

				                                <div class="form-group text-right m-b-0">
					                                <input type="hidden" name="action" value="account_setting">
					                                <input type="hidden" name="id" value="<?php echo $id; ?>">
				                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
				                                    <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
				                                        Reset
				                                    </button>
				                                    <button class="btn btn-custom waves-effect waves-light" type="submit">
				                                        Save
				                                    </button>
				                                </div>

		                                    </form>
                                        </div>

                                        <div class="tab-pane" id="contact">
                                        	<form role="form" action="include/process.php" method="post">
	                                            <div class="form-group row">
		                                            <label for="phone" class="col-2 col-form-label">Phone</label>
		                                            <div class="col-10">
		                                                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phonehelp" value="<?php echo $phone; ?>">
		                                                <small id="phonehelp" class="form-text text-muted">Please enter number phone that can be contacted by our staff.</small>
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="lineid" class="col-2 col-form-label">Line ID</label>
		                                            <div class="col-10">
		                                                <input type="text" class="form-control" id="lineid" name="lineid" value="<?php echo $line; ?>">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="website" class="col-2 col-form-label">Website</label>
		                                            <div class="col-10">
		                                            	<div class="input-group">
	                                                        <div class="input-group-prepend">
	                                                            <span class="input-group-text" id="website-addon">http://</span>
	                                                        </div>
		                                                	<input type="text" class="form-control" id="website" name="website" aria-describedby="website-addon" value="<?php echo $website; ?>">
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="facebook" class="col-2 col-form-label">Facebook</label>
		                                            <div class="col-10">
		                                            	<div class="input-group">
	                                                        <div class="input-group-prepend">
	                                                            <span class="input-group-text" id="facebook-addon">facebook.com/</span>
	                                                        </div>
		                                                	<input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="facebook-addon" value="<?php echo $facebook; ?>">
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="twitter" class="col-2 col-form-label">Twitter</label>
		                                            <div class="col-10">
		                                            	<div class="input-group">
	                                                        <div class="input-group-prepend">
	                                                            <span class="input-group-text" id="twitter-addon">twitter.com/</span>
	                                                        </div>
		                                                	<input type="text" class="form-control" id="twitter" name="twitter" aria-describedby="twitter-addon" value="<?php echo $twitter; ?>">
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="instagram" class="col-2 col-form-label">Instagram</label>
		                                            <div class="col-10">
		                                            	<div class="input-group">
	                                                        <div class="input-group-prepend">
	                                                            <span class="input-group-text" id="instagram-addon">instagram.com/</span>
	                                                        </div>
		                                                	<input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="instagram-addon" value="<?php echo $instagram; ?>">
		                                                </div>
		                                            </div>
		                                        </div>

		                                        <hr>

				                                <div class="form-group text-right m-b-0">
					                                <input type="hidden" name="action" value="contact_setting">
					                                <input type="hidden" name="id" value="<?php echo $id; ?>">
				                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
				                                    <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
				                                        Reset
				                                    </button>
				                                    <button class="btn btn-custom waves-effect waves-light" type="submit">
				                                        Save
				                                    </button>
				                                </div>

		                                    </form>
                                        </div>

                                        <div class="tab-pane" id="password">
                                        	<form role="form" action="include/process.php" method="post">
	                                            <div class="form-group row">
		                                            <label for="old-password" class="col-2 col-form-label">Current Password</label>
		                                            <div class="col-10">
		                                            	<input type="password" class="form-control" id="old-password" name="old-password" placeholder="Write your current password">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="new-password" class="col-2 col-form-label">New Password</label>
		                                            <div class="col-10">
		                                            	<input type="password" class="form-control" id="new-password" name="new-password" placeholder="Write your new password">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="confirm-password" class="col-2 col-form-label">Confirm Password</label>
		                                            <div class="col-10">
		                                            	<input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Write again your new password">
		                                            </div>
		                                        </div>

		                                        <hr>

				                                <div class="form-group text-right m-b-0">
					                                <input type="hidden" name="action" value="change_password">
					                                <input type="hidden" name="id" value="<?php echo $id; ?>">
				                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
				                                    <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
				                                        Reset
				                                    </button>
				                                    <button class="btn btn-custom waves-effect waves-light" type="submit">
				                                        Save
				                                    </button>
				                                </div>

				                            </form>
                                        </div>

                                	</div>
                                </div>
                            </div>
                            <!-- Personal-Information -->

                        </div>

                    </div>
                    <!-- end row -->


                </div> <!-- container -->

            </div> <!-- content -->

            <?php require_once("include/pages/footer_start.php"); ?>

        </div>

        <!-- Modal -->
        <div id="photo" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Upload Photo</h4>
            <div class="custom-modal-text">
                <form class="form-horizontal" action="include/process.php" enctype="multipart/form-data" method="post">
                    <div class="form-group m-b-25">
                        <div class="col-12">
                        	<input type="hidden" name="action" value="upload_photo">
                        	<input type="hidden" name="id" value="<?php echo $id; ?>">
                        	<input type="hidden" name="editor" value="<?php echo $username; ?>">
                            <input type="file" class="filestyle" data-btnClass="btn-light" name="photo" aria-describedby="photohelp">
                            <small id="photohelp" class="form-text text-muted"><strong>NOTE:</strong> Max file size is <strong>1 MB</strong> and max file resolution is <strong>500 x 500 px</strong>.</small>
                        </div>
                    </div>

                    <div class="form-group account-btn text-left m-t-10">
                        <div class="col-12">
                            <button class="btn w-lg btn-rounded btn-custom waves-effect waves-light" type="submit">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <?php require_once("include/pages/jquery.php"); ?>

    <!-- Counter Up  -->
    <script src="<?php echo $plugins_folder; ?>/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/counterup/jquery.counterup.min.js"></script>

    <!-- Modal-Effect -->
    <script src="<?php echo $plugins_folder; ?>/custombox/js/custombox.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/custombox/js/legacy.min.js"></script>

    <?php require_once("include/pages/app.php"); ?>

</body>
</html>