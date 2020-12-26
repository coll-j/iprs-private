<?php 
    require_once("../include/config.php");    
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_proposal", "*", "", "input_date DESC");
    $x = 1;
?>

<?php if($data) { ?>
    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th data-toggle="true">Event Name</th>
                <th>Event Type</th>
                <th>Event Time</th>
                <th>Stats</th>
                <th>Uploaded By</th>
                <th>Uploaded Date</th>
                <th width="80px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $x; $x++; ?></td>
                    <td><?php echo $row['event_name']; ?></td>
                    <td><?php echo $row['event_type']; ?></td>
                    <td><?php echo show_date($row['event_time']); ?></td>
                    <td>
                        <?php if($row['stats'] == "approve") echo "<span class='badge label-table badge-success'>Approved</span>" ?>
                        <?php if($row['stats'] == "disapprove") echo "<span class='badge label-table badge-danger'>Disapproved</span>" ?>
                    </td>
                    <td><?php echo $row['username']; ?></td>

                    <?php
                        $get_date = explode(" ", $row['input_date']);
                        $date = explode("-", $get_date[0]);
                        $input_date = $date[2] ."/". $date[1] ."/". $date[0];
                    ?>

                    <td><?php echo $input_date; ?></td>
                    <td>
                        <div class="btn-group dropdown">
                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item" data-toggle="tooltip" data-id="<?php echo $row['id']; ?>" id="getData" data-placement="top" class="btn btn-sm btn-custom view_data" data-target="view_data" data-original-title="View Detail"><i class="mdi mdi-view-list mr-2 text-muted font-18 vertical-middle"></i>View</button>
                                <button type="button" onclick="location.href='./proposal-edit/<?php echo $row['id']; ?>'" class="dropdown-item" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</button>
                                <button type="button" class="dropdown-item" id="deleteProposal" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-danger" title="" data-original-title="Delete"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Delete</button>
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