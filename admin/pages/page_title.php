<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <?php if($_SERVER['PHP_SELF'] == "/iprs/admin/dashboard.php") { ?>
                        <li class="breadcrumb-item active">Welcome to <strong>Admin Panel!</strong></li>
                    <?php } else { ?>
                        <?php
                        $default_link = substr($_SERVER['PHP_SELF'], 12);
                        $new_link = explode(".php", $default_link);

                        $query = "SELECT * FROM iprs_menu WHERE type = 'panel' AND link = '$new_link[0]'";
                        $data = $db->query($query);
                        foreach ($data as $row) {
                            $menu_id = $row['parent_id'];                         
                        }

                        $query = "SELECT * FROM iprs_menu WHERE type = 'panel' AND parent_id = 0 AND id = '$menu_id'";
                        $data = $db->query($query);

                        if(count($data) > 0) {
                            foreach ($data as $menu) {
                                $query_sub = "SELECT * FROM iprs_menu WHERE type = 'panel' AND parent_id = '$menu[id]' AND link = '$new_link[0]'";
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
            <h4 class="page-title"><?php echo $admin_title; ?></h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->