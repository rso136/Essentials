<?php
session_start();
include '../dbh.php';


$userID = mysqli_real_escape_string($conn, $_POST['userID']);

$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$passVal = mysqli_real_escape_string($conn, $_POST['passVal']);

if ($pass != $passVal) {

	include '../header.php';
		
	echo "<div class='jumbotron'><h1 id='jumboHeading'>ESSENTIALS</h1><h2 id='jumboSub'>Home & Lifestyle</h2><a href='../index.php' type='button' class='btn btn-jumbo btn-lg'>Go Back <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span></a> </div><div class='container-fluid'><div class='row'><div class='col-md-2 col-md-offset-5 col-sm-6 col-sm-offset-3 col-xs-12' id='loginBox'><h4 id='valFailMsg'>Please ensure password confirmation matches password</h4><br><form action='signup.inc.php' method='POST'><div class='form-group'><label>Enter your username:</label><input type='text' class='form-control' placeholder='Username' name='userID' required></div><div class='form-group'><label>Enter your password:</label><input type='password' class='form-control' placeholder='Password' id='password' name='pass' required></div><div class='form-group'><label>Confirm password:</label><input type='password' class='form-control' placeholder='Confirm Password' name='passVal' id='valPass' required></div><button type='submit' class='btn btn-submit btn-block'>SIGN UP <span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></button></form></div></div><div class='row'><div id='footer' class='col-md-12 col-xs-12'><br><p>Created by Richard Oh</p><p><b>© Richard Oh</b></p></div></div></div></body></html>";

} else {

	$sql = "SELECT userID FROM users WHERE userID='$userID'";
	$result = $conn->query($sql);
	$uidcheck = mysqli_num_rows($result);
	if ($uidcheck > 0) {
		header("Location: ../userexists.php");
		exit();
	} else {
		$encrypted_password = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (userID, pass) 
		VALUES ('$userID', '$encrypted_password')";
		$result = $conn->query($sql);

		header("Location: ../success.php");
	}
}

?>