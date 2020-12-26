<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

            <?php
                $query = "SELECT * FROM iprs_menu WHERE type = 'panel' AND parent_id = 0 AND active = 'yes'";
                $data = $db->query($query);

                if(count($data) > 0) {
                    foreach ($data as $menu) {
                        $query_sub = "SELECT * FROM iprs_menu WHERE type = 'panel' AND parent_id = '$menu[id]' AND active = 'yes'";
                        $data_sub = $db->query($query_sub);
            ?>

                        <li class="has-submenu">
                            <a href="<?php echo $menu['link']; ?>"><i class="<?php echo $menu['icon']; ?>"></i><?php echo $menu['label']; ?></a>
                        

                            <?php if(count($data_sub) > 0) { ?>

                                <ul class="submenu">

                                    <?php foreach($data_sub as $menu_sub) { ?>

                                        <li><a href="<?php echo $menu_sub['link']; ?>"><?php echo $menu_sub['label']; ?></a></li>

                                    <?php } ?>

                                </ul>

                            <?php } ?>

                        </li>

                    <?php } ?>
                <?php } ?>

            </ul>    
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div> <!-- end navbar-custom -->