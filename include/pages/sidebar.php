<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="index" class="logo">
                <span>
                    <img src="<?php echo $assets_folder; ?>/images/<?php echo $logo; ?>" alt="" height="22">
                </span>
                <i>
                    <img src="<?php echo $assets_folder; ?>/images/<?php echo $logo_icon; ?>" alt="" height="28">
                </i>
            </a>
        </div>

        <?php
            $data = get_data("iprs_user", "photo, name", "username = '$_SESSION[username]'");
            foreach ($data as $row) {
                $photo = $row['photo'];
                $name = $row['name'];
            }
            if($photo == null) {
                $photo = 'avatar.png';
            }
        ?>

        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="upload/profile/<?php echo $photo; ?>" alt="user-img" title="<?php echo $fullname; ?>" class="rounded-circle img-fluid">
            </div>
            <h5><a href="./profile"><?php echo $name; ?></a> </h5>
            <p class="text-muted"><?php echo $_SESSION['username']; ?></p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <!--<li class="menu-title">Navigation</li>-->

            <?php
                $query = "SELECT * FROM iprs_menu WHERE type = 'sidebar' AND parent_id = 0 AND active = 'yes'";
                $data = $db->query($query);

                if(count($data) > 0) {
                    foreach ($data as $menu) {
                        $query_sub = "SELECT * FROM iprs_menu WHERE type = 'sidebar' AND parent_id = '$menu[id]' AND active = 'yes'";
                        $data_sub = $db->query($query_sub);
            ?>

                        <li>
                            <a href="<?php echo $menu['link']; ?>">
                                <i class="<?php echo $menu['icon']; ?>"></i><span> <?php echo $menu['label']; ?> </span> <span class="badge pull-right">></span>
                            </a>

                        <?php if(count($data_sub) > 0) { ?>

                            <ul class="nav-second-level" aria-expanded="false">
                        
                            <?php foreach($data_sub as $menu_sub) { ?>

                                <li><a href="<?php echo $menu_sub['link']; ?>"><?php echo $menu_sub['label']; ?></a></li>

                            <?php } ?>

                            </ul>

                        <?php } ?>

                    </li>

                    <?php } ?>
                <?php } ?>

            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->