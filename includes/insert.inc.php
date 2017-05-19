<?php
session_start();
include '../dbh.php';

// $userID = mysqli_real_escape_string($conn, $_POST['userID']);
// $item = mysqli_real_escape_string($conn, $_POST['item']);
// $category = mysqli_real_escape_string($conn, $_POST['category']);
// $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

$userID = $_SESSION['userID'];
$item = $_GET['n'];
$category = $_GET['c'];
$quantity = $_GET['q'];

$sql = "INSERT INTO items (userID, item, category, quantity)
VALUES ('$userID', '$item', '$category', '$quantity')";
$result = $conn->query($sql);

//header("Location: ../home.php");

?>