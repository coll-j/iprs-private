<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $level_text = array("Administrator", "Standard User");
    $level_slug = array("admin", "user");
    $level_length = count($level_slug);
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

<?php require_once("pages/header_end.php"); ?>

<body>

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
                        <h4 class="m-t-0 header-title">Add User</h4>
                        <p class="text-muted m-b-30 font-13">
                            Fill the form to add user below.
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
                                <a href="#contact" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="fi-mail mr-2"></i> Contact Information (Optional)
                                </a>
                            </li>
                        </ul>
                        <form class="form-horizontal" role="form" action="include/process.php" method="post">
                            <div class="tab-content">
                                <div class="tab-pane active" id="account">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Name <span class="text-danger">*</span></label>
                                        <div class="col-10">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Kementerian Hubungan Luar BEM ITS" autofocus="autofocus" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username" class="col-2 col-form-label">Username <span class="text-danger">*</span></label>
                                        <div class="col-10">
                                            <input type="text" name="username" class="form-control" id="username" placeholder="hublubemits" onkeyup="check_username(this.value)" required>
                                            <span class="help-block"><small id="username_info"></small></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-2 col-form-label">Email (Optional)</label>
                                        <div class="col-10">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="hublu@bem.its.ac.id">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="level" class="col-2 col-form-label">Level <span class="text-danger">*</span></label>
                                        <div class="col-10">
                                            <select id="level" name="level" class="form-control select2" required>
                                                <?php for ($i = 0; $i < $level_length; $i++) { ?>
                                                    <option value="<?php echo $level_slug[$i]; ?>" <?php if($level_slug[$i] == "user") echo "selected='selected'"; ?>><?php echo $level_text[$i]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-2 col-form-label">Password <span class="text-danger">*</span></label>
                                        <div class="col-10">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Type the password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="confirm-password" class="col-2 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="col-10">
                                            <input type="password" name="confirm-password" class="form-control" id="confirm-password" data-parsley-equalto="#password" placeholder="Confirm the password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="contact">
                                    <div class="form-group row">
                                        <label for="address" class="col-2 col-form-label">Address</label>
                                        <div class="col-10">
                                            <textarea id="address" name="address" class="form-control" placeholder="Type the secretariat address of the organization"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-2 col-form-label">Phone</label>
                                        <div class="col-10">
                                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Phone number of the PIC (ex: Head of External Department, etc)">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label form="lineid" class="col-2 col-form-label">Line ID</label>
                                        <div class="col-10">
                                            <input type="text" name="lineid" class="form-control" id="lineid" placeholder="Line ID of the PIC or organization">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="website" class="col-2 col-form-label">Website</label>
                                        <div class="col-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="website-addon">http://</span>
                                                </div>
                                                <input type="text" name="website" class="form-control" id="website" aria-describedby="website-addon" placeholder="arek.its.ac.id/iprs">
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
                                                <input type="text" name="facebook" class="form-control" id="facebook" aria-describedby="facebook-addon" placeholder="hublubemits">
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
                                                <input type="text" name="twitter" class="form-control" id="twitter" aria-describedby="twitter-addon" placeholder="hublubemits">
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
                                                <input type="text" name="instagram" class="form-control" id="instagram" aria-describedby="instagram-addon" placeholder="hublubemits">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="form-group text-right m-b-0">
                                    <input type="hidden" name="action" value="add_user">
                                    <input type="hidden" name="editor" value="<?php echo $_SESSION['username']; ?>">
                                    <button type="reset" class="btn btn-light waves-effect m-1-5" id="reset">
                                        Reset
                                    </button>
                                    <button type="submit" class="btn btn-custom waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });

        // Aksi setelah kolom nama panggilan diubah
        function check_username(username) {
            if (username != "") {
                $.ajax({
                    url: 'include/process.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {action: 'ajax_check_username', username: username},
                })
                .done(function(result) {
                    $("#username_info").html(result);
                    if (result != "") {
                        $("#username_info").html("Username not available, please use another username!");
                    }
                    else {
                        $("#username_info").html("Congratulations! Username available.");
                    }
                })
                .fail(function(result) {
                    console.log("error "+result);
                });
            }
            else {
                $("#username_info").html("Please insert username!");
            }
        }
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>