<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");

    $relation 	= array("Sponsorship", "Media Partner", "Join Program");
    $length 	= count($relation);

    $id 		= $_GET['id'];
    $datas 		= get_data("iprs_proposal", "*", "id = '$id'");
    foreach ($datas as $row) {
    	$event_name = $row['event_name'];
    }

   	$download = "location.href='upload/proposal/". $row['file_name'] ."'";
?>

<?php require_once("include/pages/header_start.php"); ?>

<?php require_once("include/pages/header_end.php"); ?>

<body <?php if(isset($_SESSOIN['type_other'])) { echo "onload='hidefield()'"; } ?>">

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
                                    <button type="button" onclick="location.href='./myproposal'" class="btn btn-custom waves-light waves-effect"><i class="mdi mdi-keyboard-backspace"></i> Back</button>
                                </div>
                                <p class="text-muted m-b-30 font-14">
                                    You're now editing proposal of <strong><?php echo $event_name; ?></strong>.
                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <form class="form-horizontal" role="form" action="include/process.php" method="post">
                                            	<?php foreach($datas as $row) { ?>
	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label">Event Name</label>
	                                                    <div class="col-10">
	                                                        <p class="form-control-static"><strong><?php echo $row['event_name'] ?></strong></p>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label" for="example-email">Types of Event</label>
	                                                    <div class="col-10">
	                                                        <p class="form-control-static"><?php echo $row['event_type']; ?></p>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label">Event Description</label>
	                                                    <div class="col-10">
	                                                        <p class="form-control-static"><?php echo $row['event_desc']; ?></p>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label">Event Time</label>
	                                                    <div class="col-10">
	                                                        <p class="form-control-static"><?php echo show_date($row['event_time']); ?></p>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label">Event Target</label>
	                                                    <div class="col-10">
	                                                        <p class="form-control-static"><?php echo $row['event_target']; ?></p>
	                                                    </div>
	                                                </div>


	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label">Event PIC</label>
	                                                    <div class="col-10">
	                                                        <p class="form-control-static"><?php echo $row['event_pic']; ?></p>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label">Contact Person</label>
	                                                    <div class="col-10">
	                                                        <p class="form-control-static"><?php echo $row['event_cp']; ?></p>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <div class="col-8">
	                                                        <div class="row">
	                                                            <label class="col-3 col-form-label">1st Stakeholder</label>
	                                                            <div class="col-8">
	                                                                <input type="text" class="form-control" name="stakeholder1" placeholder="Write your 1st stakeholder you wanna join (optional)" value="<?php if($row['stakeholder1'] != null) { echo $row['stakeholder1']; } ?>">
	                                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-4">
	                                                        <label for="relation1">Types of Relation</label>
	                                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
	                                                            <div class="custom-control custom-radio" id="relation1">
	                                                                <input type="radio" id="relation1Radio<?php echo $y; ?>" name="relation1" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($row['relation1'] == $relation[$x]) { echo "checked"; } ?>>
	                                                                <label class="custom-control-label" for="relation1Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
	                                                            </div>
	                                                        <?php } ?>
	                                                        <div class="custom-control custom-radio">
	                                                            <input type="radio" id="relation1Radio4" name="relation1" class="custom-control-input" value="Other" <?php for($x = 0; $x < $length; $x++) { if($row['relation1'] != $relation[$x]) echo "checked"; } ?>>
	                                                            <label class="custom-control-label" for="relation1Radio4">
	                                                            <input type="text" name="relation1_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($row['relation1'] != $relation[0] && $row['relation1'] != $relation[1] && $row['relation1'] != $relation[2]) echo $row['relation1']; ?>"></label>
	                                                        </div>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <div class="col-8">
	                                                        <div class="row">
	                                                            <label class="col-3 col-form-label">2nd Stakeholder</label>
	                                                            <div class="col-8">
	                                                                <input type="text" class="form-control" name="stakeholder2" placeholder="Write your 2nd stakeholder you wanna join (optional)" value="<?php if($row['stakeholder2'] != null) { echo $row['stakeholder2']; } ?>">
	                                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-4">
	                                                        <label for="relation2">Types of Relation</label>
	                                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
	                                                            <div class="custom-control custom-radio" id="relation2">
	                                                                <input type="radio" id="relation2Radio<?php echo $y; ?>" name="relation2" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($row['relation2'] == $relation[$x]) { echo "checked"; } ?>>
	                                                                <label class="custom-control-label" for="relation2Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
	                                                            </div>
	                                                        <?php } ?>
	                                                        <div class="custom-control custom-radio">
	                                                            <input type="radio" id="relation2Radio4" name="relation2" class="custom-control-input" value="Other" <?php for($x = 0; $x < $length; $x++) { if($row['relation2'] != $relation[$x]) echo "checked"; } ?>>
	                                                            <label class="custom-control-label" for="relation2Radio4">
	                                                            <input type="text" name="relation2_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($row['relation2'] != $relation[0] && $row['relation2'] != $relation[1] && $row['relation2'] != $relation[2]) echo $row['relation2']; ?>"></label>
	                                                        </div>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <div class="col-8">
	                                                        <div class="row">
	                                                            <label class="col-3 col-form-label">3rd Stakeholder</label>
	                                                            <div class="col-8">
	                                                                <input type="text" class="form-control" name="stakeholder3" placeholder="Write your 3rd stakeholder you wanna join (optional)" value="<?php if($row['stakeholder3'] != null) { echo $row['stakeholder3']; } ?>">
	                                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-4">
	                                                        <label for="relation3">Types of Relation</label>
	                                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
	                                                            <div class="custom-control custom-radio" id="relation3">
	                                                                <input type="radio" id="relation3Radio<?php echo $y; ?>" name="relation3" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($row['relation3'] == $relation[$x]) { echo "checked"; } ?>>
	                                                                <label class="custom-control-label" for="relation3Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
	                                                            </div>
	                                                        <?php } ?>
	                                                        <div class="custom-control custom-radio">
	                                                            <input type="radio" id="relation3Radio4" name="relation3" class="custom-control-input" value="Other" <?php if($row['relation3'] != $relation[0] && $row['relation3'] != $relation[1] && $row['relation3'] != $relation[2]) echo "checked"; ?>>
	                                                            <label class="custom-control-label" for="relation3Radio4">
	                                                            <input type="text" name="relation3_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($row['relation3'] != $relation[0] && $row['relation3'] != $relation[1] && $row['relation3'] != $relation[2]) echo $row['relation3']; ?>"></label>
	                                                        </div>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <div class="col-8">
	                                                        <div class="row">
	                                                            <label class="col-3 col-form-label">4th Stakeholder</label>
	                                                            <div class="col-8">
	                                                                <input type="text" class="form-control" name="stakeholder4" placeholder="Write your 4th stakeholder you wanna join (optional)" value="<?php if($row['stakeholder4'] != null) { echo $row['stakeholder4']; } ?>">
	                                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-4">
	                                                        <label for="relation4">Types of Relation</label>
	                                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
	                                                            <div class="custom-control custom-radio" id="relation4">
	                                                                <input type="radio" id="relation4Radio<?php echo $y; ?>" name="relation4" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($row['relation4'] == $relation[$x]) { echo "checked"; } ?>>
	                                                                <label class="custom-control-label" for="relation4Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
	                                                            </div>
	                                                        <?php } ?>
	                                                        <div class="custom-control custom-radio">
	                                                            <input type="radio" id="relation4Radio4" name="relation4" class="custom-control-input" value="Other" <?php if($row['relation4'] != $relation[0] && $row['relation4'] != $relation[1] && $row['relation4'] != $relation[2]) echo "checked"; ?>>
	                                                            <label class="custom-control-label" for="relation4Radio4">
	                                                            <input type="text" name="relation4_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($row['relation4'] != $relation[0] && $row['relation4'] != $relation[1] && $row['relation4'] != $relation[2]) echo $row['relation4']; ?>"></label>
	                                                        </div>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <div class="col-8">
	                                                        <div class="row">
	                                                            <label class="col-3 col-form-label">5th Stakeholder</label>
	                                                            <div class="col-8">
	                                                                <input type="text" class="form-control" name="stakeholder5" placeholder="Write your 1st stakeholder you wanna join (optional)" value="<?php if($row['stakeholder5'] != null) { echo $row['stakeholder5']; } ?>">
	                                                                <span class="help-block"><small>Example: Tokopedia, Jasamarga, Pertamina, etc.</small></span>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-4">
	                                                        <label for="relation5">Types of Relation</label>
	                                                        <?php for ($x = 0, $y = 1; $x < $length; $x++, $y++) { ?>
	                                                            <div class="custom-control custom-radio" id="relation5">
	                                                                <input type="radio" id="relation5Radio<?php echo $y; ?>" name="relation5" class="custom-control-input" value="<?php echo $relation[$x]; ?>" <?php if($row['relation5'] == $relation[$x]) { echo "checked"; } ?>>
	                                                                <label class="custom-control-label" for="relation5Radio<?php echo $y; ?>"><?php echo $relation[$x]; ?></label>
	                                                            </div>
	                                                        <?php } ?>
	                                                        <div class="custom-control custom-radio">
	                                                            <input type="radio" id="relation5Radio4" name="relation5" class="custom-control-input" value="Other" <?php if($row['relation5'] != $relation[0] && $row['relation5'] != $relation[1] && $row['relation5'] != $relation[2]) echo "checked"; ?>>
	                                                            <label class="custom-control-label" for="relation5Radio4">
	                                                            <input type="text" name="relation5_other" class="form-control form-control-sm" placeholder="Other" value="<?php if($row['relation5'] != $relation[0] && $row['relation5'] != $relation[1] && $row['relation5'] != $relation[2]) echo $row['relation5']; ?>"></label>
	                                                        </div>
	                                                    </div>
	                                                </div>

	                                                <div class="form-group row">
	                                                    <label class="col-2 col-form-label">Proposal File</span></label>
	                                                    <div class="col-5">
	                                                        <button type="button" onclick="<?php echo $download; ?>" class="btn btn-icon waves-effect waves-light btn-custom" data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-custom" title="" data-original-title="Download"><i class="mdi mdi-download"></i> <?php echo $row['file_name']; ?></button>
	                                                    </div>
	                                                </div>

	                                                <hr>

	                                                <div class="form-group text-right m-b-0">
	                                                    <input type="hidden" name="action" value="edit_proposal">
	                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
	                                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
	                                                    <button type="button" onclick="location.href='./myproposal'" class="btn btn-light waves-light waves-effect"><i class="mdi mdi-keyboard-backspace"></i> Back</button>
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