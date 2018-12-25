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

    <!-- Begin page -->
    <div class="accountbg" style="background: url('<?php echo $login_background; ?>');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index" class="text-success">
                                <span><img src="<?php echo $logo; ?>" alt="" height="26"></span>
                            </a>
                        </h2>

                        <form class="form-horizontal" action="include/process.php" method="post">

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your username">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email address">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password" required="" placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">

                                    <div class="checkbox checkbox-custom">
                                        <input id="remember" type="checkbox" checked="">
                                        <label for="remember">
                                            I accept <a href="#" class="text-custom">Terms and Conditions</a>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <input type="hidden" name="action" id="action" value="register">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign Up</button>
                                </div>
                            </div>

                        </form>

                        <?php
                            if(isset($_SESSION["form_error"])) {
                                echo $_SESSION["form_error"];
                                unset($_SESSION["form_error"]);
                            } 
                        ?>

                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Already have an account?  <a href="./login" class="text-dark m-l-5"><b>Sign In</b></a></p>
                            </div>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>
</html>