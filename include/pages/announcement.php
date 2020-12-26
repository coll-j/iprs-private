<!-- ANOUNNCEMENT -->
<?php 
    $date = get_date();
    $data = get_data("iprs_announcement a INNER JOIN iprs_user b ON a.`username` = b.`username`", "a.`id` as announcement_id, a.`username` as creator, a.`input_date` as input_date, a.`until_date` as until_date, a.`title` as title, a.`text` as text, a.`active` as active, a.`updated_by` as updated_by, a.`updated_date` as updated_date, a.`revision` as revision, b.`name` as name", "a.`active` = 'yes'");
    if($data) {
        foreach ($data as $get) {
            $expired_date = $get['until_date'];
        }
        if($date < $expired_date) {
?>
            <div class="row">
                
                <div class="col-12">
                    <div class="card m-b-30 text-xs-center">
                        <div class="card-header">
                            <strong>ANNOUNCEMENT</strong>
                        </div>
                        
                        <?php 
                        foreach ($data as $row) {
                        ?>
                            <div class="card-body">
                                <p class="text-muted m-b-25 font-13 pull-right">By <strong><?php echo $row['name'] ?></strong> at <?php echo show_date($row['input_date']); ?></p>
                                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                <p class="card-text"><?php echo $row['text']; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- END OF ANNOUNCEMENT -->
        <?php } ?>
    <?php } ?>