<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->

    <?php require_once 'process.php'; ?>

    <!-- Navigation bar top -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Round Avon Theater <br> Troupe</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            </li>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#!">Settings</a>
                <a class="dropdown-item" href="#!">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShow" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Round Avon Theater Troupe Show
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseShow" aria-labelledby="headingZero" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/PHP Crud/startbootstrap-sb-admin-gh-pages/shows.php">Shows</a>
                                <a class="nav-link" href="/PHP Crud/startbootstrap-sb-admin-gh-pages/character.php">Characters</a>
                                <a class="nav-link" href="/PHP Crud/startbootstrap-sb-admin-gh-pages/milestone.php">Production Milestones</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExpenses" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Weekly Expenses
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseExpenses" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/PHP Crud/startbootstrap-sb-admin-gh-pages/actors.php">Actors Expenses</a>
                                <a class="nav-link" href="/PHP Crud/startbootstrap-sb-admin-gh-pages/production.php">Production Expenses</a>
                                <a class="nav-link" href="/PHP Crud/startbootstrap-sb-admin-gh-pages/milestone.php">Operating Expenses</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingThree" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div id="layoutSidenav_content">
            <div class="container">
                <?php
                if (isset($_SESSION['message'])) : ?>

                    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif ?>

                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h2>Manage <b>Characters/Roles</b></h2>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Role</span></a>
                                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                                </div>
                            </div>
                        </div>

                        <?php
                        $mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));
                        $result = $mysqli->query("SELECT * FROM data") or die(mysqli_error($mysqli));
                        //pre_r($result);
                        ?>

                        <div class="d-flex justify-content-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Gender</th>
                                        <th>Show</th>
                                        <th>Actor</th>
                                        <th>Backup</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['role']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['showcolumn']; ?></td>
                                        <td><?php echo $row['actor']; ?></td>
                                        <td><?php echo $row['backup']; ?></td>
                                        <td>
                                            <!-- <a href="character.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                                            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a> -->

                                            <!-- <button type="button" class="btn btn-success edit"> EDIT </button> -->
                                            <a href="character.php?edit=<?php echo $row['id']; ?>" type="button" class="edit" class="btn btn-info"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="process.php?delete=<?php echo $row['id']; ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                                            <!-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>

                        <?php

                        function pre_r($array)
                        {
                            echo '<pre>';
                            print_r($array);
                            echo '</pre>';
                        }
                        ?>

                        <div class="d-flex justify-content-center">
                            <form action="process.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" name="role" class="form-control" value="<?php echo $role; ?>" placeholder="Enter Role">
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" name="gender" class="form-control" value="<?php echo $gender; ?>" placeholder="Enter Gender">
                                </div>

                                <div class="form-group">
                                    <label>Show</label>
                                    <input type="text" name="showcolumn" class="form-control" value="<?php echo $showcolumn; ?>" placeholder="Enter Show">
                                </div>

                                <div class="form-group">
                                    <label>Actor</label>
                                    <input type="text" name="actor" class="form-control" value="<?php echo $actor; ?>" placeholder="Enter Actor">
                                </div>

                                <div class="form-group">
                                    <label>Backup</label>
                                    <input type="text" name="backup" class="form-control" value="<?php echo $backup; ?>" placeholder="Enter Backup">
                                </div>

                                <div class="form-group">
                                    <?php if ($update == true) : ?>
                                        <button type="submit" class="btn btn-info" name="update">Update</button>
                                    <?php else : ?>
                                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Modal HTML -->
            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="process.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Role</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" id="role" name="role" class="form-control" value="<?php echo $role; ?>" placeholder="Enter Role">
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $gender; ?>" placeholder="Enter Gender">
                                </div>

                                <div class="form-group">
                                    <label>Show</label>
                                    <input type="text" id="showcolumn" name="showcolumn" class="form-control" value="<?php echo $showcolumn; ?>" placeholder="Enter Show">
                                </div>

                                <div class="form-group">
                                    <label>Actor</label>
                                    <input type="text" id="actor" name="actor" class="form-control" value="<?php echo $actor; ?>" placeholder="Enter Actor">
                                </div>

                                <div class="form-group">
                                    <label>Backup</label>
                                    <input type="text" id="backup" name="backup" class="form-control" value="<?php echo $backup; ?>" placeholder="Enter Backup">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <?php if ($update == true) : ?>
                                    <button type="submit" class="btn btn-info" name="update">Update</button>
                                <?php else : ?>
                                    <input type="submit" id="add-role-btn" class="btn btn-success" name="save" value="Save">
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Modal HTML -->
            <div id="editEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="process.php" method="POST">
                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Role</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" id="role" name="role" class="form-control" value="<?php echo $role; ?>" placeholder="Enter Role">
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $gender; ?>" placeholder="Enter Gender">
                                </div>

                                <div class="form-group">
                                    <label>Show</label>
                                    <input type="text" id="showcolumn" name="showcolumn" class="form-control" value="<?php echo $showcolumn; ?>" placeholder="Enter Show">
                                </div>

                                <div class="form-group">
                                    <label>Actor</label>
                                    <input type="text" id="actor" name="actor" class="form-control" value="<?php echo $actor; ?>" placeholder="Enter Actor">
                                </div>

                                <div class="form-group">
                                    <label>Backup</label>
                                    <input type="text" id="backup" name="backup" class="form-control" value="<?php echo $backup; ?>" placeholder="Enter Backup">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <?php if ($update != true) : ?>
                                    <button type="submit" class="btn btn-info" name="update">Update</button>
                                <?php else : ?>
                                    <input type="submit" id="add-role-btn" class="btn btn-success" name="save" value="Save">
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>

    <!-- <script>
        $(document).ready(function () {
            $('.edit').on('click', function() {
                $('#editEmployeeModal').modal('show');


                // $tr = $(this).closest('tr');

                // var data = $tr.children("td").map(function() {
                //     return $(this).text();
                // }).get();

                // console.log(data);


                // //$('#id').val(data[0]);
                // $('#id').val(data[0]);
                // $('#role').val(data[1]);
                // $('#gender').val(data[2]);
                // $('#showcolumn').val(data[3]);
                // $('#actor').val(data[4]);
                // $('#backup').val(data[5]);
            });
        });
    </script> -->
</body>