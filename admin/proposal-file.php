<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");
?>

<?php require_once("pages/header_start.php"); ?>

<!-- Tooltipster css -->
<link rel="stylesheet" href="../<?php echo $plugins_folder; ?>/tooltipster/tooltipster.bundle.min.css">

<?php require_once("pages/header_end.php"); ?>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        
        <?php require_once("pages/topbar.php"); ?>

        <?php require_once("pages/navbar.php"); ?>
        
    </header>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container-fluid">

            <?php require_once("pages/page_title.php"); ?>

            <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title m-b-30">Proposal Files</h4>

                            <div class="row">
                                <?php 
                                    $query = "SELECT file_name, file_size, event_name, id FROM iprs_proposal ORDER BY id DESC LIMIT 6";
                                    $data = $db->query($query);
                                    $location = "../upload/proposal/";
                                ?>
                                <?php foreach ($data as $row) { ?>
                                    <?php $id = $row['id']; ?>
                                    <div class="col-lg-3 col-xl-2">
                                        <div class="file-man-box" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $row['event_name']; ?>" title="<?php echo $row['event_name']; ?>">
                                            <div class="file-img-box">
                                                <img src="../<?php echo $assets_folder; ?>/images/file_icons/pdf.svg" alt="icon">
                                            </div>
                                            <a href="<?php echo $location.$row['file_name']; ?>" class="file-download"><i class="mdi mdi-download"></i> </a>
                                            <div class="file-man-title">
                                                <h5 class="mb-0 text-overflow"><?php echo $row['file_name']; ?></h5>
                                                <p class="mb-0"><small><?php echo size($row['file_size']); echo $id; ?></small></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="postList"></div>

                            <div class="text-center mt-3" aligh id="show_more_main<?php echo $id; ?>">
                                <button type="button" class="btn btn-outline-danger w-md waves-effect waves-light show_more" id="<?php echo $id; ?>"><i class="mdi mdi-refresh"></i> Load More Files</button>
                                <button type="button" class="btn btn-outline-danger w-md waves-effect waves-light loading" style="display: none;"><i class="mdi mdi-refresh"></i> Loading...</button>
                            </div>

                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <?php require_once("pages/footer_start.php"); ?>

    <?php require_once("pages/jquery.php"); ?>

    <!-- Tooltipster js -->
    <script src="../<?php echo $plugins_folder; ?>/tooltipster/tooltipster.bundle.min.js"></script>
    <script src="../<?php echo $assets_folder; ?>/pages/jquery.tooltipster.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.show_more', function() {
                var id = $(this).attr('id');
                $('.show_more').hide();
                $('.loading').show();
                $.ajax({
                    type: 'post',
                    url: 'proposal-load.php',
                    data: 'id='+id,
                    success: function(html) {
                        $('#show_more_main'+id).remove();
                        $('.postList').append(html);
                    }
                });
            });
        });
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>