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

    // LAST INPUT PROPOSAL
    $data = get_data("iprs_proposal", "input_date", "username = '$_SESSION[username]'", "input_date DESC", "LIMIT 1");
    foreach ($data as $row) {
        $last_proposal = $row['input_date'];
    }

    // LAST PROPOSAL APPROVED
    $data = get_data("iprs_proposal", "approved_date", "username ='$_SESSION[username]' AND stats = 'approve'", "approved_date DESC", "LIMIT 1");
    if ($data == null) {
        $last_approved = "0000-00-00 00:00:00";
    }
    else {
        foreach ($data as $row) {
            $last_approved = $row['approved_date'];
        }
    }

    // DATABASE BY USER
    $data = get_data("iprs_database", "*", "created_by ='$_SESSION[username]'");
    $databyuser = count($data);

    // LAST ADD DATABASE
    $data = get_data("iprs_database", "created_date", "created_by ='$_SESSION[username]'");
    foreach ($data as $row) {
        $last_database = $row['created_date'];
    }

    $username   = $_SESSION['username'];
    $level      = $_SESSION['level'];
    $data = get_data("iprs_user a INNER JOIN iprs_contact b ON a.`id` = b.`id`", "*", "a.`username` = '$_SESSION[username]'");
    foreach ($data as $row) {
        $id         = $row['id'];
        $name       = $row['name'];
        $email      = $row['email'];
        $user_photo = $row['photo'];
        $form       = $row['form'];
        $address    = $row['address'];
        $phone      = $row['phone'];
        $website    = $row['website'];
        $instagram  = $row['instagram'];
        $line       = $row['line'];
        $facebook   = $row['facebook'];
        $twitter    = $row['twitter'];
    }
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
                            <!-- meta -->
                            <div class="profile-user-box card-box bg-custom">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span class="pull-left mr-3"><img src="upload/profile/<?php echo $user_photo; ?>" alt="" class="thumb-lg rounded-circle"></span>
                                        <div class="media-body text-white">
                                            <h4 class="mt-1 mb-1 font-18"><?php echo $name; ?></h4>
                                            <p class="font-13 text-light"><?php echo $username; ?></p>
                                            <p class="text-light mb-0"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-light waves-effect" onclick="location.href='./setting'">
                                                <i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-md-4">
                            <!-- Personal-Information -->
                            <div class="card-box">
                                <h4 class="header-title mt-0 m-b-20">Contact Information</h4>
                                <div class="panel-body">
                                    <div class="text-left">
                                        <p class="text-muted font-13"><strong>Address:</strong> <span class="m-l-15"><?php echo $address; ?></span></p>

                                        <p class="text-muted font-13"><strong>Mobile:</strong> <span class="m-l-15"><?php echo $phone; ?></span></p>

                                        <p class="text-muted font-13"><strong>Email:</strong> <span class="m-l-15"><?php echo $email; ?></span></p>

                                        <p class="text-muted font-13"><strong>Line:</strong> <span class="m-l-15"><?php echo $line; ?></span></p>
                                    </div>

                                    <ul class="social-links list-inline m-t-20 m-b-0">
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="http://facebook.com/<?php echo $facebook; ?>" target="_blank" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="http://twitter.com/<?php echo $twitter; ?>" target="_blank" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="http://instagram.com/<?php echo $twitter; ?>" target="_blank" data-original-title="instagram"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="http://<?php echo $website; ?>" target="_blank" data-original-title="Website"><i class="fa fa-external-link"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Personal-Information -->

                            <div class="card-box ribbon-box">
                                <div class="ribbon ribbon-primary">Messages</div>
                                <div class="clearfix"></div>
                                <div class="inbox-widget">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Tomaslau</p>
                                            <p class="inbox-item-text">I've finished it! See you so...</p>
                                            <p class="inbox-item-date m-t-10">
                                                <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> Reply </button>
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date m-t-10">
                                                <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> Reply </button>
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kurafire</p>
                                            <p class="inbox-item-text">Nice to meet you</p>
                                            <p class="inbox-item-date m-t-10">
                                                <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> Reply </button>
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shahedk</p>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <p class="inbox-item-date m-t-10">
                                                <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> Reply </button>
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Adhamdannaway</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date m-t-10">
                                                <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> Reply </button>
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Tomaslau</p>
                                            <p class="inbox-item-text">I've finished it! See you so...</p>
                                            <p class="inbox-item-date m-t-10">
                                                <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> Reply </button>
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date m-t-10">
                                                <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> Reply </button>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-8">

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="card-box tilebox-one">
                                        <i class="icon-layers float-right text-muted"></i>
                                        <h6 class="text-muted text-uppercase mt-0">Proposals</h6>
                                        <h2 class="m-b-20" data-plugin="counterup"><?php echo $propbyuser; ?></h2>
                                        <span class="text-muted">Last input:</span><br><span class="badge badge-custom"> <?php echo show_datetime($last_proposal); ?> </span>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-sm-4">
                                    <div class="card-box tilebox-one">
                                        <i class="icon-flag float-right text-muted"></i>
                                        <h6 class="text-muted text-uppercase mt-0">Apprpoved</h6>
                                        <h2 class="m-b-20"><span data-plugin="counterup"><?php echo $propapproved ?></span></h2>
                                        <span class="text-muted">Last approved:</span><br> <?php if($last_approved != "0000-00-00 00:00:00") { echo "<span class='badge badge-custom'> ".show_datetime($last_approved)." </span>"; } else { echo "<span class='badge badge-danger'> Not Yet </span>"; } ?> </span>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-sm-4">
                                    <div class="card-box tilebox-one">
                                        <i class="icon-book-open float-right text-muted"></i>
                                        <h6 class="text-muted text-uppercase mt-0">Database</h6>
                                        <h2 class="m-b-20" data-plugin="counterup"><?php echo $databyuser; ?></h2>
                                        <span class="text-muted">Last input:</span><br><span class="badge badge-custom"> <?php echo show_datetime($last_database); ?> </span>
                                    </div>
                                </div><!-- end col -->

                            </div>
                            <!-- end row -->

                            <div class="card-box">
                                <h4 class="header-title mb-3">My Proposals
                                    <div class="pull-right">
                                        <button type="button" onclick="location.href='./myproposal'" class="btn btn-custom waves-light waves-effect">View Proposals</button>
                                    </div>
                                </h4>

                                <br>

                                <?php if($propbyuser > 0) { ?>
                                    <?php
                                        $data = get_data("iprs_proposal", "*", "username = '$_SESSION[username]'", "input_date DESC", "LIMIT 8");
                                        $x = 1;
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Event Name</th>
                                                    <th>Types</th>
                                                    <th>Event Time</th>
                                                    <th>Stats</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $x; $x++; ?></td>
                                                        <td><?php echo $row['event_name']; ?></td>
                                                        <td><?php echo $row['event_type']; ?></td>
                                                        <td><?php echo show_date($row['event_time']); ?></td>
                                                        <td align="center">
                                                            <?php if($row['stats'] == "approve") echo "<span class='badge badge-success'>Approve</span>" ?>
                                                            <?php if($row['stats'] == "disapprove") echo "<span class='badge badge-danger'>Disapprove</span>" ?>
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
                            

                            <div class="card-box">
                                <h4 class="header-title mb-3">My Databases
                                    <div class="pull-right">
                                        <button type="button" onclick="location.href='./mydatabase'" class="btn btn-custom waves-light waves-effect">View Databases</button>
                                    </div>
                                </h4>

                                <br>

                                <?php if($databyuser > 0) { ?>
                                    <?php
                                        $data = get_data("iprs_database", "*", "created_by = '$_SESSION[username]'", "created_date DESC", "LIMIT 8");
                                        $x = 1;
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Job Position</th>
                                                    <th>Company</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $x; $x++; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['position']; ?></td>
                                                        <td><?php echo $row['company']; ?></td>
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
                        <!-- end col -->

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

    <!-- Counter Up  -->
    <script src="<?php echo $plugins_folder; ?>/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/counterup/jquery.counterup.min.js"></script>

    <?php require_once("include/pages/app.php"); ?>

</body>
</html>