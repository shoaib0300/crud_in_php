<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/bs4/dt-2.0.8/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
        <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion">Crud</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        </ul>
    </div>
    </nav>
        <!-- table -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center text-danger font-weight-normal my-3"><h4>CRUD APPLICATION</h4></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">All user in database</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addUserModal">
                    <i class="fa-sharp fa-solid fa-user-plus"></i> &nbsp;&nbsp;Add a new User</button>
                <a href="#" class="btn btn-success m-1 float-right">Export to Excel</a>   
            </div>
        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                </div>
            </div>
        </div>
    </div>
    <!-- Add new User model -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="form-data">
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone NUmber" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="insert" id="insert" value="Add User" class="btn btn-danger btn-block" placeholder="First Name" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User model -->
    <div class="modal fade" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="edit-form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone NUmber" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="edit" id="update" value="Update" class="btn btn-danger btn-block" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-2.0.8/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            showAllUsers();
            function showAllUsers(){
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {action: "view"},
                    success:function(response){
                        $("#showUser").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                })
            }

            $("#insert").click(function(e){
                if($("#form-data")[0].checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: $("#form-data").serialize()+"&action=insert",
                        success:function(response){
                            Swal.fire({
                                title: 'User added successfully!',
                                type: 'Sucess'
                            })
                            $("#addUserModal").modal('hide');
                            $("#form-data")[0].reset();
                            showAllUsers();
                        }
                    })
                }
            })

            $(document).ready(function() {
                $("#update").click(function(e) {
                    if($("#edit-form-data")[0].checkValidity()){
                        e.preventDefault();
                        $.ajax({
                            url: "action.php",
                            type: "POST",
                            data: $("#edit-form-data").serialize() + "&action=update",
                            success: function(response) {
                                Swal.fire({
                                    title: 'User updated successfully!',
                                    icon: 'success'
                                });
                                $("#editUserModal").modal('hide');
                                $("#edit-form-data")[0].reset();
                                showAllUsers(); 
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Error: " + status + ": " + error);
                            }
                        });
                    }
                });
            });


            $("body").on("click", ".editBtn", function(e){
                e.preventDefault();
                edit_id = $(this).attr('id');
                $.ajax({
                    url:"action.php",
                    type:"POST",
                    data:{edit_id:edit_id},
                    success:function(response){
                        // covert data into javascript object
                        data = JSON.parse(response);
                        $("#id").val(data.id);
                        $("#fname").val(data.first_name);
                        $("#lname").val(data.last_name);
                        $("#email").val(data.email);
                        $("#phone").val(data.phone);
                    }
                });
            });

            $("body").on("click", ".delBtn", function(e){
                e.preventDefault();
                var tr = $(this).closest('tr');
                delete_id = $(this).attr('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "action.php",
                            type: "POST",
                            data:{delete_id:delete_id},
                            success:function(response){
                                tr.css('background-color', '#ff6666');
                                Swal.fire(
                                    'Deleted!',
                                    'User Deleted successfully',
                                    'Success'
                                )
                                showAllUsers();
                            }
                        })
                    }
                    });
            });
        });
    </script>
</body>
</html>