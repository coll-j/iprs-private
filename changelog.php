<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");
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
                            <div class="">
                                <div class="timeline">
                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show first">
                                                <a href="#" class="btn btn-custom w-lg">Now</a>
                                            </div>
                                        </div>
                                    </article>
                                    <?php $data = get_data("iprs_changelog", "*", "", "version DESC"); $x = 1; ?>
                                    <?php if($data) { ?>
                                        <?php foreach($data as $row) { ?>
                                            <article class="timeline-item <?php if($x % 2  == 1) echo "alt"; ?>">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box">
                                                            <span class="arrow-alt"></span>
                                                            <span class="timeline-icon bg-custom"><i class="mdi mdi-adjust"></i></span>
                                                            <h4 class="text-custom"><?php echo $row['title']; ?></h4>
                                                            <p class="timeline-date text-muted"><small><strong><?php echo $row['version']; ?></strong> - <?php echo show_date($row['date']); ?></small></p>
                                                            <p><?php echo $row['content']; $x++; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="text-center">Sorry, the administrator hasn't added any changelog at all.</div>
                                                </div> 
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                <!-- end timeline -->

                                <div class="text-center text-muted">
                                    <p>IPRS BEM ITS launched on May, 2017.</p>
                                </div>

                            </div>
                        </div>
                    </div>
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



    <?php require_once("include/pages/app.php"); ?>

</body>
<?php require_once("include/pages/footer_end.php"); ?>