<?php 
    require_once("../include/config.php");    
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_user", "*", "", "username DESC");
    $x = 1;
?>

<?php if($data) { ?>
    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Active</th>
                <th>Form</th>
                <th>Proposal</th>
                <th>Database</th>
                <th width="80px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <?php if($row['level'] != "developer") { ?>
                    <tr>
                        <td><?php echo $x; $x++; ?></td>
                        <td>
                            <a href="javascript: void(0);">
                                <img src="../upload/profile/<?php echo $row['photo']; ?>" alt="<?php echo $row['username']; ?>'s photo" title="<?php echo $row['name']; ?>" class="rounded-circle" />
                                <span class="ml-2"><?php echo $row['name']; ?></span>
                            </a>
                        </td>
                        <td><?php echo $row['username']; ?></td>

                        <?php
                            if(empty($row['email'])) $email = "Not Available";
                            else $email = $row['email'];
                        ?>

                        <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $email; ?></a></td>

                        <?php
                            if($row['level'] == "admin") $level = "<span class='badge badge-pink'>Administrator</span>";
                            // if($row['level'] == "developer") $level = "<span class='badge badge-purple'>Developer</span>";
                            if($row['level'] == "user") $level = "<span class='badge badge-light'>Standard User</span>";
                        ?>

                        <td><?php echo $level; ?></td>

                        <?php
                            if($row['active'] == 'yes') $active = "<span class='badge badge-success'>Yes</span>";
                            if($row['active'] == 'no') $active = "<span class='badge badge-danger'>No</span>";

                            if($row['form'] == 'active') $form = "<span class='badge badge-success'>Active</span>";
                            if($row['form'] == 'deactive') $form = "<span class='badge badge-danger'>Deactive</span>";
                        ?>

                        <td><?php echo $active; ?></td>
                        <td><?php echo $form; ?></td>

                        <?php
                            $proposal = $proposal = get_data("iprs_proposal", "id", "username = '$row[username]'");
                            $total_proposal = count($proposal);

                            $database = get_data("iprs_database", "id", "created_by = '$row[username]'");
                            $total_database = count($database);
                        ?>

                        <td><?php echo $total_proposal; ?></td>
                        <td><?php echo $total_database; ?></td>
                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button type="button" class="dropdown-item" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list mr-2 text-muted font-18 vertical-middle"></i>View</button>
                                    <button type="button" onclick="location.href='./user-edit/<?php echo $row['id']; ?>'" class="dropdown-item" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</button>
                                    <button type="button" class="dropdown-item" id="deleteUser" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Delete</button>
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