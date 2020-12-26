<?php    
    require_once("include/config.php");
    require_once("include/functions.php");

    if(logged_in()) {
        header("Location: ./dashboard");
        die();
    }
?>

<?php require_once("include/pages/header_start.php"); ?>

<?php require_once("include/pages/header_end.php"); ?>

<body class="account-pages">
    <?php echo "<script>console.log(".hash("SHA512", "admin"."c33ced4203835c500014f6971006ee38b74d3406e24b4f3c11d230db9e252647").")</script>"?>
    <!-- Begin page -->
    <div class="accountbg" style="background: url('<?php echo $assets_folder; ?>/images/<?php echo $login_background; ?>');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index" class="text-success">
                                <span><img src="<?php echo $assets_folder; ?>/images/<?php echo $logo; ?>" alt="logo" height="26"></span>
                            </a>
                        </h2>

                        <form class="form-horizontal" action="include/process.php" method="post">

                            <?php if(isset($_SESSION["form_error"])) { ?>
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?php echo $_SESSION['form_error']; ?>
                                    <?php unset($_SESSION['form_error']); ?>
                                </div>
                            <?php } ?>

                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" required="" value="<?php if(isset($_SESSION['form_username'])) { echo $_SESSION['form_username']; } ?>" placeholder="Enter your username" <?php if(!isset($_SESSION['form_username'])) echo "autofocus='autofocus'"; ?>>
                                </div>
                            </div>                            

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password" <?php if(isset($_SESSION['form_username'])) { echo "autofocus='autofocus'"; unset($_SESSION['form_username']); } ?>>
                                    <a href="#" class="text-muted pull-right"><small>Forgot your password?</small></a>
                                </div>
                            </div>

                            <!--
                            <div class="form-group row m-b-20">
                                <div class="col-12">

                                    <div class="checkbox checkbox-custom">
                                        <input id="remember" type="checkbox" checked="">
                                        <label for="remember">
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                            </div>
                            -->
                            <br />

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <input type="hidden" name="action" id="action" value="login">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="account-copyright"><?php echo $footer; ?></p>
        </div>

    </div>



    <!-- jQuery  -->
    <script src="<?php echo $assets_folder; ?>/js/jquery.min.js"></script>
    <script src="<?php echo $assets_folder; ?>/js/popper.min.js"></script>
    <script src="<?php echo $assets_folder; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $assets_folder; ?>/js/metisMenu.min.js"></script>
    <script src="<?php echo $assets_folder; ?>/js/waves.js"></script>
    <script src="<?php echo $assets_folder; ?>/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="<?php echo $assets_folder; ?>/js/jquery.core.js"></script>
    <script src="<?php echo $assets_folder; ?>/js/jquery.app.js"></script>

</body>
</html>