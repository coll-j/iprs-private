<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $stats      = array("approve", "disapprove");
    $stats_text = array("Approve", "Disapprove");
    $stats_col  = array("success", "danger");
    $stats_length = count($stats);

    $relation   = array("Sponsorship", "Media Partner", "Join Program");
    $length     = count($relation);

    $id         = $_GET['id'];
    $datas      = get_data("iprs_proposal", "*", "id = '$id'");
    foreach ($datas as $row) {
        $event_name = $row['event_name'];
        $event_type = $row['event_type'];
        $file_name = $row['file_name'];
    }

    $download = "location.href='../upload/proposal/". $file_name ."'";
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

<?php $event = get_data("iprs_event_type", "name", "active = 'yes'"); ?>

<body <?php foreach($event as $row) { if($event_type == $row['name']) { echo 'onload="hidefield()"'; } else { echo 'onload="showfield(Others)"'; } } ?>>

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
                        <button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light pull-right" onclick="location.href='./proposal-list'"><i class="mdi mdi-keyboard-backspace"></i> Back</button>
                        <h4 class="m-t-0 header-title">Editing Proposal</h4>
                        <p class="text-muted m-b-30 font-13">
                            You're now editing <strong><?php echo $event_name; ?></strong>.
                        </p>

                        <form class="form-horizontal" role="form" action="include/process.php" method="post">
                            <?php foreach ($datas as $data) { ?>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Event Name</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="event_name" value="<?php echo $data['event_name']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Types of Event</label>
                                    <div class="col-10">
                                        <select class="form-control select2" name="event_type" onchange="showfield(this.options[this.selectedIndex].value)">
                                            <option value="">Choose...</option>
                                            <?php $event = get_data("iprs_event_type", "name", "active = 'yes'", "id ASC"); ?>
                                            <?php $get = false; ?>
                                            <?php foreach ($event as $row) { ?>
                                                <option value="<?php echo $row['name']; ?>" <?php if($data['event_type'] == $row['name']) { echo 'selected="selected"'; $get = true; } ?>><?php echo $row['name']; ?></option>
                                            <?php } ?>
                                            <option value="Others" <?php if($get == false) { echo 'selected="selected"'; $event_type = $data['event_type']; } ?>>Other</option>
                                        </select>
                                        <br><br>
                                        <input type="text" class="form-control" id="types_other" name="type_other" placeholder="Write other types of your event" value="<?php if($get == false) echo $event_type; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Event Description</label>
                                    <div class="col-10">
                                        <textarea class="form-control" rows="5" name="event_desc"><?php echo $data['event_desc']; ?></textarea>
                                    </div>
                                </div>

                                <?php
                                    $date = explode("-", $data['event_time']); // Date format yyyy-mm-hh
                                ?>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Event Time</label>
                                    <div class="col-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="event_time" value="<?php echo "$date[1]/$date[2]/$date[0]"; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Event Target</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="event_target" value="<?php echo $data['event_target']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Event PIC</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="event_pic" value="<?php echo $data['event_pic']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Contact Person</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="event_cp" value="<?php echo $data['event_cp']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-8">
                                        <div class="row">
                                            <label class="col-3 col-form-label">1st Stakeholder</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="stakeholder1" placeholder="Write your 1st stakeholder you wanna join (optional)" value="<?php echo $data['stakeholder1']; ?>">
                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="relation1">Types of Relation</label>
                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
                                            <div class="custom-control custom-radio" id="relation1">
                                                <input type="radio" id="relation1Radio<?php echo $y; ?>" name="relation1" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($data['relation1'] == $relation[$x]) { echo "checked"; } ?>>
                                                <label class="custom-control-label" for="relation1Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                            </div>
                                        <?php } ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="relation1Radio4" name="relation1" class="custom-control-input" value="Other" <?php if($data['relation1'] != $relation[0] && $data['relation1'] != $relation[1] && $data['relation1'] != $relation[2]) echo "checked"; ?>>
                                            <label class="custom-control-label" for="relation1Radio4">
                                            <input type="text" name="relation1_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($data['relation1'] != $relation[0] && $data['relation1'] != $relation[1] && $data['relation1'] != $relation[2]) echo $data['relation1']; ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-8">
                                        <div class="row">
                                            <label class="col-3 col-form-label">2nd Stakeholder</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="stakeholder2" placeholder="Write your 2nd stakeholder you wanna join (optional)" value="<?php echo $data['stakeholder2']; ?>">
                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="relation2">Types of Relation</label>
                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
                                            <div class="custom-control custom-radio" id="relation2">
                                                <input type="radio" id="relation2Radio<?php echo $y; ?>" name="relation2" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($data['relation2'] == $relation[$x]) { echo "checked"; } ?>>
                                                <label class="custom-control-label" for="relation2Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                            </div>
                                        <?php } ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="relation2Radio4" name="relation2" class="custom-control-input" value="Other" <?php if($data['relation2'] != $relation[0] && $data['relation2'] != $relation[1] && $data['relation2'] != $relation[2]) echo "checked"; ?>>
                                            <label class="custom-control-label" for="relation2Radio4">
                                            <input type="text" name="relation2_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($data['relation2'] != $relation[0] && $data['relation2'] != $relation[1] && $data['relation2'] != $relation[2]) echo $data['relation2']; ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-8">
                                        <div class="row">
                                            <label class="col-3 col-form-label">3rd Stakeholder</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="stakeholder3" placeholder="Write your 3rd stakeholder you wanna join (optional)" value="<?php echo $data['stakeholder3']; ?>">
                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="relation3">Types of Relation</label>
                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
                                            <div class="custom-control custom-radio" id="relation3">
                                                <input type="radio" id="relation3Radio<?php echo $y; ?>" name="relation3" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($data['relation3'] == $relation[$x]) { echo "checked"; } ?>>
                                                <label class="custom-control-label" for="relation3Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                            </div>
                                        <?php } ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="relation3Radio4" name="relation3" class="custom-control-input" value="Other" <?php if($data['relation3'] != $relation[0] && $data['relation3'] != $relation[1] && $data['relation3'] != $relation[2]) echo "checked"; ?>>
                                            <label class="custom-control-label" for="relation3Radio4">
                                            <input type="text" name="relation3_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($data['relation3'] != $relation[0] && $data['relation3'] != $relation[1] && $data['relation3'] != $relation[2]) echo $data['relation3']; ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-8">
                                        <div class="row">
                                            <label class="col-3 col-form-label">4th Stakeholder</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="stakeholder4" placeholder="Write your 4th stakeholder you wanna join (optional)" value="<?php echo $data['stakeholder4']; ?>">
                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="relation4">Types of Relation</label>
                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
                                            <div class="custom-control custom-radio" id="relation4">
                                                <input type="radio" id="relation4Radio<?php echo $y; ?>" name="relation4" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($data['relation4'] == $relation[$x]) { echo "checked"; } ?>>
                                                <label class="custom-control-label" for="relation4Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                            </div>
                                        <?php } ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="relation4Radio4" name="relation4" class="custom-control-input" value="Other" <?php if($data['relation4'] != $relation[0] && $data['relation4'] != $relation[1] && $data['relation4'] != $relation[2]) echo "checked"; ?>>
                                            <label class="custom-control-label" for="relation4Radio4">
                                            <input type="text" name="relation4_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($data['relation4'] != $relation[0] && $data['relation4'] != $relation[1] && $data['relation4'] != $relation[2]) echo $data['relation4']; ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-8">
                                        <div class="row">
                                            <label class="col-3 col-form-label">5th Stakeholder</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="stakeholder5" placeholder="Write your 1st stakeholder you wanna join (optional)" value="<?php echo $data['stakeholder5']; ?>">
                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="relation5">Types of Relation</label>
                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
                                            <div class="custom-control custom-radio" id="relation5">
                                                <input type="radio" id="relation5Radio<?php echo $y; ?>" name="relation5" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($data['relation5'] == $relation[$x]) { echo "checked"; } ?>>
                                                <label class="custom-control-label" for="relation5Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
                                            </div>
                                        <?php } ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="relation5Radio4" name="relation5" class="custom-control-input" value="Other" <?php if($data['relation5'] != $relation[0] && $data['relation5'] != $relation[1] && $data['relation5'] != $relation[2]) echo "checked"; ?>>
                                            <label class="custom-control-label" for="relation5Radio4">
                                            <input type="text" name="relation5_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($data['relation5'] != $relation[0] && $data['relation5'] != $relation[1] && $data['relation5'] != $relation[2]) echo $data['relation5']; ?>"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="example-email">Stats</label>
                                    <div class="col-10">
                                        <?php for($i = 0; $i < $stats_length; $i++) { ?>
                                            <div class="radio radio-<?php if($data['stats'] == $stats[$i]) echo $stats_col[$i]; ?> form-check-inline">
                                                <input type="radio" id="stats<?php echo $i; ?>" value="<?php echo $stats[$i]; ?>" name="stats" <?php if($data['stats'] == $stats[$i]) echo "checked"; ?>>
                                                <label for="statsp<?php echo $i; ?>"> <?php echo $stats_text[$i]; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group text-right m-b-0">
                                    <input type="hidden" name="action" value="edit_proposal">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                    <button type="button" onclick="location.href='./proposal-list'" class="btn btn-light waves-light waves-effect"><i class="mdi mdi-keyboard-backspace"></i> Back</button>
                                    <button type="reset" class="btn btn-light waves-effect m-l-5" id="reset">
                                        Reset
                                    </button>
                                    <button class="btn btn-custom waves-effect waves-light" type="submit">
                                        Submit
                                    </button>
                                </div>
                            <?php } ?>
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

    <script type="text/javascript">
        function showfield(name) {
            if(name == 'Others') document.getElementById('types_other').style.display="block";
            else document.getElementById('types_other').style.display="none";
        }
         
         function hidefield() {
            document.getElementById('types_other').style.display="none";
        }
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>