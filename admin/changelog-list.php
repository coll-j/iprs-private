<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data = get_data("iprs_changelog", "*");
    $total_data = count($data);

    $data_version = get_data("iprs_changelog", "MAX(version) as latest_version");
    foreach ($data_version as $row) {
        $latest_version = $row['latest_version'];
    }

    $data_date = get_data("iprs_changelog", "MAX(created_date) as latest_release");
    foreach ($data_date as $row) {
        $latest_release = $row['latest_release'];
    }

    if(empty($latest_version)) $latest_version = 0;
    if(empty($latest_release)) $latest_release = "0000-00-00 00:00:00";
?>

<?php require_once("pages/header_start.php"); ?>

<!-- DataTables -->
<link href="../<?php echo $plugins_folder; ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
<link href="../<?php echo $plugins_folder; ?>/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>

<!-- Tooltipster css -->
<link rel="stylesheet" href="../<?php echo $plugins_folder; ?>/tooltipster/tooltipster.bundle.min.css">

<!-- Multi Item Selection examples -->
<link href="../<?php echo $plugins_folder; ?>/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Custom box css -->
<link href="../<?php echo $plugins_folder; ?>/custombox/css/custombox.min.css" rel="stylesheet">

<!-- Sweet Alert css -->
<link href="../<?php echo $plugins_folder; ?>/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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
                        <button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light pull-right" onclick="location.href='./changelog-add'"><i class="mdi mdi-plus"></i> Add Changelog</button>
                        <h4 class="m-t-0 header-title">Changelog List</h4>
                        <p class="text-muted m-b-30 font-13">
                            All changelogs in <?php echo $system_name; ?>.
                        </p>

                        <div class="text-center mt-4 mb-4">
                            <div class="row">
                                <div class="col-xs-6 col-sm-4">
                                    <div class="card-box widget-flat border-info bg-info text-white">
                                        <i class="fi-content-right"></i>
                                        <h3 class="m-b-10"><?php echo $total_data; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Changelogs</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4">
                                    <div class="card-box bg-purple widget-flat border-purple text-white">
                                        <i class="fi-moon"></i>
                                        <h3 class="m-b-10"><?php echo $latest_version; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Latest Version</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4">
                                    <div class="card-box widget-flat border-pink bg-pink text-white">
                                        <i class="fi-sun"></i>
                                        <h3 class="m-b-10"><?php echo show_date($latest_release); ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Latest Release</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(isset($_SESSION['admin_info'])) { ?>
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $_SESSION['admin_info']; ?>
                                <?php unset($_SESSION['admin_info']); ?>
                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION["admin_error"])) { ?>
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $_SESSION['admin_error']; ?>
                                <?php unset($_SESSION['admin_error']); ?>
                            </div>
                        <?php } ?>  
                        
                        <div id="load-changelog"></div> <!-- products will be load here -->
                        
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- sample modal content -->
    <div id="view_data" class="modal fade view_data" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLabel">View Changelog</h4>
                </div>
                <div class="modal-body" id="detail_changelog">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php require_once("pages/footer_start.php"); ?>

    <?php require_once("pages/jquery.php"); ?>

   <!-- Tooltipster js -->
    <script src="../<?php echo $plugins_folder; ?>/tooltipster/tooltipster.bundle.min.js"></script>
    <script src="../<?php echo $assets_folder; ?>/pages/jquery.tooltipster.js"></script>

    <!-- Modal-Effect -->
    <script src="../<?php echo $plugins_folder; ?>/custombox/js/custombox.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/custombox/js/legacy.min.js"></script>

    <script src="../<?php echo $plugins_folder; ?>/datatables/jquery.dataTables.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../<?php echo $plugins_folder; ?>/datatables/dataTables.responsive.min.js"></script>

    <!-- Sweet Alert Js  -->
    <script src="../<?php echo $plugins_folder; ?>/sweet-alert/sweetalert2.min.js"></script>

    <script type="text/javascript">
        // Read the changelog
        $(document).ready(function() {
            readChangelog();
        });
        // View detail changelog using modal
        $(document).ready(function() {
            $(document).on('click', '#getData', function(e) {
                e.preventDefault();
                
                var id = $(this).data('id');   // it will get id of clicked row
                
                $.ajax({
                    url: 'changelog-view.php',
                    type: 'POST',
                    data: 'id='+id,
                    dataType: 'html'
                })
                .done(function(data){
                    console.log(data);  
                    $('#detail_changelog').html(data); // load response 
                    $('#view_data').modal("show"); 
                })
                .fail(function(){
                    $('#detail_changelog').html('<div class="alert alert-danger" role="alert">Something wrong, please try again...</div>');
                    $('#view_data').modal("show"); 
                });
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#deleteChangelog', function(e) {
            
                var id = $(this).data('id');
                swalDelete(id);
                e.preventDefault();
            });
        });

        function swalDelete(id) {
            swal({
                title: 'Are you sure?',
                text: "It will be deleted permanently!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                  
                preConfirm: function() {
                  return new Promise(function(resolve) {
                       
                     $.ajax({
                        url: 'changelog-delete.php',
                        type: 'POST',
                        data: 'delete='+id,
                        dataType: 'json'
                     })
                     .done(function(response){
                        swal('Deleted!', response.message, response.status);
                        readChangelog();
                     })
                     .fail(function(){
                        swal('Oops...', 'Something went wrong!', 'error');
                     });
                  });
                },
                allowOutsideClick: false              
            });
        } 

        function readChangelog() {
            $('#load-changelog').load('changelog-read.php');   
        }
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>