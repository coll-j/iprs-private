<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");

    $user = get_data("iprs_user", "form", "username = '$_SESSION[username]'");
    foreach ($user as $row) {
        $form = $row['form'];
    }

    $datas = get_data("iprs_database", "*", "created_by = '$_SESSION[username]'");
    $total = count($datas);

    $need = $total % 3;
    if ($need == 1) $need_string = "two";
    if ($need == 2) $need_string = "one";

    $stats_text = array("Alumni", "Non Alumni");
    $stats_slug = array("alumni", "non_alumni");
    $length = count($stats_text);

    $id         = $_GET['id'];
    $datas      = get_data("iprs_database", "*", "id = '$id'");
    foreach ($datas as $row) {
        $data_name = $row['name'];
        $comp_types = $row['comp_types'];
    }
?>

<?php require_once("include/pages/header_start.php"); ?>

<!-- Plugins css-->
<link href="<?php echo $plugins_folder; ?>/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="<?php echo $plugins_folder; ?>/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="<?php echo $plugins_folder; ?>/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $plugins_folder; ?>/switchery/switchery.min.css">

<!-- Plugins css -->
<link href="<?php echo $plugins_folder; ?>/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="<?php echo $plugins_folder; ?>/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?php echo $plugins_folder; ?>/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?php echo $plugins_folder; ?>/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="<?php echo $plugins_folder; ?>/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!--Form Wizard-->
<link rel="stylesheet" type="text/css" href="<?php echo $plugins_folder; ?>/jquery.steps/css/jquery.steps.css" />

<?php require_once("include/pages/header_end.php"); ?>

<?php $data = get_data("iprs_comp_type", "*", "active = 'yes'", "id ASC"); ?>

