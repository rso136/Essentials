<?php
session_start();
include '../dbh.php';

$userID = mysqli_real_escape_string($conn, $_POST['userID']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = "SELECT * FROM users WHERE userID='$userID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_pwd = $row['pass'];
$hash = password_verify($pass, $hash_pwd);

if ($hash == 0) {
	//header("Location: ../index.php?error=nomatch");
	header("Location: ../noUser.php");
	exit();

} else {

	$sql = "SELECT * FROM users WHERE userID='$userID' AND pass='$hash_pwd'";

	$result = $conn->query($sql);

	//$result = $stmt->get_result();

	if (!$row = $result->fetch_assoc()) {
		echo "Your username or password is invalid";
	} else {
		$_SESSION['id'] = $row['id'];
		$_SESSION['userID'] = $row['userID'];
		header("Location: ../home.php");
	}

}



?>