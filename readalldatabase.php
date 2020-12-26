<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");

    $x = 1;
    $datas = get_data("iprs_database", "company, created_by");
?>

<table id="datatable" class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Company</th>
            <th>Created by</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($datas as $row) { ?>
            <tr>
                <td align="center">
                    <?php echo $x; $x++; ?>
                </td>

                <td>
                    <?php echo $row['company']; ?>
                </td>
                
                <td>
                    <?php echo $row['created_by']; ?>
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