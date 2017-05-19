<?php
session_start();
include '../dbh.php';

$userID = $_SESSION['userID'];
$item = $_GET['i'];
$quantity = $_GET['q'];

$sql = "UPDATE items SET shopping='0', quantity='".$quantity."' WHERE userID='" . $userID . "' AND item='" . $item . "'";

$result = $conn->query($sql);

$sql = "SELECT * FROM items WHERE shopping='1' AND category='disposables' AND userID='".$userID."' ORDER BY item"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {
		echo "<div class='shoppingItem'><h4>".$row["item"]."</h4><div class='col-md-8 col-md-offset-2 col-xs-6 col-xs-offset-3 shopInputBox'><input class='form-control itemQuantity' name='quantity' type='number' min='1' max='1000' value='1' required></div><input class='itemName' type='hidden' name='item' value="."'".$row['item']."'"."><button class='btn btn-buy btn-block buyBtnDisp'>BUY</button></div><br>";
	}

} else {
	echo "<h3><i>'Disposables' shopping list is currently empty</i></h3>";
}

?>