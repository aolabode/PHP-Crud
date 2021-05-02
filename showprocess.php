<?php

session_start();

$mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));

$update = false;
$showID = 0;
$categoryID = 0;
$showCategoryID = 0;

$title = '';
$categoryName = '';
$writer = '';
$description = '';
$producer = '';
$director = '';
$openingDate = '';
$budgetSet = '';
$budgetActor = '';


if (isset($_POST['save'])){
    $title = $_POST['title'];
    $categoryName = $_POST['categoryName'];
    $writer = $_POST['writer'];
    $description = $_POST['description'];
    $producer = $_POST['producer'];
    $director = $_POST['director'];
    $openingDate = $_POST['openingDate'];
    $budgetSet = $_POST['budgetSet'];
    $budgetActor = $_POST['budgetActor'];

    $mysqli->query("INSERT INTO showtable (title, categoryName, writer, description, producer, director, openingDate, budgetSet, budgetActor) VALUES('$title', '$categoryName', '$writer', '$description', '$producer', '$director', '$openingDate', '$budgetSet', '$budgetActor')") or
            die($mysqli->error);

    //$mysqli->query("INSERT INTO showcategory (categoryName) VALUES('$categoryName')") or
            //die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: shows.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: shows.php");

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

    header('location: shows.php');
}

?>