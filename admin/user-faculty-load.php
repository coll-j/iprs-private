<?php 
    require_once("../include/config.php");    
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_faculty", "*", "", "id ASC");
    $x = 1;
?>

<?php if($data) { ?>
    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th width="20px">#</th>
                <th data-toggle="true">Name</th>
                <th>Slug</th>
                <th>Stats</th>
                <th>Created By</th>
                <th>Created Date</th>
                <th width="130px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $x; $x++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['slug']; ?></td>
                    <td>
                        <?php if($row['active'] == "yes") echo "<span class='badge label-table badge-success'>Active</span>" ?>
                        <?php if($row['active'] == "no") echo "<span class='badge label-table badge-danger'>Deactive</span>" ?>
                    </td>
                    <td><?php echo $row['created_by']; ?></td>
                    <td><?php echo show_date($row['created_date']); ?></td>
                    <td>
                        <button type="button" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail" title="View Detail"><i class="mdi mdi-view-list"></i></button>
                        <button type="button" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="editFaculty" data-placement="top" class="btn btn-sm btn-custom edit_faculty" data-target="edit_faculty" data-original-title="Edit" title="Edit"><i class="mdi mdi-pencil"></i></button>
                        <!-- <a href="#edit_event" class="btn btn-sm btn-custom" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" id="editEvent" data-id="<?php echo $row['id']; ?>" title="Edit"><i class="mdi mdi-pencil"></i></a> -->
                        <button type="button" id="deleteFaculty" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="Delete" data-original-title="Delete"><i class="mdi mdi-delete"></i></button>
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
