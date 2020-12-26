<?php
    require_once(__DIR__ . '/lib/db.class.php');
    $db = new DB();

	// SETTINGS
    $query  = "SELECT * FROM iprs_setting";
	$data   = $db->query($query);
	foreach ($data as $row) {
		if($row['name'] == "system_name") $system_name = $row['value'];
		if($row['name'] == "favicon") $favicon = $row['value'];
		if($row['name'] == "logo") $logo = $row['value'];
		if($row['name'] == "logo_icon") $logo_icon = $row['value'];
		if($row['name'] == "author") $author = $row['value'];
		if($row['name'] == "assets_folder") $assets_folder = $row['value'];
		if($row['name'] == "plugins_folder") $plugins_folder = $row['value'];
		if($row['name'] == "login_background") $login_background = $row['value'];
		if($row['name'] == "footer") $footer = $row['value'];
        if($row['name'] == "timezone") $timezone = $row['value'];
        if($row['name'] == "base_path") $base_path = $row['value'];
        if($row['name'] == "main_email") $main_email = $row['value'];
	}

	// USER PAGE TITLE
	$db->bind("label", "user");
	$query  = "SELECT * FROM iprs_page WHERE label = :label";
    $data   = $db->query($query);
    $page 	= $_SERVER['PHP_SELF'];
    foreach ($data as $row) {
        if($page == $row['url']) {
            $title          = $row['title'];
            $description    = $row['description'];
        }
    }

    // ADMIN PAGE TITLE
    $db->bind("label", "admin");
    $query	= "SELECT * FROM iprs_page WHERE label = :label";
    $data 	= $db->query($query);
    $page 	= $_SERVER['PHP_SELF'];
    foreach ($data as $row) {
    	if($page == $row['url']) {
    		$admin_title	= $row['title'];
    		$admin_desc 	= $row['description'];
    	}
    }

?>