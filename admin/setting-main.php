<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");
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
                        <h4 class="m-t-0 header-title">Main Setting</h4>
                        <p class="text-muted m-b-30 font-13">
                            This is the main setting of <?php echo $system_name; ?>. Be careful when changing some settings.
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

                        <form class="form-horizontal" role="form" action="include/process.php" method="post">
                            <div class="form-group row">
                                <label for="system_name" class="col-2 col-form-label">System Name</label>
                                <div class="col-10">
                                    <input type="text" name="system_name" id="system_name" class="form-control" placeholder="IPRS BEM ITS" value="<?php echo $system_name; ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-2 col-form-label">Logo</label>
                                <div class="col-10">
                                    <img src="../<?php echo $assets_folder; ?>/images/<?php echo $logo; ?>" alt="logo">
                                    <br><br>
                                    <a href="#logo" class="btn btn-custom waves-effect w-md mr-2 mb-2" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Change Logo</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-2 col-form-label">Favicon</label>
                                <div class="col-10">
                                    <img src="../<?php echo $assets_folder; ?>/images/<?php echo $favicon; ?>" alt="favicon">
                                    <br><br>
                                    <a href="#favicon" class="btn btn-custom waves-effect w-md mr-2 mb-2" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Change Favicon</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-2 col-form-label">Login Background</label>
                                <div class="col-10">
                                    <img src="../<?php echo $assets_folder; ?>/images/<?php echo $login_background; ?>" alt="login_background" class="card-img-top img-fluid">
                                    <br><br>
                                    <a href="#login" class="btn btn-custom waves-effect w-md mr-2 mb-2" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Change Picture</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="main_email" class="col-2 col-form-label">Main Email</label>
                                <div class="col-10">
                                    <input type="text" name="main_email" id="main_email" class="form-control" placeholder="hubunganluar1819@gmail.com" value="<?php echo $main_email; ?>" required>
                                </div>
                            </div>

                            <?php $data = get_data("iprs_timezone", "timezone", "", "id ASC"); ?>

                            <div class="form-group row">
                                <label for="timezone" class="col-2 col-form-label">Timezone</label>
                                <div class="col-10">
                                    <select name="timezone" id="timezone" class="form-control select2">
                                        <?php foreach ($data as $row) { ?>
                                            <option value="<?php echo $row['timezone']; ?>" <?php if($row['timezone'] == $timezone) echo "selected='selected'"; ?>><?php echo $row['timezone']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="footer" class="col-2 col-form-label">Footer</label>
                                <div class="col-10">
                                    <input type="text" name="footer" id="footer" class="form-control" placeholder="Enter footer here" value="<?php echo $footer; ?>" required>
                                </div>
                            </div>
                            
                            <br>
                            <div class="form-group text-right m-b-0">
                                <input type="hidden" name="action" value="main_setting">
                                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                <button type="reset" class="btn btn-light waves-effect m-1-5" id="reset">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-custom waves-effect waves-light">
                                    Save Changes
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- Modal -->
    <div id="logo" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Upload Logo</h4>
        <div class="custom-modal-text">
            <form class="form-horizontal" action="include/process.php" enctype="multipart/form-data" method="post">
                <div class="form-group m-b-25">
                    <div class="col-12">
                        <input type="hidden" name="action" value="upload_logo">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                        <input type="file" class="filestyle" data-btnClass="btn-light" name="photo" aria-describedby="photohelp">
                        <small id="photohelp" class="form-text text-muted"><strong>NOTE:</strong> Max file size is <strong>1 MB</strong> and best image resolution is <strong>100 x 30 px</strong>.</small>
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

    <!-- Modal -->
    <div id="favicon" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Upload Favicon</h4>
        <div class="custom-modal-text">
            <form class="form-horizontal" action="include/process.php" enctype="multipart/form-data" method="post">
                <div class="form-group m-b-25">
                    <div class="col-12">
                        <input type="hidden" name="action" value="upload_favicon">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                        <input type="file" class="filestyle" data-btnClass="btn-light" name="photo" aria-describedby="photohelp">
                        <small id="photohelp" class="form-text text-muted"><strong>NOTE:</strong> Max file size is <strong>1 MB</strong> and best image resolution is <strong>64 x 64 px</strong>.</small>
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

    <!-- Modal -->
    <div id="login" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Upload Picture</h4>
        <div class="custom-modal-text">
            <form class="form-horizontal" action="include/process.php" enctype="multipart/form-data" method="post">
                <div class="form-group m-b-25">
                    <div class="col-12">
                        <input type="hidden" name="action" value="upload_login_background">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                        <input type="file" class="filestyle" data-btnClass="btn-light" name="photo" aria-describedby="photohelp">
                        <small id="photohelp" class="form-text text-muted"><strong>NOTE:</strong> Max file size is <strong>1 MB</strong>.</small>
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

    <!-- Modal-Effect -->
    <script src="../<?php echo $plugins_folder; ?>/custombox/js/custombox.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/custombox/js/legacy.min.js"></script>

    <!-- Init Js file -->
    <script type="text/javascript" src="../<?php echo $assets_folder; ?>/pages/jquery.form-advanced.init.js"></script>
    <script src="../<?php echo $assets_folder; ?>/pages/jquery.form-pickers.init.js"></script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>