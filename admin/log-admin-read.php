<?php 
    require_once("../include/config.php");    
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_log", "*", "", "logdate DESC");
    $x = 1;
?>

<?php if($data) { ?>
    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Process</th>
                <th>Stats</th>
                <th>Log Date</th>
                <th>Activity</th>
                <?php if($_SESSION['level'] == 'developer') { ?>
                    <th width="50px">Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <?php if($row['slug'] == 'admin' && $row['username'] != 'admin') { ?>
                    <tr>
                        <td><?php echo $x; $x++; ?></td>
                        <td><strong><?php echo $row['username']; ?></strong></td>

                        <?php 
                            if($row['slug'] == 'admin') $process = "Administator";

                            if($row['stats'] == 'success') $stats = "<span class='badge badge-success'>Success</span>";
                            if($row['stats'] == 'error') $stats = "<span class='badge badge-danger'>Error</span>";
                            if($row['stats'] == 'edit') $stats = "<span class='badge badge-info'>Edit</span>";
                            if($row['stats'] == 'delete') $stats = "<span class='badge badge-purple'>Delete</span>";
                            if($row['stats'] == null) $stats = "<span class='badge badge-dark'>Edit</span>";
                        ?>

                        <td><?php echo $process; ?></td>
                        <td><?php echo $stats; ?></td>
                        <td><?php echo show_datetime($row['logdate']); ?></td>
                        <td><?php echo $row['activity']; ?></td>
                        <?php if($_SESSION['level'] == 'developer') { ?>
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <button type="button" class="dropdown-item" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list mr-2 text-muted font-18 vertical-middle"></i>View</button> -->
                                        <!-- <button type="button" onclick="location.href='./announcement-edit/<?php echo $row['id']; ?>'" class="dropdown-item" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</button> -->
                                        <button type="button" class="dropdown-item" id="deleteLogAdmin" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Delete</button>
                                        
                                    </div>
                                </div>
                            </td>
                        <?php } ?>
                        <!-- <td>
                            <button type="button" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list"></i></button>
                            <a href="./database-edit/<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-custom" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></a>
                            <button type="button" id="deleteProposal" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </td> -->
                    </tr>
                <?php } ?>
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