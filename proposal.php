<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");

    $relation = array("Sponsorship", "Media Partner", "Join Program");
    $lenght = count($relation);

    $user = get_data("iprs_user", "form, level", "username = '$_SESSION[username]'");
    foreach ($user as $row) {
        $form = $row['form'];
        $level = $row['level'];
    }

    $data = get_data("iprs_database", "id", "created_by = '$_SESSION[username]'");
    $total = count($data);

    $need = $total % 3;
    if ($need == 1) $need_string = "two";
    else if ($need == 2) $need_string = "one";
    else $need_string = "three";
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

<?php require_once("include/pages/header_end.php"); ?>

<body <?php if(!isset($_SESSION['type_other'])) { echo "onload='hidefield()'"; }?>">

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
                                    <button type="button" onclick="location.href='./myproposal'" class="btn btn-custom waves-light waves-effect">My Proposal</button>
                                </div>
                                <p class="text-muted m-b-30 font-14">
                                    Fill the form and upload your proposal with PDF format document (.pdf) below.
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

                                <br>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <?php if (($form == 'active' && ($need == 0 || $need == null)) || $level == "admin" || $level == "developer") { ?>
                                                <form class="form-horizontal" role="form" action="include/process.php" method="post" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Event Name <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="event_name" placeholder="ITS Expo" <?php if(!isset($_SESSION['event_name'])) echo "autofocus='autofocus'"; ?> value="<?php if(isset($_SESSION['event_name'])) { echo $_SESSION['event_name']; } ?>"  required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Types of Event <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <select class="form-control select2" name="event_type" onchange="showfield(this.options[this.selectedIndex].value)" required>
                                                                <option value="">Choose...</option>
                                                                <?php $data = get_data("iprs_event_type", "*", "active = 'yes'", "id ASC"); ?>
                                                                <?php foreach ($data as $row) { ?>
                                                                    <option value="<?php echo $row['name']; ?>" <?php if(isset($_SESSION['event_type']) && $_SESSION['event_type'] == $row['name']) { echo 'selected="selected"'; } ?>><?php echo $row['name']; ?></option>
                                                                <?php } ?>
                                                                <option value="Others" <?php if(isset($_SESSION['event_type']) && $_SESSION['event_type'] == "Others") { echo 'selected="selected"'; } ?>>Other</option>
                                                            </select>
                                                            <br><br>
                                                            <input type="text" class="form-control" id="types_other" name="type_other" placeholder="Write other types of your event" value="<?php if(isset($_SESSION['type_other'])) { echo $_SESSION['type_other']; } ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Event Description <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="event_desc" rows="5" placeholder="Describe your event in one or two paragraphs" required><?php if(isset($_SESSION['event_desc'])) { echo $_SESSION['event_desc']; } ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Event Time <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="event_time" value="<?php if(isset($_SESSION['event_time'])) { echo $_SESSION['event_time']; } ?>" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Event Target <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="event_target" placeholder="Students" value="<?php if(isset($_SESSION['event_target'])) { echo $_SESSION['event_target']; } ?>" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Event PIC <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="event_pic" placeholder="Johan Samuel" value="<?php if(isset($_SESSION['event_pic'])) { echo $_SESSION['event_pic']; } ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Contact Person <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="event_cp" placeholder="(+62) xxx xxxx xxxx / Line ID" value="<?php if(isset($_SESSION['event_cp'])) { echo $_SESSION['event_cp']; } ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-8">
                                                            <div class="row">
                                                                <label class="col-3 col-form-label">1st Stakeholder</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="stakeholder1" placeholder="Write your 1st stakeholder you wanna join (optional)" value="<?php if(isset($_SESSION['stakeholder1'])) { echo $_SESSION['stakeholder1']; } ?>">
                                                                    <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="relation1">Types of Relation</label>
                                                            <?php for ($x = 0, $y = 1; $x < $lenght; $x++, $y++) { ?>
                                                                <div class="custom-control custom-radio" id="relation1">
                                                                    <input type="radio" id="relation1Radio<?php echo $y; ?>" name="relation1" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if(isset($_SESSION['relation1']) && $_SESSION['relation1'] == $relation[$x]) { echo "checked"; } ?>>
                                                                    <label class="custom-control-label" for="relation1Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="relation1Radio4" name="relation1" class="custom-control-input" value="Other" <?php if(isset($_SESSION['relation1']) && $_SESSION['relation1'] == "Other") { echo "checked"; } ?>>
                                                                <label class="custom-control-label" for="relation1Radio4">
                                                                <input type="text" name="relation1_other" class="form-control form-control-sm" placeholder="Other" value="<?php if(isset($_SESSION['relation1_other']) && $_SESSION['relation1'] == "Other") { echo $_SESSION['relation1_other']; } ?>"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-8">
                                                            <div class="row">
                                                                <label class="col-3 col-form-label">2nd Stakeholder</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="stakeholder2" placeholder="Write your 2nd stakeholder you wanna join (optional)" value="<?php if(isset($_SESSION['stakeholder2'])) { echo $_SESSION['stakeholder2']; } ?>">
                                                                    <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="relation2">Types of Relation</label>
                                                            <?php for ($x = 0, $y = 1; $x < $lenght; $x++, $y++) { ?>
                                                                <div class="custom-control custom-radio" id="relation2">
                                                                    <input type="radio" id="relation2Radio<?php echo $y; ?>" name="relation2" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if(isset($_SESSION['relation2']) && $_SESSION['relation2'] == $relation[$x]) { echo "checked"; } ?>>
                                                                    <label class="custom-control-label" for="relation2Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="relation2Radio4" name="relation2" class="custom-control-input" value="Other" <?php if(isset($_SESSION['relation2']) && $_SESSION['relation2'] == "Other") { echo "checked"; } ?>>
                                                                <label class="custom-control-label" for="relation2Radio4">
                                                                <input type="text" name="relation2_other" class="form-control form-control-sm" placeholder="Other" value="<?php if(isset($_SESSION['relation2_other']) && $_SESSION['relation2'] == "Other") { echo $_SESSION['relation2_other']; } ?>"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-8">
                                                            <div class="row">
                                                                <label class="col-3 col-form-label">3rd Stakeholder</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="stakeholder3" placeholder="Write your 3rd stakeholder you wanna join (optional)" value="<?php if(isset($_SESSION['stakeholder3'])) { echo $_SESSION['stakeholder3']; } ?>">
                                                                    <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="relation3">Types of Relation</label>
                                                            <?php for ($x = 0, $y = 1; $x < $lenght; $x++, $y++) { ?>
                                                                <div class="custom-control custom-radio" id="relation3">
                                                                    <input type="radio" id="relation3Radio<?php echo $y; ?>" name="relation3" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if(isset($_SESSION['relation3']) && $_SESSION['relation3'] == $relation[$x]) { echo "checked"; } ?>>
                                                                    <label class="custom-control-label" for="relation3Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="relation3Radio4" name="relation3" class="custom-control-input" value="Other" <?php if(isset($_SESSION['relation3']) && $_SESSION['relation3'] == "Other") { echo "checked"; } ?>>
                                                                <label class="custom-control-label" for="relation3Radio4">
                                                                <input type="text" name="relation3_other" class="form-control form-control-sm" placeholder="Other" value="<?php if(isset($_SESSION['relation3_other']) && $_SESSION['relation3'] == "Other") { echo $_SESSION['relation3_other']; } ?>"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-8">
                                                            <div class="row">
                                                                <label class="col-3 col-form-label">4th Stakeholder</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="stakeholder4" placeholder="Write your 4th stakeholder you wanna join (optional)" value="<?php if(isset($_SESSION['stakeholder4'])) { echo $_SESSION['stakeholder4']; } ?>">
                                                                    <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="relation4">Types of Relation</label>
                                                            <?php for ($x = 0, $y = 1; $x < $lenght; $x++, $y++) { ?>
                                                                <div class="custom-control custom-radio" id="relation4">
                                                                    <input type="radio" id="relation4Radio<?php echo $y; ?>" name="relation4" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if(isset($_SESSION['relation4']) && $_SESSION['relation4'] == $relation[$x]) { echo "checked"; } ?>>
                                                                    <label class="custom-control-label" for="relation4Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="relation4Radio4" name="relation4" class="custom-control-input" value="Other" <?php if(isset($_SESSION['relation4']) && $_SESSION['relation4'] == "Other") { echo "checked"; } ?>>
                                                                <label class="custom-control-label" for="relation4Radio4">
                                                                <input type="text" name="relation4_other" class="form-control form-control-sm" placeholder="Other" value="<?php if(isset($_SESSION['relation4_other']) && $_SESSION['relation4'] == "Other") { echo $_SESSION['relation4_other']; } ?>"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-8">
                                                            <div class="row">
                                                                <label class="col-3 col-form-label">5th Stakeholder</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="stakeholder5" placeholder="Write your 1st stakeholder you wanna join (optional)" value="<?php if(isset($_SESSION['stakeholder5'])) { echo $_SESSION['stakeholder5']; } ?>">
                                                                    <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="relation5">Types of Relation</label>
                                                            <?php for ($x = 0, $y = 1; $x < $lenght; $x++, $y++) { ?>
                                                                <div class="custom-control custom-radio" id="relation5">
                                                                    <input type="radio" id="relation5Radio<?php echo $y; ?>" name="relation5" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if(isset($_SESSION['relation5']) && $_SESSION['relation5'] == $relation[$x]) { echo "checked"; } ?>>
                                                                    <label class="custom-control-label" for="relation5Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="relation5Radio4" name="relation5" class="custom-control-input" value="Other" <?php if(isset($_SESSION['relation5']) && $_SESSION['relation5'] == "Other") { echo "checked"; } ?>>
                                                                <label class="custom-control-label" for="relation5Radio4">
                                                                <input type="text" name="relation5_other" class="form-control form-control-sm" placeholder="Other" value="<?php if(isset($_SESSION['relation5_other']) && $_SESSION['relation5'] == "Other") { echo $_SESSION['relation5_other']; } ?>"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Proposal File <span class="text-danger">*</span></label>
                                                        <div class="col-5">
                                                            <input type="file" class="filestyle" data-placeholder="No file" name="file" data-btnClass="btn-light waves-effect" required>
                                                            <span class="help-block"><small><strong>NOTE: </strong>File format must .pdf and maximum size is 2MB</small></span>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="form-group text-right m-b-0">
                                                        <input type="hidden" name="action" value="add_proposal">
                                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                                        <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
                                                            Reset
                                                        </button>
                                                        <button class="btn btn-custom waves-effect waves-light" type="submit">
                                                            Submit
                                                        </button>
                                                    </div>

                                                    <?php
                                                    unset($_SESSION['event_name']);
                                                    unset($_SESSION['event_type']);
                                                    unset($_SESSION['type_other']);
                                                    unset($_SESSION['event_desc']);
                                                    unset($_SESSION['event_time']);
                                                    unset($_SESSION['event_target']);
                                                    unset($_SESSION['event_pic']);
                                                    unset($_SESSION['event_cp']);
                                                    unset($_SESSION['stakeholder1']);
                                                    unset($_SESSION['stakeholder2']);
                                                    unset($_SESSION['stakeholder3']);
                                                    unset($_SESSION['stakeholder4']);
                                                    unset($_SESSION['stakeholder5']);
                                                    unset($_SESSION['relation1']);
                                                    unset($_SESSION['relation2']);
                                                    unset($_SESSION['relation3']);
                                                    unset($_SESSION['relation4']);
                                                    unset($_SESSION['relation5']);
                                                    unset($_SESSION['relation1_other']);
                                                    unset($_SESSION['relation2_other']);
                                                    unset($_SESSION['relation3_other']);
                                                    unset($_SESSION['relation4_other']);
                                                    unset($_SESSION['relation5_other']);
                                                    ?>

                                                </form>
                                            <?php } else { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>ERROR:</strong> You have uploaded a proposal last time. If you want upload a proposal again, you must input at least <strong><?php echo $need_string; ?></strong> databases in <a href="./database">here</a>.
                                                </div>
                                            <?php } ?>
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
    </script>

    <?php require_once("include/pages/app.php"); ?>

</body>
<?php require_once("include/pages/footer_end.php"); ?>