<?php

session_start();

$mysqli = new mysqli('localhost', 'kayla', 'test1234', 'crud') or die(mysqli_error($mysqli));

$productID = 0;
$update = false;

$item = '';
$vendor = '';
$description = '';
$amount = '';
$category = '';

// $conn = mysqli_connect('localhost', 'kayla', 'test1234', 'crud');

// //check connection
// if(!$conn) {
//     echo 'Connecton error: ' . mysqli_connect_error();
// }

if (isset($_POST['save'])){
    $item = $_POST['item'];
    $vendor = $_POST['vendor'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];

    $mysqli->query("INSERT INTO production (item, vendor, description, amount, category) VALUES('$item', '$vendor', '$description', '$amount', '$category')") or
            die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: production.php");

}

if (isset($_GET['delete'])){
    $productID = $_GET['delete'];

    $mysqli->query("DELETE FROM production WHERE productID=$productID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: production.php");

}

if (isset($_GET['edit'])) {
    $productID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM production WHERE productID=$productID") or die($mysqli->error);
    if ($result->num_rows==1){
        $row = $result->fetch_array();
        $item = $row['item'];
        $vendor = $row['vendor'];
        $description = $row['description'];
        $amount = $row['amount'];
        $category = $row['category'];
    }
}

if (isset($_POST['update'])){
    $productID = $_POST['productID'];
    $item = $_POST['item'];
    $vendor = $_POST['vendor'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];

    $mysqli->query("UPDATE production SET item='$item', vendor='$vendor', description='$description', amount='$amount', category='$category' WHERE productID=$productID") or 
            die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: production.php');
}




?>