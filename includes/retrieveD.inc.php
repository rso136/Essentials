<?php
session_start();
include '../dbh.php';

$q = $_GET['q'];

$sql = "SELECT * FROM items WHERE shopping='1' AND userID='".$q."' ORDER BY item"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	
	while($row = $result->fetch_assoc()) {
		echo "<div class='col-md-3 col-xs-12 shoppingItem'>".$row["item"]."<input class='form-control itemQuantity' name='quantity' type='number' min='1' max='1000' required><input class='itemName' type='hidden' name='item' value="."'".$row['item']."'"."><br><button class='btn btn-success btn-block buyBtn'>BUY</button></div>";
	}

} //else {
	//echo "<br><h3><i>Shopping list is currently empty</i></h3>";
//}

?>