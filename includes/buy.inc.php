<?php
session_start();
include '../dbh.php';

$userID = $_SESSION['userID'];
$item = $_GET['i'];
$quantity = $_GET['q'];

$sql = "UPDATE items SET shopping='0', quantity='".$quantity."' WHERE userID='" . $userID . "' AND item='" . $item . "'";

$result = $conn->query($sql);

$sql = "SELECT * FROM items WHERE shopping='1' AND userID='".$userID."' ORDER BY item"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	//echo "<ul class='list-group'>";	
	
	while($row = $result->fetch_assoc()) {
		echo "<div class='col-md-3 col-xs-12 shoppingItem'>".$row["item"]."<input class='form-control itemQuantity' name='quantity' type='number' min='1' max='1000' required><input class='itemName' type='hidden' name='item' value="."'".$row['item']."'"."><br><button class='btn btn-success btn-block buyBtn'>BUY</button></div>";
	}

	//echo "</ul>";
} //else {
	//echo "<br><h3><i>Shopping list is currently empty</i></h3>";
//}

//header("Location: ../shopping.php");

?>