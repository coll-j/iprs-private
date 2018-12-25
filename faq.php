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
                        <div class="col-sm-12">
                            <div class="text-center">
                                <h3 class=""><?php echo $title; ?></h3>
                                <p class="text-muted"> In this page you can read the frequently asked question to understand about <strong>Integrated Public Relation System BEM ITS</strong> more clearly.<br>
                                But, if you didn't understand about us? Feel free to send message to us with click this button below.</p>

                                <button type="button" class="btn btn-custom waves-effect waves-light m-t-10" onclick="location.href='./contact'">Go to contact page</button>

                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <?php $data = get_data("iprs_faq", "question, answer", "active = 'yes'", "id DESC"); $x = 1; ?>
                    <?php if($data) { ?>
                        <div class="row m-t-50 pt-3">
                            <?php foreach($data as $row) { ?>
                                <div class="col-lg-5 <?php if($x % 2 == 1) echo "offset-lg-1"; ?>">
                                    <!-- Question/Answer -->
                                    <div>
                                        <div class="question-q-box">Q.</div>
                                        <h4 class="question" data-wow-delay=".1s"><?php echo $row['question']; ?></h4>
                                        <p class="answer"><?php echo $row['answer']; $x++; ?></p>
                                    </div>
                                </div>
                                <!--/col-md-5-->
                            <?php } ?>
                        </div>
                        <!-- end row -->
                    <?php } else { ?>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-info" role="alert">
                                    <div class="text-center">Sorry, the administrator hasn't added any FAQ at all.</div>
                                </div> 
                            </div>
                        </div>
                    <?php } ?>

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