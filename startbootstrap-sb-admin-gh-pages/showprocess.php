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
    $showID = $_GET['delete'];

    $mysqli->query("DELETE FROM showtable WHERE showID=$showID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: shows.php");

}

if (isset($_GET['edit'])) {
    $showID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM showtable WHERE showID=$showID") or die($mysqli->error);
    if ($result->num_rows==1){
        $row = $result->fetch_array();
        $title = $row['title'];
        $categoryName = $row['categoryName'];
        $writer = $row['writer'];
        $description = $row['description'];
        $producer = $row['producer'];
        $director = $row['director'];
        $openingDate = $row['openingDate'];
        $budgetSet = $row['budgetSet'];
        $budgetActor = $row['budgetActor'];
    }
}

if (isset($_POST['update'])){
    $showID = $_POST['showID'];
    $title = $_POST['title'];
    $categoryName = $_POST['categoryName'];
    $writer = $_POST['writer'];
    $description = $_POST['description'];
    $producer = $_POST['producer'];
    $director = $_POST['director'];
    $openingDate = $_POST['openingDate'];
    $budgetSet = $_POST['budgetSet'];
    $budgetActor = $_POST['budgetActor'];

    $mysqli->query("UPDATE showtable SET title='$title', categoryName='$categoryName', writer='$writer', description='$description', producer='$producer', director='$director', openingDate='$openingDate', budgetSet='$budgetSet', budgetActor='$budgetActor' WHERE showID=$showID") or 
            die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: shows.php');
}

?>