<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <?php require_once 'showprocess.php'; ?>

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

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
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
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
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
                <div class="container">
                    <?php
                    $mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));
                    $result = $mysqli->query("SELECT * FROM showtable") or die(mysqli_error($mysqli));
                    //$result = $mysqli->query("SELECT * FROM showcategory") or die(mysqli_error($mysqli));
                    //pre_r($result);
                    ?>

                    <div class="d-flex justify-content-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Writer</th>
                                    <th>Description</th>
                                    <th>Producer</th>
                                    <th>Director</th>
                                    <th>Opening Date</th>
                                    <th>Set Budget</th>
                                    <th>Actor Budget</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['categoryName']; ?></td>
                                    <td><?php echo $row['writer']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['producer']; ?></td>
                                    <td><?php echo $row['director']; ?></td>
                                    <td><?php echo $row['openingDate']; ?></td>
                                    <td><?php echo $row['budgetSet']; ?></td>
                                    <td><?php echo $row['budgetActor']; ?></td>
                                    <td>
                                        <a href="shows.php?edit=<?php echo $row['showID']; ?>" class="btn btn-info">Edit</a>
                                        <a href="showprocess.php?delete=<?php echo $row['showID']; ?>" class="btn btn-danger">Delete</a>
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
                        <form action="showprocess.php" method="POST">
                            <input type="hidden" name="showID" value="<?php echo $showID; ?>">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="categoryName" class="form-control" value="<?php echo $categoryName; ?>" placeholder="Enter Category">
                            </div>

                            <div class="form-group">
                                <label>Writer</label>
                                <input type="number" name="writer" class="form-control" value="<?php echo $writer; ?>" placeholder="Enter number of writers">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name=description value="<?php echo $description; ?>" placeholder="Enter Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Producer</label>
                                <input type="number" name="producer" class="form-control" value="<?php echo $producer; ?>" placeholder="Enter number of producers">
                            </div>

                            <div class="form-group">
                                <label>Director</label>
                                <input type="number" name="director" class="form-control" value="<?php echo $director; ?>" placeholder="Enter number of directors">
                            </div>

                            <div class="form-group">
                                <label>Opening Date</label>
                                <input type="date" name="openingDate" class="form-control" value="<?php echo $openingDate; ?>" placeholder="Enter Opening Date">
                            </div>

                            <div class="form-group">
                                <label>Set Budget</label>
                                <input type="number" min="0.00" max="10000.00" step="0.01" name="budgetSet" class="form-control" value="<?php echo $budgetSet; ?>" placeholder="Enter Set Budget">
                            </div>

                            <div class="form-group">
                                <label>Actor Budget</label>
                                <input type="number" min="0.00" max="10000.00" step="0.01" name="budgetActor" class="form-control" value="<?php echo $budgetActor; ?>" placeholder="Enter Actor Budget">
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
</body>