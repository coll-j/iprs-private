<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $id = $_GET['id'];
    $data = get_data("iprs_staff", "*", "id = '$id'");
    foreach ($data as $row) {
        $name = $row['name'];
        $position = $row['position'];
        $photo = $row['photo'];
        $active = $row['active'];
        $whatsapp = $row['whatsapp'];
        $lineid = $row['lineid'];
        $facebook = $row['facebook'];
        $twitter = $row['twitter'];
        $instagram = $row['instagram'];
    }

    if(empty($photo)) $photo = "avatar.png";
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
                        <button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light pull-right" onclick="location.href='./contact-list'"><i class="mdi mdi-keyboard-backspace"></i> Back</button>
                        <h4 class="m-t-0 header-title">Edit Contact Person</h4>
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

                        <form class="form-horizontal" role="form" action="include/process.php" method="post">
                            <div class="form-group row">
                                <label for="" class="col-2 col-form-label">Photo</label>
                                <div class="col-10">
                                    <img src="../upload/contact/<?php echo $photo; ?>" alt="contact-img" class="thumb-lg rounded-circle">
                                    <br><br>
                                    <div class="col-5">
                                        <a href="#photo" class="btn btn-custom waves-effect w-md mr-2 mb-2" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Upload Photo</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Johan Samuel" value="<?php echo $name; ?>" required>
                                </div>                                                    
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-2 col-form-label">Position <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <input type="text" id="position" class="form-control" name="position" placeholder="Minister of External Affairs" value="<?php echo $position; ?>" required>
                                </div>                                                    
                            </div>

                            <div class="form-group row">
                                <label for="active" class="col-2 col-form-label">Active</label>
                                <div class="col-10">
                                    <select id="active" name="active" class="form-control select2" required>
                                        <option value="yes" <?php if($active == 'yes') echo "selected='selected'"; ?>>Yes</option>
                                        <option value="no" <?php if($active == 'no') echo "selected='selected'"; ?>>No</option>
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
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" aria-describedby="whatsapp-addon" placeholder="Phone number" value="<?php echo substr($whatsapp, 3); ?>" required>
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
                                        <input type="text" class="form-control" id="lineid" name="lineid" aria-describedby="lineid-addon" placeholder="Line ID" value="<?php echo $lineid; ?>" required>
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
                                        <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="facebook-addon" placeholder="yourusername" value="<?php echo $facebook; ?>">
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
                                        <input type="text" class="form-control" id="twitter" name="twitter" aria-describedby="twitter-addon" placeholder="yourusername" value="<?php echo $twitter; ?>">
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
                                        <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="instagram-addon" placeholder="yourusername" value="<?php echo $instagram; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group text-right m-b-0">
                                <input type="hidden" name="action" value="edit_contact">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
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
    <div id="photo" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Upload Photo</h4>
        <div class="custom-modal-text">
            <form class="form-horizontal" role="form" action="include/process.php" enctype="multipart/form-data" method="post">
                <div class="form-group m-b-25">
                    <div class="col-12">
                        <input type="hidden" name="action" value="upload_contact_photo">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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