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
                        <button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light pull-right" onclick="location.href='./contact-list'"><i class="mdi mdi-keyboard-backspace"></i> All Contacts</button>
                        <h4 class="m-t-0 header-title">Add Contact Person</h4>
                        <p class="text-muted m-b-30 font-13">
                            Fill the form below to add a contact person.
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

                        <form class="form-horizontal" role="form" action="include/process.php" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Johan Samuel" required>
                                </div>                                                    
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-2 col-form-label">Position <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <input type="text" id="position" class="form-control" name="position" placeholder="Minister of External Affairs" required>
                                </div>                                                    
                            </div>

                            <div class="form-group row">
                                <label for="active" class="col-2 col-form-label">Active <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <select id="active" name="active" class="form-control select2" required>
                                        <option value="yes" selected='selected'>Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="whatsapp" class="col-2 col-form-label">WhatsApp <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="whatsapp-addon">+62</span>
                                        </div>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" aria-describedby="whatsapp-addon" placeholder="Phone number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lineid" class="col-2 col-form-label">Line ID <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="lineid-addon">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="lineid" name="lineid" aria-describedby="lineid-addon" placeholder="Line ID" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook" class="col-2 col-form-label">Facebook (Optional)</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="facebook-addon">facebook.com/</span>
                                        </div>
                                        <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="facebook-addon" placeholder="yourusername">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter" class="col-2 col-form-label">Twitter (Optional)</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="twitter-addon">twitter.com/</span>
                                        </div>
                                        <input type="text" class="form-control" id="twitter" name="twitter" aria-describedby="twitter-addon" placeholder="yourusername">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="instagram" class="col-2 col-form-label">Instagram (Optional)</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="instagram-addon">instagram.com/</span>
                                        </div>
                                        <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="instagram-addon" placeholder="yourusername">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Photo <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <input type="file" class="filestyle" data-btnClass="btn-light" name="photo" aria-describedby="photohelp" required>
                                    <span class="help-block"><small><strong>NOTE: </strong>Maximum file size is <strong>1 MB</strong>.</small></span>
                                </div>
                            </div>
                            
                            <br>
                            <div class="form-group text-right m-b-0">
                                <input type="hidden" name="action" value="add_contact">
                                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                <button type="reset" class="btn btn-light waves-effect m-1-5" id="reset">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-custom waves-effect waves-light">
                                    Submit
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

    <!-- Init Js file -->
    <script type="text/javascript" src="../<?php echo $assets_folder; ?>/pages/jquery.form-advanced.init.js"></script>
    <script src="../<?php echo $assets_folder; ?>/pages/jquery.form-pickers.init.js"></script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>