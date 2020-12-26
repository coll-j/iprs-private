<?php 
    require_once("../include/config.php");    
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_staff", "*", "", "id DESC");
    $x = 1;
?>

<?php if($data) { ?>
    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th width="40px">Profile</th>
                <th>Name</th>
                <th>WhatsApp</th>
                <th>Line ID</th>
                <th>Created By</th>
                <th>Stats</th>
                <th width="50px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $x; $x++; ?></td>
                    <td>
                        <img src="../upload/contact/<?php echo $row['photo']; ?>" alt="" title="<?php echo $row['name']; ?>" class="rounded-circle" />
                    </td>
                    <td>
                        <h5 class="m-0 font-weight-normal"><?php echo $row['name']; ?></h5>
                        <p class="mb-0 text-muted"><small><?php echo $row['position']; ?></small></p>
                    </td>
                    <td><?php echo $row['whatsapp']; ?></td>
                    <td><?php echo $row['lineid']; ?></td>
                    <td><?php echo $row['created_by']; ?></td>

                    <?php
                        if($row['active'] == 'yes') $active = "<span class='badge badge-success'>Active</span>";
                        if($row['active'] == 'no') $active = "<span class='badge badge-danger'>Not Active</span>";
                    ?>

                    <td><?php echo $active; ?></td>
                    <td>
                        <div class="btn-group dropdown">
                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list mr-2 text-muted font-18 vertical-middle"></i>View</button>
                                <button type="button" onclick="location.href='./contact-edit/<?php echo $row['id']; ?>'" class="dropdown-item" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</button>
                                <button type="button" class="dropdown-item" id="deleteContact" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Delete</button>
                            </div>
                        </div>
                    </td>
                    <!-- <td>
                        <button type="button" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list"></i></button>
                        <a href="./database-edit/<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-custom" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></a>
                        <button type="button" id="deleteProposal" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete"></i></button>
                    </td> -->
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