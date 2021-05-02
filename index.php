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
    <?php require_once 'process.php'; ?>

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
        <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['showcolumn']; ?></td>
                    <td><?php echo $row['actor']; ?></td>
                    <td><?php echo $row['backup']; ?></td>
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
