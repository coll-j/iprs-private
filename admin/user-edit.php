<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $level_text     = array("Administrator", "Standard User");
    $level_slug     = array("admin", "user");
    $level_length   = count($level_slug);

    $active_text    = array("Yes", "No");
    $active_slug    = array("yes", "no");
    $active_length  = count($active_slug);

    $form_text      = array("Active", "Deactive");
    $form_slug      = array("active", "deactive");
    $form_length    = count($form_slug);

    $id     = $_GET['id'];
    $data   = get_data("iprs_user a INNER JOIN iprs_contact b ON a.`id` = b.`id`", "*", "a.`id` = '$id' AND b.`id` = '$id'");
    foreach ($data as $row) {
        $username   = $row['username'];
        $name       = $row['name'];
        $level      = $row['level'];
        $email      = $row['email'];
        $user_photo = $row['photo'];
        $form       = $row['form'];
        $active     = $row['active'];
        $address    = $row['address'];
        $phone      = $row['phone'];
        $website    = $row['website'];
        $instagram  = $row['instagram'];
        $line       = $row['line'];
        $facebook   = $row['facebook'];
        $twitter    = $row['twitter'];
    }
?>

<?php require_once("pages/header_start.php"); ?>

<!-- Plugins css-->
<link href="../<?php echo $plugins_folder; ?>/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="../<?php echo $plugins_folder; ?>/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="../<?php echo $plugins_folder; ?>/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../<?php echo $plugins_folder; ?>/switchery/switchery.min.css">

<!-- Plugins css -->
<link href="../<?php echo $plugins_folder; ?>/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="../<?php echo $plugins_folder; ?>/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="../<?php echo $plugins_folder; ?>/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="../<?php echo $plugins_folder; ?>/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="../<?php echo $plugins_folder; ?>/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom box css -->
<link href="../<?php echo $plugins_folder; ?>/custombox/css/custombox.min.css" rel="stylesheet">

<?php require_once("pages/header_end.php"); ?>

