<?php 
    require_once("../include/functions.php");
    // require_once("include/auth.php");

    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $data = get_data("iprs_event_type", "name, active", "id = '$id'");
?>
        
        <?php foreach($data as $row) { ?>
            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="event_type">Name</label>
                    <input class="form-control" type="text" id="event_type" name="name" placeholder="Name of event type" value="<?php echo $row['name']; ?>" required>
                </div>
            </div>

            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="active">Active</label>
                    <select id="active" name="active" class="form-control select2" required>
                        <option value="yes" <?php if($row['active'] == 'yes') echo "selected='selected'"; ?>>Yes</option>
                        <option value="no" <?php if($row['active'] == 'no') echo "selected='selected'"; ?>>No</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php } ?>

    <?php } ?>