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
                            <div class="card-box table-responsive">
                                <h4 class="m-t-0 header-title">Send us a message</h4>

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
                                    <div class="col-4">
                                        <p>
                                            If you have any question about IPRS BEM ITS? Feel free to send us a message. We will be happy to reply your question. Or you can send our staff a WhatsApp message if you want more replied quickly.
                                        </p>
                                    </div>
                                    <div class="col-8">
                                        <form class="form-horizontal" action="include/email-contact.php" method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="action" value="contact_message">
                                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                                    <button type="submit" class="btn btn-custom waves-effect waves-light">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <?php $data = get_data("iprs_staff", "*", "active = 'yes'", "id ASC"); ?>
                        <?php if($data) { ?>
                            <?php foreach($data as $row) { ?>

                                <div class="col-md-4">
                                    <div class="text-center card-box">

                                        <div class="member-card pt-2 pb-2">
                                            <div class="thumb-lg member-thumb m-b-10 mx-auto">
                                                <img src="upload/contact/<?php echo $row['photo']; ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                                            </div>

                                            <div class="">
                                                <h4 class="m-b-5"><?php echo $row['name']; ?></h4>
                                                <p class="text-muted"><?php echo $row['position']; ?><span></p>
                                            </div>

                                            <ul class="social-links list-inline m-t-20">
                                                <li class="list-inline-item">
                                                    <a title="Facebook" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://www.facebook.com/<?php echo $row['facebook']; ?>" data-original-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a title="Twitter" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://twitter.com/<?php echo $row['twitter']; ?>" data-original-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a title="Instagram" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://www.instagram.com/<?php echo $row['instagram']; ?>" data-original-title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                                </li>
                                            </ul>

                                            <button type="button" class="btn btn-primary m-t-20 btn-rounded btn-bordered waves-effect w-md waves-light" onclick="location.href='https://api.whatsapp.com/send?phone=<?php echo substr($row['whatsapp'], 1); ?>&text=Hi!%20I%20send%20this%20message%20from%20IPRS%20BEM%20ITS.'">Message Now</button>
                                        </div>

                                    </div>

                                </div> <!-- end col -->

                            <?php } ?>
                        <?php } ?>

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