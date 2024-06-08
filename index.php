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
                <button type="button" class="btn btn-primary m-1 float-right"><i class="fa-sharp fa-solid fa-user-plus"></i> &nbsp;&nbsp;Add a new User</button>
                <a href="#" class="btn btn-success m-1 float-right">Export to Excel</a>   
            </div>
        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                    <table class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Email</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=1; $i<=100; $i++): ?>
                            <tr class="text-center text-secondary">
                                <td><?= $i ?></td>
                                <td>user<?= $i ?>@gmail.com</td>
                                <td>title <?= $i ?></td>
                                <td>first <?= $i ?></td>
                                <td>625472424</td>
                                <td>
                                    <a href="#" title="View Deatils" class="text-sucsses">
                                        <i class="fa-solid fa-circle-info"></i>&nbsp;
                                    </a>
                                    <a href="#" title="Edit" class="text-primary">
                                        <i class="fas fa-edit fa-lg"></i>&nbsp;
                                    </a>
                                    <a href="#" title="Delete" class="text-danger">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-2.0.8/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>