<?php

session_start();

$mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$role = '';
$gender = '';
$showcolumn = '';
$actor = '';
$backup = '';

// $conn = mysqli_connect('localhost', 'kayla', 'test1234', 'crud');

// //check connection
// if(!$conn) {
//     echo 'Connecton error: ' . mysqli_connect_error();
// }

if (isset($_POST['save'])){
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $showcolumn = $_POST['showcolumn'];
    $actor = $_POST['actor'];
    $backup = $_POST['backup'];

    $mysqli->query("INSERT INTO data (role, gender, showcolumn, actor, backup) VALUES('$role', '$gender', '$showcolumn', '$actor', '$backup')") or
            die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");

}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
    if ($result->num_rows==1){
        $row = $result->fetch_array();
        $role = $row['role'];
        $gender = $row['gender'];
        $showcolumn = $row['showcolumn'];
        $actor = $row['actor'];
        $backup = $row['backup'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $showcolumn = $_POST['showcolumn'];
    $actor = $_POST['actor'];
    $backup = $_POST['backup'];

    $mysqli->query("UPDATE data SET role='$role', gender='$gender', showcolumn='$showcolumn', actor='$actor', backup='$backup' WHERE id=$id") or 
            die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}

?>