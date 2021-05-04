<?php

session_start();

$mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));

$operatingID = 0;
$update = false;

$item = '';
$amount = '';
$vendor = '';
$category = '';
$taxID = '';

// $conn = mysqli_connect('localhost', 'kayla', 'test1234', 'crud');

// //check connection
// if(!$conn) {
//     echo 'Connecton error: ' . mysqli_connect_error();
// }

if (isset($_POST['save'])){
    $item = $_POST['item'];
    $amount = $_POST['amount'];
    $vendor = $_POST['vendor'];
    $category = $_POST['category'];
    $taxID = $_POST['taxID'];

    $mysqli->query("INSERT INTO operatingexpenses (item, amount, vendor, category, taxID) VALUES('$item', '$amount', '$vendor', '$category', '$taxID')") or
            die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: operating.php");

}

if (isset($_GET['delete'])){
    $operatingID = $_GET['delete'];

    $mysqli->query("DELETE FROM operatingexpenses WHERE operatingID=$operatingID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: operating.php");

}

if (isset ($_POST['delete']))
{
    $operatingID = $_POST['delete_id'];

    $mysqli->query("DELETE FROM operatingexpenses WHERE operatingID=$operatingID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: operating.php");

}

if (isset($_GET['edit'])) {
    $operatingID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM operatingexpenses WHERE operatingID=$operatingID") or die($mysqli->error);
    if ($result->num_rows){
        $row = $result->fetch_array();
        $item = $row['item'];
        $amount = $row['amount'];
        $vendor = $row['vendor'];
        $category = $row['category'];
        $taxID = $row['taxID'];
    }
}

if (isset($_POST['update'])){
    $operatingID = $_POST['update_id'];
    $item = $_POST['item'];
    $amount = $_POST['amount'];
    $vendor = $_POST['vendor'];
    $category = $_POST['category'];
    $taxID = $_POST['taxID'];

    $mysqli->query("UPDATE operatingexpenses SET item='$item', amount='$amount', vendor='$vendor', category='$category', taxID='$taxID' WHERE operatingID=$operatingID") or 
            die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: operating.php');
}




?>