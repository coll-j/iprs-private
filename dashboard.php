<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");

    // PROPOSAL BY USER
    $data = get_data("iprs_proposal", "*", "username = '$_SESSION[username]'");
    $propbyuser = count($data);

    // PROPOSAL APPROVED
    $data = get_data("iprs_proposal", "*", "username ='$_SESSION[username]' AND stats = 'approve'");
    $propapproved = count($data);

    // PROPOSAL DISAPPROVED
    $data = get_data("iprs_proposal", "*", "username ='$_SESSION[username]' AND stats = 'disapprove'");
    $propdisapprove = count($data);

    // DATABASE BY USER
    $data = get_data("iprs_database", "*", "created_by ='$_SESSION[username]'");
    $databyuser = count($data);
?>

<?php require_once("include/pages/header_start.php"); ?>

<?php require_once("include/pages/header_end.php"); ?>

<body>

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
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Account Overview</h4>

                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-xl-3">
                                        <div class="card-box mb-0 widget-chart-two">
                                            <div class="float-right">
                                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                       data-fgColor="#0acf97" value="<?php echo $propbyuser; ?>" data-skin="tron" data-angleOffset="180"
                                                       data-readOnly=true data-thickness=".1"/>
                                            </div>
                                            <div class="widget-chart-two-content">
                                                <p class="text-muted mb-0 mt-2">PROPOSALS</p>
                                                <h5 class="">Uploaded</h5>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-6 col-xl-3">
                                        <div class="card-box mb-0 widget-chart-two">
                                            <div class="float-right">
                                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                       data-fgColor="#f9bc0b" value="<?php echo $propapproved; ?>" data-skin="tron" data-angleOffset="180"
                                                       data-readOnly=true data-thickness=".1"/>
                                            </div>
                                            <div class="widget-chart-two-content">
                                                <p class="text-muted mb-0 mt-2">PROPOSALS</p>
                                                <h5 class="">Approved</h5>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-6 col-xl-3">
                                        <div class="card-box mb-0 widget-chart-two">
                                            <div class="float-right">
                                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                       data-fgColor="#f1556c" value="<?php echo $propdisapprove; ?>" data-skin="tron" data-angleOffset="180"
                                                       data-readOnly=true data-thickness=".1"/>
                                            </div>
                                            <div class="widget-chart-two-content">
                                                <p class="text-muted mb-0 mt-2">PROPOSALS</p>
                                                <h5 class="">Dissaproved</h5>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-6 col-xl-3">
                                        <div class="card-box mb-0 widget-chart-two">
                                            <div class="float-right">
                                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                       data-fgColor="#2d7bf4" value="<?php echo $databyuser; ?>" data-skin="tron" data-angleOffset="180"
                                                       data-readOnly=true data-thickness=".1"/>
                                            </div>
                                            <div class="widget-chart-two-content">
                                                <p class="text-muted mb-0 mt-2">DATABASES</p>
                                                <h5 class="">Uploaded</h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <!-- LAST 5 PROPOSALS -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="header-title">Last 5 Proposals Uploaded</h4>

                                <?php if($propbyuser > 0) { ?>
                                    <?php
                                        $data = get_data("iprs_proposal", "*", "username = '$_SESSION[username]'", "input_date DESC", "LIMIT 5");
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered m-0">

                                            <thead>
                                            <tr>
                                                <th>Event Name</th>
                                                <th>Types</th>
                                                <th>Upload Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $row) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $row['event_name']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['event_type']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo show_date($row['input_date']); ?>
                                                        </td>

                                                        <td>
                                                            <button type="button" onclick="location.href='./myproposal'" data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-custom" title="" data-original-title="View Proposal"><i class="mdi mdi-view-list"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                <?php } else { ?>

                                    <div align="center">
                                        <br>
                                        You didn't upload a <strong>proposal</strong> yet. To upload, click button below.
                                        <br><br>
                                        <button type="button" class="btn btn-purple btn-rounded waves-effect waves-light" onclick="location.href='./proposal'">Upload Proposal</button>
                                    </div>
                                    <br>

                                <?php } ?>                                    

                            </div>
                        </div>
                        <!-- END OF LAST 5 PROPOSALS -->

                        <!-- LAST 5 DATABASES -->
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="header-title">Last 5 Databases Uploaded</h4>

                                <?php if($databyuser > 0) { ?>
                                    <?php
                                        $data = get_data("iprs_database", "*", "created_by = '$_SESSION[username]'", "created_date DESC", "LIMIT 5");
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered m-0">

                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $row) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $row['name']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['company']; ?>
                                                        </td>

                                                        <td>
                                                            <button type="button" onclick="location.href='./mydatabase'" data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-custom" title="" data-original-title="View Detail"><i class="mdi mdi-view-list"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                <?php } else { ?>

                                    <div align="center">
                                        <br>
                                        You didn't insert a <strong>database</strong> yet. To insert, click button below.
                                        <br><br>
                                        <button type="button" class="btn btn-purple btn-rounded waves-effect waves-light" onclick="location.href='./database'">Insert Database</button>

                                    </div>
                                    <br>

                                <?php } ?> 

                            </div>
                        </div>
                    </div>
                    <!-- END OF LAST 5 DATABASES -->
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

    <!-- KNOB JS -->
    <!--[if IE]>
    <script type="text/javascript" src="<?php echo $plugins_folder; ?>/jquery-knob/excanvas.js"></script>
    <![endif]-->
    <script src="<?php echo $plugins_folder; ?>/jquery-knob/jquery.knob.js"></script>

    <!-- Dashboard Init -->
    <script src="<?php echo $assets_folder; ?>/pages/jquery.dashboard.init.js"></script>

    <?php require_once("include/pages/app.php"); ?>

</body>
<?php require_once("include/pages/footer_end.php"); ?>