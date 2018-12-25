<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");

    $x = 1;
    $datas = get_data("iprs_database", "*", "created_by = '$_SESSION[username]'", "created_date ASC");
?>

<table id="datatable" class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Job Position</th>
            <th>Company</th>
            <th>Stats</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($datas as $row) { ?>
            <tr>
                <td align="center">
                    <?php echo $x; $x++; ?>
                </td>

                <td>
                    <?php echo $row['name']; ?>
                </td>

                <td>
                    <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                </td>
                
                <td>
                    <?php echo $row['position']; ?>
                </td>
                
                <td>
                    <?php echo $row['company']; ?>
                </td>
                
                <td align="center">
                    <?php
                        if($row['stats'] == "alumni") echo "<span class='badge badge-success'>Alumni</span>";
                        if($row['stats'] == "non_alumni") echo "<span class='badge badge-danger'>Non Alumni</span>";
                    ?>
                </td>

                <td align="center">
                    <button type="button" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list"></i></button>
                    <!-- <a href="./editdatabase/<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-custom" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></a>
                    <button type="button" id="deleteDatabase" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete"></i></button> -->
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
    });
</script>