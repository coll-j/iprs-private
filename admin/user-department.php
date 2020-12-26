<?php 
    require_once("../include/config.php");
    require_once("../include/functions.php");
    require_once("include/auth.php");
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
                        <a href="#create_department" class="btn btn-custom btn-rounded w-md waves-effect waves-light pull-right" data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a"><i class="mdi mdi-plus"></i> Add Department</a>
                        <h4 class="m-t-0 header-title">Department List</h4>
                        <p class="text-muted m-b-30 font-13">
                            All the department of user and database.
                        </p>

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
                        
                        <div id="load-department"></div> <!-- products will be load here -->
                        
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
                    <h4 class="modal-title" id="myLabel">View Department</h4>
                </div>
                <div class="modal-body" id="detail_department"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal -->
    <div id="create_department" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Create Department</h4>
        <div class="custom-modal-text">
            <form class="form-horizontal" action="include/process.php" method="post">

                <div class="form-group m-b-25">
                    <div class="col-12">
                        <label for="department">Name</label>
                        <input class="form-control" type="text" id="department" name="name" placeholder="Name of department" required>
                    </div>
                </div>

                <div class="form-group m-b-25">
                    <div class="col-12">
                        <label for="slug">Slug</label>
                        <input class="form-control" type="text" id="slug" name="slug" placeholder="Slug name (ex: physics, mechanical_eng, etc)" required>
                    </div>
                </div>

                <div class="form-group m-b-25">
                    <div class="col-12">
                        <label for="faculty">Faculty</label>
                        <select id="faculty" name="faculty" class="form-control select2" required>
                            <option>Choose...</option>
                            <?php $data = get_data("iprs_faculty", "id, name"); ?>
                            <?php foreach($data as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group m-b-25">
                    <div class="col-12">
                        <label for="active">Active</label>
                        <select id="active" name="active" class="form-control select2" required>
                            <option value="yes" selected="selected">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="action" value="add_department">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">

                <div class="form-group account-btn text-center m-t-10">
                    <div class="col-12">
                        <button class="btn w-lg btn-rounded btn-custom waves-effect waves-light" type="submit">Create</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- sample modal content -->
    <div id="edit_department" class="modal fade edit_department" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="include/process.php" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLabel">Edit Department</h4>
                    </div>
                    <div class="modal-body" id="get_department"></div>
                    <div class="modal-footer">
                        <input type="hidden" name="action" value="edit_department">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                        <button type="submit" class="btn btn-primary waves-effect">Save Changes</button>
                    </div>
                </form>
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
        // Read the department
        $(document).ready(function() {
            readDepartment();
        });
        
        // View detail department using modal
        $(document).ready(function() {
            $(document).on('click', '#getData', function(e) {
                e.preventDefault();
                
                var id = $(this).data('id');   // it will get id of clicked row
                
                $.ajax({
                    url: 'user-department-view.php',
                    type: 'POST',
                    data: 'id='+id,
                    dataType: 'html'
                })
                .done(function(data){
                    console.log(data);  
                    $('#detail_department').html(data); // load response 
                    $('#view_data').modal("show"); 
                })
                .fail(function(){
                    $('#detail_department').html('<div class="alert alert-danger" role="alert">Something wrong, please try again...</div>');
                    $('#view_data').modal("show"); 
                });
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#editDepartment', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: 'user-department-edit.php',
                    type: 'POST',
                    data: 'id='+id,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#get_department').html(data);
                    $('#edit_department').modal('show');
                })
                .fail(function() {
                    $('#get_department').html('<div class="alert alert-danger" role="alert">Something wrong, please try again...</div>');
                    $('#edit_department').modal('show');
                })
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#deleteDepartment', function(e) {
            
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
                        url: 'user-department-delete.php',
                        type: 'POST',
                        data: 'delete='+id,
                        dataType: 'json'
                     })
                     .done(function(response){
                        swal('Deleted!', response.message, response.status);
                        readDepartment();
                     })
                     .fail(function(){
                        swal('Oops...', 'Something went wrong!', 'error');
                     });
                  });
                },
                allowOutsideClick: false              
            });
        } 

        function readDepartment() {
            $('#load-department').load('user-department-load.php');   
        }
    </script>

    <?php require_once("pages/app.php"); ?>

</body>
<?php require_once("pages/footer_end.php"); ?>