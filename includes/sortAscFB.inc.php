<?php
session_start();
include '../dbh.php';

$userID = $_SESSION['userID'];

$sql = "SELECT * FROM items WHERE category='foodandbeverage' AND userID='" . $userID . "' AND shopping='0' ORDER BY quantity DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	echo "<ul class='list-group'>";	
	
	while($row = $result->fetch_assoc()) {
		echo "<li class='list-group-item res'><div class='removeRow'><span class='glyphicon glyphicon-remove deleteFB' aria-hidden='true'></span><input class='itemID' type='hidden' name='itemID' value="."'".$row['id']."'"."></div><span class='crItem'> ".$row["item"]. "</span>: <span class='crQuant'>".$row["quantity"]."</span><input class='itemName' type='hidden' name='item' value="."'".$row['item']."'"."><input type='hidden' name='userID' id='userVal' value="."'".$_SESSION['userID']."'"."><input class='itemQuantity' type='hidden' name='quantity' value="."'".$row['quantity']."'"."><br><button class='btn btn-adjustA btn-sm subBtn btnSubFB'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>
			<button class='btn btn-sm btn-adjustB subBtn btnAddFB'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
			</li>";
		echo "<br>";
	}

	echo "</ul>";
} else {
	echo "<br><h4><i>'Food & Beverage' inventory is currently empty</i></h4>";
}

?>