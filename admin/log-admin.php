<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data_log = get_data("iprs_log", "slug, stats");
    $total_log = 0;
    $total_success = 0;
    $total_error = 0;
    $total_edit = 0;
    $total_delete = 0;
    foreach ($data_log as $row) {
        if($row['slug'] == 'admin') {
            $total_log++;
            if($row['stats'] == 'success') $total_success++;
            if($row['stats'] == 'error') $total_error++;
            if($row['stats'] == 'edit') $total_edit++;
            if($row['stats'] == 'delete') $total_delete++;
        }
    }
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
                        <h4 class="m-t-0 header-title">Admin Logs List</h4>
                        <p class="text-muted m-b-30 font-13">
                            All logs by administrator in <?php echo $system_name; ?>.
                        </p>

                        <div class="text-center mt-4 mb-4">
                            <div class="row">
                                <div class="col-xs-6 col-sm-12">
                                    <div class="card-box widget-flat border-custom bg-custom text-white">
                                        <i class="fi-tag"></i>
                                        <h3 class="m-b-10"><?php echo $total_log; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Logs</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4 mb-4">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-success widget-flat border-success text-white">
                                        <i class="fi-check"></i>
                                        <h3 class="m-b-10"><?php echo $total_success; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Process Success</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-danger bg-danger text-white">
                                        <i class="fi-cross"></i>
                                        <h3 class="m-b-10"><?php echo $total_error; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Process Error</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-primary widget-flat border-primary text-white">
                                        <i class="fi-command"></i>
                                        <h3 class="m-b-10"><?php echo $total_edit; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Process Edit</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-purple bg-purple text-white">
                                        <i class="fi-trash"></i>
                                        <h3 class="m-b-10"><?php echo $total_delete; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Process Delete</p>
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
                        
                        <div id="load-admin"></div> <!-- products will be load here -->
                        
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

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
        // Read the admin log
        $(document).ready(function() {
            readAdmin();
        });

        $(document).ready(function() {
            $(document).on('click', '#deleteLogAdmin', function(e) {
            
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
                        url: 'log-admin-delete.php',
                        type: 'POST',
                        data: 'delete='+id,
                        dataType: 'json'
                     })
                     .done(function(response){
                        swal('Deleted!', response.message, response.status);
                        readUser();
                     })
                     .fail(function(){
                        swal('Oops...', 'Something went wrong!', 'error');
                     });
                  });
                },
                allowOutsideClick: false              
            });
        } 

        function readAdmin() {
            $('#load-admin').load('log-admin-read.php');   
        }
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>