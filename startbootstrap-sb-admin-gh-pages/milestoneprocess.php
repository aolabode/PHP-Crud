<?php

session_start();

$mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));

$milestoneID = 0;
$update = false;
$date = '';
$description = '';
$directorEvaluation = '';
$producerComments = '';

if (isset($_POST['save'])){
    $date = $_POST['date'];
    $description = $_POST['description'];
    $directorEvaluation = $_POST['directorEvaluation'];
    $producerComments = $_POST['producerComments'];

    $mysqli->query("INSERT INTO milestone (date, description, directorEvaluation, producerComments) VALUES('$date', '$description', '$directorEvaluation', '$producerComments')") or
            die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: milestone.php");

}

if (isset($_GET['delete'])){
    $milestoneID = $_GET['delete'];

    $mysqli->query("DELETE FROM milestone WHERE milestoneID=$milestoneID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: milestone.php");

}

if (isset($_GET['edit'])) {
    $milestoneID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM milestone WHERE milestoneID=$milestoneID") or die($mysqli->error);
    if ($result->num_rows==1){
        $row = $result->fetch_array();
        $date = $row['date'];
        $description = $row['description'];
        $directorEvaluation = $row['directorEvaluation'];
        $producerComments = $row['producerComments'];
    }
}

if (isset($_POST['update'])){
    $milestoneID = $_POST['milestoneID'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $directorEvaluation = $_POST['directorEvaluation'];
    $producerComments = $_POST['producerComments'];

    $mysqli->query("UPDATE milestone SET date='$date', description='$description', directorEvaluation='$directorEvaluation', producerComments='$producerComments' WHERE milestoneID=$milestoneID") or 
            die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: milestone.php');
}

?>