<!-- Top Bar Start -->
<div class="topbar">

    <nav class="navbar-custom">

        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            <li class="hide-phone app-search">
                <form action="../process.php" method="get">
                    <input type="text" name="search_text" placeholder="Search..." class="form-control">
                    <input type="hidden" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </li>

            <?php
                $data = get_data("iprs_user", "photo", "username = '$_SESSION[username]'");
                foreach ($data as $row) {
                    $photo = $row['photo'];
                }
                if($photo == null) {
                    $photo = 'avatar.png';
                }
            ?>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="upload/profile/<?php echo $photo; ?>" alt="user" class="rounded-circle"> <span class="ml-1">Profile <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>

                    <?php 
                        $data = get_data("iprs_menu", "*", "active = 'yes'"); 
                        foreach ($data as $row) {
                            $menu_id = $row['id'];
                            $parent_id = $row['parent_id'];
                            $menu_label = $row['label'];
                            $menu_link = $row['link'];
                            $menu_type = $row['type'];
                            $menu_icon = $row['icon'];
                            $menu_info = $row['information'];

                            if($menu_type == 'admin' && ($_SESSION['level'] == 'developer' || $_SESSION['level'] == 'admin'))  {
                    ?>
                                <!-- item-->
                                <a href="<?php echo $menu_link; ?>" class="dropdown-item notify-item">
                                    <i class="<?php echo $menu_icon; ?>"></i> <span><?php echo $menu_label; ?></span>
                                </a>
                    <?php
                            }
                            if($menu_type == 'user') {
                    ?>
                                <!-- item-->
                                <a href="<?php echo $menu_link; ?>" class="dropdown-item notify-item">
                                    <i class="<?php echo $menu_icon; ?>"></i> <span><?php echo $menu_label; ?></span>
                                </a>

                    <?php
                            }
                        }
                    ?>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="dripicons-menu"></i>
                </button>
            </li>
            <li>
                <div class="page-title-box">
                    <h4 class="page-title"><?php echo $title; ?></h4>
                    <ol class="breadcrumb">
                        <?php if($_SERVER['PHP_SELF'] == "/iprs/dashboard.php") { ?>
                            <li class="breadcrumb-item active">Welcome to <?php echo $system_name; ?>!</li>
                        <?php } else { ?>
                            <?php
                            $default_link = substr($_SERVER['PHP_SELF'], 6);
                            $new_link = explode(".php", $default_link);

                            $query = "SELECT * FROM iprs_menu WHERE type = 'sidebar' AND link = '$new_link[0]'";
                            $data = $db->query($query);
                            foreach ($data as $row) {
                                $menu_id = $row['parent_id'];                         
                            }                                    

                            $query = "SELECT * FROM iprs_menu WHERE type = 'sidebar' AND parent_id = 0 AND id = '$menu_id'";
                            $data = $db->query($query);

                            if(count($data) > 0) {
                                foreach ($data as $menu) {
                                    $query_sub = "SELECT * FROM iprs_menu WHERE type = 'sidebar' AND parent_id = '$menu[id]' AND link = '$new_link[0]'";
                                    $data_sub = $db->query($query_sub);
                            ?>

                                    <li class="breadcrumb-item"><a href="<?php echo $menu['link']; ?>"><?php echo $menu['label']; ?></a></li>

                                    <?php if(count($data_sub) > 0) { ?>
                                    
                                        <?php foreach($data_sub as $menu_sub) { ?>

                                            <li class="breadcrumb-item"><a href="<?php echo $menu_sub['link']; ?>" active><?php echo $menu_sub['label']; ?></a></li>

                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ol>
                </div>
            </li>

        </ul>

    </nav>

</div>
<!-- Top Bar End -->