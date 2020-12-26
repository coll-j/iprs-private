<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");

    $data_user = get_data("iprs_user", "*", "", "created_date ASC");
    $total_user = count($data_user);
    
    $data_dept = get_data("iprs_department", "*");
    $total_dept = count($data_dept);

    $data_fac = get_data("iprs_faculty", "*");
    $total_fac = count($data_fac);

    $data_login = get_data("iprs_log", "slug, stats", "slug = 'login' AND stats = 'success'");
    $total_login = count($data_login);
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
                        <button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light pull-right" onclick="location.href='./user-add'"><i class="mdi mdi-plus"></i> Add User</button>
                        <h4 class="m-t-0 header-title">User List</h4>
                        <p class="text-muted m-b-30 font-13">
                            All users in <?php echo $system_name; ?>.
                        </p>

                        <div class="text-center mt-4 mb-4">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-custom bg-custom text-white">
                                        <i class="fi-head"></i>
                                        <h3 class="m-b-10"><?php echo $total_user; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Users</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-success widget-flat border-success text-white">
                                        <i class="fi-layers"></i>
                                        <h3 class="m-b-10"><?php echo $total_dept; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Departments</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-danger bg-danger text-white">
                                        <i class="fi-flag"></i>
                                        <h3 class="m-b-10"><?php echo $total_fac; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Faculties</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-primary widget-flat border-primary text-white">
                                        <i class="fi-eye"></i>
                                        <h3 class="m-b-10"><?php echo $total_login; ?></h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Has Logged In</p>
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
                        
                        <div id="load-user"></div> <!-- products will be load here -->
                        
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
                    <h4 class="modal-title" id="myLabel">View User</h4>
                </div>
                <div class="modal-body" id="detail_user">

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
        // Read the user
        $(document).ready(function() {
            readUser();
        });
        // View detail user using modal
        $(document).ready(function() {
            $(document).on('click', '#getData', function(e) {
                e.preventDefault();
                
                var id = $(this).data('id');   // it will get id of clicked row
                
                $.ajax({
                    url: 'user-view.php',
                    type: 'POST',
                    data: 'id='+id,
                    dataType: 'html'
                })
                .done(function(data){
                    console.log(data);  
                    $('#detail_user').html(data); // load response 
                    $('#view_data').modal("show"); 
                })
                .fail(function(){
                    $('#detail_user').html('<div class="alert alert-danger" role="alert">Something wrong, please try again...</div>');
                    $('#view_data').modal("show"); 
                });
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#deleteUser', function(e) {
            
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
                        url: 'user-delete.php',
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

        function readUser() {
            $('#load-user').load('user-read.php');   
        }
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>