<?php

session_start();

$mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));

$actorID = 0;
$update = false;

$fullname = '';
$role = '';
$ssn = '';
$amount = '';
$datePaid = '';

// $conn = mysqli_connect('localhost', 'kayla', 'test1234', 'crud');

// //check connection
// if(!$conn) {
//     echo 'Connecton error: ' . mysqli_connect_error();
// }

if (isset($_POST['save'])){
    $fullname = $_POST['fullname'];
    $role = $_POST['role'];
    $ssn = $_POST['ssn'];
    $amount = $_POST['amount'];
    $datePaid = $_POST['datePaid'];

    $mysqli->query("INSERT INTO actors (fullname, role, ssn, amount, datePaid) VALUES('$fullname', '$role', '$ssn', '$amount', '$datePaid')") or
            die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: actors.php");

}

if (isset($_GET['delete'])){
    $actorID = $_GET['delete'];

    $mysqli->query("DELETE FROM actors WHERE actorID=$actorID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: actors.php");

}

if (isset($_GET['edit'])) {
    $actorID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM actors WHERE actorID=$actorID") or die($mysqli->error);
    if ($result->num_rows==1){
        $row = $result->fetch_array();
        $fullname = $row['fullname'];
        $role = $row['role'];
        $ssn = $row['ssn'];
        $amount = $row['amount'];
        $datePaid = $row['datePaid'];
    }
}

if (isset($_POST['update'])){
    $actorID = $_POST['actorID'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role'];
    $ssn = $_POST['ssn'];
    $amount = $_POST['amount'];
    $datePaid = $_POST['datePaid'];

    $mysqli->query("UPDATE actors SET fullname='$fullname', role='$role', ssn='$ssn', amount='$amount', datePaid='$datePaid' WHERE actorID=$actorID") or 
            die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: actors.php');
}




?>