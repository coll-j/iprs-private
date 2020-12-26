<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_proposal", "id");
    $total_proposal = count($data);

    $data = get_data("iprs_proposal", "stats", "stats = 'approve'");
    $total_approved = count($data);

    $data = get_data("iprs_database", "id");
    $total_database = count($data);

    $data = get_data("iprs_user", "id");
    $total_user = count($data);
?>

<?php require_once("pages/header_start.php"); ?>

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
                        <h4 class="header-title mb-4">System Overview</h4>

                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#0acf97" value="<?php echo $total_proposal; ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Proposals Uploaded</p>
                                        <h3 class=""><?php echo $total_proposal; ?></h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#f9bc0b" value="<?php echo $total_approved; ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Proposals Approved</p>
                                        <h3 class=""><?php echo $total_approved; ?></h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#f1556c" value="<?php echo $total_database; ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Total Databases</p>
                                        <h3 class=""><?php echo $total_database; ?></h3>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box mb-0 widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#2d7bf4" value="<?php echo $total_user; ?>" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Total Users</p>
                                        <h3 class=""><?php echo $total_user; ?></h3>
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
                        <h4 class="header-title">Last 10 Proposals Uploaded
                            <div class="pull-right">
                                <button type="button" onclick="location.href='./proposal-list'" class="btn btn-custom waves-light waves-effect">View Proposals</button>
                            </div>
                        </h4>
                        <br>

                        <?php if($total_proposal > 0) { ?>
                            <?php
                                $data = get_data("iprs_proposal", "*", "", "input_date DESC", "LIMIT 10");
                            ?>

                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">

                                    <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Types</th>
                                        <th>From</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $row) { ?>
                                            <tr>
                                                <td>
                                                    <h5 class="m-0 font-weight-normal"><?php echo $row['event_name']; ?></h5>
                                                    <p class="mb-0 text-muted"><small><?php echo show_date($row['event_time']); ?></small></p>
                                                </td>

                                                <td>
                                                    <?php echo $row['event_type']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['username']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        <?php } else { ?>

                            <div align="center">
                                No data available.
                            </div>
                            <br>

                        <?php } ?>                                    

                    </div>
                </div>
                <!-- END OF LAST 5 PROPOSALS -->

                <!-- LAST 5 DATABASES -->
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title">Last 10 Databases Uploaded
                            <div class="pull-right">
                                <button type="button" onclick="location.href='./database-list'" class="btn btn-custom waves-light waves-effect">View Databases</button>
                            </div>
                        </h4>
                        <br>

                        <?php if($total_database > 0) { ?>
                            <?php
                                $data = get_data("iprs_database", "*", "", "created_date DESC", "LIMIT 10");
                            ?>

                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">

                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>From</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $row) { ?>
                                            <tr>
                                                <td>
                                                    <h5 class="m-0 font-weight-normal"><?php echo $row['name']; ?></h5>
                                                    <p class="mb-0 text-muted"><small><?php echo $row['position']; ?></small></p>
                                                </td>

                                                <td>
                                                    <?php echo $row['company']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['created_by']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        <?php } else { ?>

                            <div align="center">
                                No data available.
                            </div>
                            <br>

                        <?php } ?> 

                    </div>
                </div>
            </div>
            <!-- END OF LAST 5 DATABASES -->
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <?php require_once("pages/footer_start.php"); ?>

    <?php require_once("pages/jquery.php"); ?>

    <!-- KNOB JS -->
    <!--[if IE]>
    <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
    <![endif]-->
    <script src="../<?php echo $plugins_folder; ?>/jquery-knob/jquery.knob.js"></script>

    <!-- Dashboard Init -->
    <script src="../<?php echo $assets_folder; ?>/pages/jquery.dashboard.init.js"></script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>