<body onload="hidefield()">

    <!-- Navigation Bar-->
    <header id="topnav">
        
        <?php require_once("pages/topbar.php"); ?>

        <?php require_once("pages/navbar.php"); ?>
        
    </header>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container-fluid">

            <?php require_once("pages/page_title.php"); ?>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light pull-right" onclick="location.href='./user-list'"><i class="mdi mdi-keyboard-backspace"></i> All Users</button>
                        <h4 class="m-t-0 header-title">Edit User</h4>
                        <p class="text-muted m-b-30 font-13">
                            You're now editing <strong><?php echo $name; ?></strong>.
                        </p>

                        <?php if(isset($_SESSION['admin_info'])) { ?>
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $_SESSION['admin_info']; ?>
                                <?php unset($_SESSION['admin_info']); ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION["admin_error"])) { ?>
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $_SESSION['admin_error']; ?>
                                <?php unset($_SESSION['admin_error']); ?>
                            </div>
                        <?php } ?>
                        
                        <ul class="nav nav-tabs tabs-bordered nav-justified">
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
                                <a href="#change-password" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="fi-cog mr-2"></i> Change Password
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account">
                                <form class="form-horizontal" role="form" action="include/process.php" enctype="multipart/form-data" method="post">
                                    <div class="form-group row">
                                        <label for="" class="col-2 col-form-label">Photo</label>
                                        <div class="col-10">
                                            <img src="../upload/profile/<?php echo $user_photo; ?>" alt="" class="thumb-lg rounded-circle">
                                            <br><br>
                                            <div class="col-5">
                                                <a href="#photo" class="btn btn-custom waves-effect w-md mr-2 mb-2" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Upload Photo</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fullname" class="col-2 col-form-label">Full Name</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="fullname" name="name" placeholder="Kementerian Hubungan Luar BEM ITS" value="<?php echo $name; ?>">
                                        </div>
                                    </div>
                                    <?php if($level != "developer") { ?>
                                        <div class="form-group row">
                                            <label for="username" class="col-2 col-form-label">Username</label>
                                            <div class="col-10">
                                                <input type="text" class="form-control" id="username" name="username" placeholder="hublubemits" value="<?php echo $username; ?>" onkeyup="check_username(this.value)">
                                                <span class="help-block"><small id="username_info"></small></span>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                    <?php } ?>
                                    <div class="form-group row">
                                        <label for="email" class="col-2 col-form-label">Email</label>
                                        <div class="col-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="hublu@bem.its.ac.id" value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                    <?php if($level != "developer") { ?>
                                        <div class="form-group row">
                                            <label for="level" class="col-2 col-form-label">Level</label>
                                            <div class="col-10">
                                                <select id="level" name="level" class="form-control select2">
                                                    <option value"">Choose</option>
                                                    <?php for($i = 0; $i < $level_length; $i++) { ?>
                                                        <option value="<?php echo $level_slug[$i]; ?>" <?php if($level == $level_slug[$i]) echo 'selected="selected"'; ?>><?php echo $level_text[$i]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" name="level" value="developer">
                                    <?php } ?>
                                    <div class="form-group row">
                                        <label for="active" class="col-2 col-form-label">Active</label>
                                        <div class="col-10">
                                            <select id="active" name="active" class="form-control select2">
                                                <option value"">Choose</option>
                                                <?php for($i = 0; $i < $active_length; $i++) { ?>
                                                    <option value="<?php echo $active_slug[$i]; ?>" <?php if($active == $active_slug[$i]) echo 'selected="selected"'; ?>><?php echo $active_text[$i]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="proposal-form" class="col-2 col-form-label">Proposal Form</label>
                                        <div class="col-10">
                                            <select id="proposal-form" name="proposal-form" class="form-control select2">
                                                <option value"">Choose</option>
                                                <?php for($i = 0; $i < $form_length; $i++) { ?>
                                                    <option value="<?php echo $form_slug[$i]; ?>" <?php if($form == $form_slug[$i]) echo 'selected="selected"'; ?>><?php echo $form_text[$i]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-group text-right m-b-0">
                                        <input type="hidden" name="action" value="edit_account_user">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="editor" value="<?php echo $_SESSION['username']; ?>">
                                        <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
                                            Reset
                                        </button>
                                        <button class="btn btn-custom waves-effect waves-light" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="contact">
                                <form class="form-horizontal" role="form" action="include/process.php" method="post">
                                    <div class="form-group row">
                                        <label for="address" class="col-2 col-form-label">Address</label>
                                        <div class="col-10">
                                            <textarea id="address" name="address" class="form-control" placeholder="Type the secreteriat address of the organization"><?php echo $address; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-2 col-form-label">Phone</label>
                                        <div class="col-10">
                                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone number of the PIC (ex: Head of External Department, etc)" value="<?php echo $phone; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lineid" class="col-2 col-form-label">Line ID</label>
                                        <div class="col-10">
                                            <input type="text" name="lineid" id="lineid" class="form-control" placeholder="Line ID of the PIC or organization" value="<?php echo $line; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="website" class="col-2 col-form-label">Website</label>
                                        <div class="col-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="website-addon">http://</span>
                                                </div>
                                                <input type="text" class="form-control" id="website" name="website" aria-describedby="website-addon" placeholder="arek.its.ac.id/iprs" value="<?php echo $website; ?>">
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
                                                <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="facebook-addon" placeholder="bemits" value="<?php echo $facebook; ?>">
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
                                                <input type="text" class="form-control" id="twitter" name="twitter" aria-describedby="twitter-addon" placeholder="bemits" value="<?php echo $twitter; ?>">
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
                                                <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="instagram-addon" placeholder="bemits" value="<?php echo $instagram; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-group text-right m-b-0">
                                        <input type="hidden" name="action" value="edit_contact_user">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                        <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
                                            Reset
                                        </button>
                                        <button class="btn btn-custom waves-effect waves-light" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="change-password">
                                <?php if($level != "developer") { ?>
                                    <form class="form-horizontal" role="form" action="include/process.php" method="post">
                                        <div class="form-group row">
                                            <label for="pass" class="col-2 col-form-label">New Password</label>
                                            <div class="col-10">
                                                <input type="password" class="form-control" name="password" id="pass" placeholder="Type the new password here" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="confirm-password" class="col-2 col-form-label">Confirm Password</label>
                                            <div class="col-10">
                                                <input type="password" class="form-control" name="confirm-password" id="confirm-password" data-parsley-equalto="#pass" placeholder="Please confirm the new password here" required>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="form-group text-right m-b-0">
                                            <input type="hidden" name="action" value="edit_password_user">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                            <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
                                                Reset
                                            </button>
                                            <button class="btn btn-custom waves-effect waves-light" type="submit" id="submit_button">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <div align="center">
                                        <br>
                                        This user is a <strong>developer</strong>, you cannot change the password.
                                        <br><br>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

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
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="editor" value="<?php echo $_SESSION['username']; ?>">
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

    <?php require_once("pages/footer_start.php"); ?>

    <?php require_once("pages/jquery.php"); ?>

   <!-- plugin js -->
    <script src="../<?php echo $plugins_folder; ?>/switchery/switchery.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-maxlength/bootstrap-maxlength.js" type="text/javascript"></script>

    <!-- plugin js -->
    <script src="../<?php echo $plugins_folder; ?>/moment/moment.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-timepicker/bootstrap-timepicker.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Parsley js -->
    <script type="text/javascript" src="../<?php echo $plugins_folder; ?>/parsleyjs/parsley.min.js"></script>

    <!-- Init Js file -->
    <script type="text/javascript" src="../<?php echo $assets_folder; ?>/pages/jquery.form-advanced.init.js"></script>
    <script src="../<?php echo $assets_folder; ?>/pages/jquery.form-pickers.init.js"></script>

    <!-- Modal-Effect -->
    <script src="../<?php echo $plugins_folder; ?>/custombox/js/custombox.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/custombox/js/legacy.min.js"></script>

    <script type="text/javascript">
        // Aksi setelah kolom nama panggilan diubah
        function check_username (username) {
            if (username != "") {
                var last = "<?php echo $username; ?>";
                $.ajax({
                    url: 'include/process.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {action: 'ajax_check_edit_username', username: username, last: last},
                })
                .done(function(result) {
                    $("#username_info").html(result);
                    if (result != "") {
                        $("#username_info").html(result);
                        $("#submit_button").hide();
                    }
                    else {
                        $("#username_info").html("Congratulations! Username available.");
                        $("#submit_button").show();
                    }
                })
                .fail(function(result) {
                    console.log("error "+result);
                });
            }
            else {
                $("#username_info").html("Please insert username!");
                $("#submit_button").hide();
            }
        }
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>