<body <?php foreach($data as $type) { if($comp_types == $type['name']) { echo "onload='hidefield()'"; } else { echo "onload='showfiled()'"; }} ?>'>

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

                    <!-- FORM INPUT PROPOSAL -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><?php echo $title; ?></h4>
                                <div class="pull-right">
                                    <button type="button" onclick="location.href='./mydatabase'" class="btn btn-custom waves-light waves-effect"><i class="mdi mdi-keyboard-backspace"></i> Back</button>
                                </div>
                                <p class="text-muted m-b-30 font-14">
                                    You're now editing database of <strong><?php echo $data_name; ?></strong>.
                                </p>

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
                                    <div class="col-12">
                                        <div class="p-20">
                                            <form class="form-horizontal" role="form" action="include/process.php" method="post">
                                                <?php foreach ($datas as $row) { ?>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Name</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="name" placeholder="Johan Samuel" value="<?php echo $row['name']; ?>">
                                                        </div>                                                    
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Address</label>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="address" rows="3" placeholder="Jl. Gebang Lor 99 Sukolilo, Surabaya ID"><?php echo $row['address']; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Phone Number</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="phone" placeholder="(+62) xxx xxxx xxxx" value="<?php echo $row['phone']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Email</label>
                                                        <div class="col-10">
                                                            <input type="email" class="form-control" name="email" placeholder="personmail@company.com" value="<?php echo $row['email']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Job Position</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="position" placeholder="Chief Executive Officer" value="<?php echo $row['position']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Company</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="company" placeholder="PT. Company, Tbk." value="<?php echo $row['company']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Comp. Address</label>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="comp_address" rows="3" placeholder="Jl. Tunjungan 104 Surabaya ID"><?php echo $row['comp_address']; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Types of Company</label>
                                                        <div class="col-10">
                                                            <select class="form-control select2" name="comp_type" onchange="showfield(this.options[this.selectedIndex].value)">
                                                                <option value="">Choose...</option>
                                                                <?php $data = get_data("iprs_comp_type", "*", "active = 'yes'", "id ASC"); ?>
                                                                <?php $get = false; ?>
                                                                <?php foreach ($data as $type) { ?>
                                                                    <option value="<?php echo $type['name']; ?>" <?php if($row['comp_types'] == $type['name']) { echo 'selected="selected"'; $get = true; } ?>><?php echo $type['name']; ?></option>
                                                                <?php } ?>
                                                                <option value="Others" <?php foreach($data as $type) { if($row['comp_types'] != $type['name'] && $get == false) { echo 'selected="selected"'; $comp_types = $row['comp_types']; }} ?>>Other</option>
                                                            </select>
                                                            <br><br>
                                                            <input type="text" class="form-control" id="types_other" name="comp_type_other" placeholder="Write other types of the company" value="<?php if($get == false) echo $comp_types; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Comp. Email</label>
                                                        <div class="col-10">
                                                            <input type="email" class="form-control" name="comp_email" placeholder="ceo@company.com" value="<?php echo $row['comp_email']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Comp. Telephone</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="comp_contact" placeholder="(+62) xxx xxxx" value="<?php echo $row['comp_contact']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Comp. Fax</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="comp_fax" placeholder="(+62) xxx xxxx" value="<?php echo $row['comp_fax']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Stats</label>
                                                        <div class="col-10">
                                                            <select class="form-control select2" name="stats" onchange="showdepartment(this.options[this.selectedIndex].value)">
                                                                <option value="">Choose...</option>
                                                                <?php for ($x = 0; $x < $length; $x++) { ?>
                                                                    <option value="<?php echo $stats_slug[$x]; ?>" <?php if($row['stats'] == $stats_slug[$x]) { echo "selected='selected'"; } ?>><?php echo $stats_text[$x]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Department</label>
                                                        <div class="col-10">
                                                            <select class="form-control select2" name="department">
                                                                <option value=""></option>
                                                                <?php $data = get_data("iprs_department", "*", "active = 'yes'", "id ASC"); ?>
                                                                <?php foreach ($data as $department) { ?>
                                                                    <option value="<?php echo $department['slug']; ?>" <?php if($row['department'] == $department['slug']) echo "selected='selected'"; ?>><?php echo $department['name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <span class="help-block"><small><strong>NOTE:</strong> You can leave it blank if <strong><?php echo $data_name; ?></strong> is <strong>not alumni</strong>.</small></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Generation</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="number" name="generation" placeholder="Generation, ex: 1997" value="<?php echo $row['generation']; ?>">
                                                            <span class="help-block"><small><strong>NOTE:</strong> You can leave it blank if <strong><?php echo $data_name; ?></strong> is <strong>not alumni</strong>.</small></span>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="form-group text-right m-b-0">
                                                        <input type="hidden" name="action" value="edit_database">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                                        <button class="btn btn-custom waves-effect waves-light" type="submit">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
                                                            Reset
                                                        </button>
                                                    </div>

                                                <?php } ?>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                    </div>
                    <!-- END OF FORM INPUT PROPOSAL -->
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php require_once("include/pages/footer_start.php"); ?>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <?php require_once("include/pages/jquery.php"); ?>

    <!-- plugin js -->
    <script src="<?php echo $plugins_folder; ?>/switchery/switchery.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-maxlength/bootstrap-maxlength.js" type="text/javascript"></script>

    <!-- plugin js -->
    <script src="<?php echo $plugins_folder; ?>/moment/moment.js"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-timepicker/bootstrap-timepicker.js"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo $plugins_folder; ?>/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!--Form Wizard-->
    <script src="<?php echo $plugins_folder; ?>/jquery.steps/js/jquery.steps.min.js" type="text/javascript"></script>

    <!--wizard initialization-->
    <script src="<?php echo $assets_folder; ?>/pages/jquery.wizard-init.js" type="text/javascript"></script>

    <!-- Init Js file -->
    <script type="text/javascript" src="<?php echo $assets_folder; ?>/pages/jquery.form-advanced.init.js"></script>
    <script src="<?php echo $assets_folder; ?>/pages/jquery.form-pickers.init.js"></script>

    <script type="text/javascript">
        function showfield(name) {
            if(name == 'Others') document.getElementById('types_other').style.display="block";
            else document.getElementById('types_other').style.display="none";
        }
         
         function hidefield() {
            document.getElementById('types_other').style.display='none';
        }

        function showdepartment(name) {
            if(name == 'Alumni') document.getElementById('department').style.display="block";
            else document.getElementById('department').style.display='none';
        }

        function hidedepartment() {
            document.getElementById('department').style.display='none';
        }
    </script>

    <?php require_once("include/pages/app.php"); ?>

</body>
<?php require_once("include/pages/footer_end.php"); ?>