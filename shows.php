<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <?php require_once 'showprocess.php'; ?>

    <?php

    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

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
        <?php while ($row = $result->fetch_assoc()): ?>
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
                        <a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>

        <?php

        function pre_r( $array ) {
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
        <?php if ($update == true): ?>
            <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        <?php endif; ?>
        </div>
    </form>
    </div>
    </div>
</body>
