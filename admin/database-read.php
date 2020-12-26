<?php 
    require_once("../include/config.php");    
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_database", "*", "", "created_date DESC");
    $x = 1;
?>

<?php if($data) { ?>
    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th data-toggle="true">Name</th>
                <th>Email</th>
                <th>Job Position</th>
                <th>Stats</th>
                <th>Dept.</th>
                <th>Gen.</th>
                <th>Added By</th>
                <th>Added Date</th>
                <th width="80px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $x; $x++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                    <td><?php echo $row['position']; ?></td>

                    <?php
                        $stats = "";
                        if($row['stats'] == "alumni") $stats = "<span class='badge badge-success'>Alumni</span>";
                        if($row['stats'] == "non_alumni") $stats = "<span class='badge badge-danger'>Non Alumni</span>";
                    ?>

                    <td><?php echo $stats; ?></td>

                    <?php
                        if($row['department'] == null) $department = "None";
                        else $department = $row['department'];

                        $get_department = get_data("iprs_department", "slug, name");
                        foreach ($get_department as $dept) {
                            if($department == $dept['slug']) $department = $dept['name'];
                        }

                        if($row['generation'] == null) $generation = "-";
                        else $generation = $row['generation'];
                    ?>

                    <td><?php echo $department; ?></td>
                    <td><?php echo $generation; ?></td>
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
                                <button type="button" class="dropdown-item" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list mr-2 text-muted font-18 vertical-middle"></i>View</button>
                                <button type="button" onclick="location.href='./database-edit/<?php echo $row['id']; ?>'" class="dropdown-item" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</button>
                                <button type="button" class="dropdown-item" id="deleteDatabase" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Delete</button>
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