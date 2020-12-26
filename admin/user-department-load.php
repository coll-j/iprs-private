<?php 
    require_once("../include/config.php");    
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_department a INNER JOIN iprs_faculty b ON a.`faculty` = b.`id`", "a.`id` as id, a.`faculty` as faculty_id, a.`name` as name, a.`slug` as slug, a.`active` as active, a.`created_by` as created_by, a.`created_date` as created_date, b.`id` as faculty_id, b.`name` as faculty_name", "", "a.`id` ASC");
    $x = 1;
?>

<?php if($data) { ?>
    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th width="20px">#</th>
                <th data-toggle="true">Name</th>
                <th>Slug</th>
                <th>Faculty</th>
                <th>Stats</th>
                <th>Created By</th>
                <th>Created Date</th>
                <th width="40px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $x; $x++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['slug']; ?></td>
                    <td><?php echo $row['faculty_name']; ?></td>
                    <td>
                        <?php if($row['active'] == "yes") echo "<span class='badge label-table badge-success'>Active</span>" ?>
                        <?php if($row['active'] == "no") echo "<span class='badge label-table badge-danger'>Deactive</span>" ?>
                    </td>
                    <td><?php echo $row['created_by']; ?></td>

                    <?php
                        $get_date = explode(" ", $row['created_date']);
                        $date = explode("-", $get_date[0]);
                        $created_date = $date[2] ."/". $date[1] ."/". $date[0];
                    ?>

                    <td><?php echo $created_date; ?></td>
                    <td>
                        <div class="btn-group dropdown">
                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item view_data" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" data-target="view_data" data-original-title="View Detail" title="View Detail"><i class="mdi mdi-view-list"></i> View Detail</button>
                                <button type="button" class="dropdown-item edit_department" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="editDepartment" data-placement="top"ata-target="edit_department" data-original-title="Edit" title="Edit"><i class="mdi mdi-pencil"></i> Edit</button>
                                <!-- <a href="#edit_event" class="btn btn-sm btn-custom" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" id="editEvent" data-id="<?php echo $row['id']; ?>" title="Edit"><i class="mdi mdi-pencil"></i></a> -->
                                <button type="button" class="dropdown-item" id="deleteDepartment" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="mdi mdi-delete"></i> Delete</button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else  { ?>
    <div class="alert alert-info" role="alert">
        <div class="text-center">No data available.</div>
    </div> 
<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
    });
</script>
