<div class="topbar-main">
    <div class="container-fluid">

        <!-- Logo container-->
        <div class="logo">
            <!-- Text Logo -->
            <!-- <a href="index.html" class="logo">
                <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                <span class="logo-large"><i class="mdi mdi-radar"></i> Highdmin</span>
            </a> -->
            <!-- Image Logo -->
            <a href="index.html" class="logo">
                <img src="../<?php echo $assets_folder; ?>/images/<?php echo $logo; ?>" alt="" height="26" class="logo-small">
                <img src="../<?php echo $assets_folder; ?>/images/<?php echo $logo; ?>" alt="" height="22" class="logo-large">
            </a>

        </div>
        <!-- End Logo container-->


        <div class="menu-extras topbar-custom">

            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                <li class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="../index" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <button type="button" class="btn btn-light waves-effect" onclick="location.href='../index'">
                            <i class="mdi mdi-desktop-mac mr-1"></i> User Panel
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        <!-- end menu-extras -->

        <div class="clearfix"></div>

    </div> <!-- end container -->
</div>
<!-- end topbar-main -->