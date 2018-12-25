<?php    
    require_once("include/config.php");
    require_once("include/functions.php");
?>

<?php require_once("include/pages/header_start.php"); ?>

<?php require_once("include/pages/header_end.php"); ?>

<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg" style="background: url('<?php echo $assets_folder; ?>/images/<?php echo $login_background; ?>');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">
                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index.html" class="text-success">
                                <span><img src="<?php echo $assets_folder; ?>/images/<?php echo $logo; ?>" alt="logo" height="26"></span>
                            </a>
                        </h2>

                        <div class="text-center">
                            <h1 class="text-error">404</h1>
                            <h4 class="text-uppercase text-danger mt-3">Page Not Found</h4>
                            <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. Here's a little tip that might help you get back on track.</p>

                            <a class="btn btn-md btn-block btn-custom waves-effect waves-light mt-3" href="./index">Return Home</a>
                        </div>

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