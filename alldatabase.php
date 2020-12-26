<?php
    require_once("include/config.php");    
    require_once("include/functions.php");
    require_once("include/auth.php");
?>

<?php require_once("include/pages/header_start.php"); ?>

<!-- DataTables -->
<link href="<?php echo $plugins_folder; ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $plugins_folder; ?>/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Multi Item Selection examples -->
<link href="<?php echo $plugins_folder; ?>/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Custom box css -->
<link href="<?php echo $plugins_folder; ?>/custombox/css/custombox.min.css" rel="stylesheet">

<!-- Sweet Alert css -->
<link href="<?php echo $plugins_folder; ?>/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<?php require_once("include/pages/header_end.php"); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <?php require_once("include/pages/sidebar.php"); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <?php require_once("include/pages/topbar.php"); ?>

            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <?php require_once("include/pages/announcement.php"); ?>

                    <!-- TABLE MY PROPOSAL -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <h4 class="m-t-0 header-title"><?php echo $title; ?></h4>
                                <div class="pull-right">
                                    <button type="button" onclick="location.href='./proposal'" class="btn btn-custom waves-light waves-effect">Add Database</button>
                                </div>
                                <p class="text-muted font-14 m-b-30">
                                    In this page, you can view detail list of all database.
                                </p>

                                <?php if(isset($_SESSION['information'])) { ?>
                                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php echo $_SESSION['information']; ?>
                                        <?php unset($_SESSION['information']); ?>
                                    </div>
                                <?php } ?>

                                <?php if(isset($_SESSION["form_error"])) { ?>
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php echo $_SESSION['form_error']; ?>
                                        <?php unset($_SESSION['form_error']); ?>
                                    </div>
                                <?php } ?>                                    

                                <br>

                                <div id="load-database"></div> <!-- products will be load here -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php require_once("include/pages/footer_start.php"); ?>

        </div>

        <!-- sample modal content -->
        <div id="view_data" class="modal fade view_data" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLabel">View Database</h4>
                    </div>
                    <div class="modal-body" id="detail_database">
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <?php require_once("include/pages/jquery.php"); ?>

    <!-- Required datatable js -->
    <script src="<?php echo $plugins_folder; ?>/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="<?php echo $plugins_folder; ?>/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/datatables/jszip.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/datatables/pdfmake.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/datatables/vfs_fonts.js"></script>
    <script src="<?php echo $plugins_folder; ?>/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/datatables/buttons.print.min.js"></script>

    <!-- Tooltipster js -->
    <script src="<?php echo $plugins_folder; ?>/tooltipster/tooltipster.bundle.min.js"></script>
    <script src="<?php echo $assets_folder; ?>/pages/jquery.tooltipster.js"></script>

    <!-- Modal-Effect -->
    <script src="<?php echo $plugins_folder; ?>/custombox/js/custombox.min.js"></script>
    <script src="<?php echo $plugins_folder; ?>/custombox/js/legacy.min.js"></script>

    <!-- Sweet Alert Js  -->
    <script src="<?php echo $plugins_folder; ?>/sweet-alert/sweetalert2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Load Prooposal
            readDatabase();

            // Default Datatable
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });

        // View detail proposal using modal
        $(document).ready(function() {
            $(document).on('click', '#getData', function(e) {
                e.preventDefault();
                
                var id = $(this).data('id');   // it will get id of clicked row
                
                $.ajax({
                    url: 'viewdatabase.php',
                    type: 'POST',
                    data: 'id='+id,
                    dataType: 'html'
                })
                .done(function(data){
                    console.log(data);  
                    $('#detail_database').html(data); // load response 
                    $('#view_data').modal("show"); 
                })
                .fail(function(){
                    $('#detail_database').html('<div class="alert alert-danger" role="alert">Something wrong, please try again...</div>');
                    $('#view_data').modal("show"); 
                });
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#deleteDatabase', function(e) {
            
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
                        url: 'deletedatabase.php',
                        type: 'POST',
                        data: 'delete='+id,
                        dataType: 'json'
                     })
                     .done(function(response){
                        swal('Deleted!', response.message, response.status);
                        readDatabase();
                     })
                     .fail(function(){
                        swal('Oops...', 'Something went wrong!', 'error');
                     });
                  });
                },
                allowOutsideClick: false              
            });
        } 

        function readDatabase() {
            $('#load-database').load('readalldatabase.php');   
        }
    </script>

    <?php require_once("include/pages/app.php"); ?>

</body>
<?php require_once("include/pages/footer_end.php"); ?>