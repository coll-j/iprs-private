<?php 
    require_once("../include/functions.php");
    // require_once("include/auth.php");

    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $data = get_data("iprs_department", "faculty, name, slug, active", "id = '$id'");
?>
        
        <?php foreach($data as $row) { ?>
            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="department">Name</label>
                    <input class="form-control" type="text" id="department" name="name" placeholder="Name of department" value="<?php echo $row['name']; ?>" required>
                </div>
            </div>

            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="slug">Slug</label>
                    <input class="form-control" type="text" id="slug" name="slug" placeholder="Slug name (ex: physics, mechanical_eng, etc)" value="<?php echo $row['slug']; ?>" required>
                </div>
            </div>

            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="faculty">Faculty</label>
                    <select id="faculty" name="faculty" class="form-control select2" required>
                        <option>Choose...</option>
                        <?php $faculty = get_data("iprs_faculty", "id, name"); ?>
                        <?php foreach($faculty as $list) { ?>
                            <option value="<?php echo $list['id']; ?>" <?php if($row['faculty'] == $list['id']) echo "selected='selected'"; ?>><?php echo $list['name']; ?></option>
                        <?php } ?>
                    </select>
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