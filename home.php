<?php
	include 'header.php'
?>

<?php
    
    if (!isset($_SESSION['id'])) {
        
        header("Location: index.php");
    }

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-xs-12" id="infoBox">
            <h2 id="invHeading"><b>MY INVENTORY</b> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-5 col-sm-6 col-sm-offset-3 col-xs-12" id="submitBox">
			<br>
			<form action="javascript:0">
				<div class="form-group">
		 			<input class="form-control" name="item" placeholder="Item" maxlength="15" id="nameVal" required>
		 		</div>
		 		<div class="form-group" id="selectDiv">
		 			<select class='form-control' name="category" id="catVal">
                		<option value="foodandbeverage">Food & Beverage</option>
                		<option value="disposables">Disposables</option>
                		<option value="other">Other</option>
                	</select>
		 		</div>
		 		<div class="form-group">
		 			<input class="form-control" name="quantity" type="number" min="1" max="1000" placeholder="Quantity" id="quantVal" required>
		 		</div>
		 		<?php
		 			echo "<input type='hidden' name='userID' id='userVal' value="."'".$_SESSION['userID']."'".">";
				?>
				<button class='btn btn-submit btn-block' id="submitItem">ADD ITEM <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
				<br>
				<a class='btn btn-shopping btn-block' href="list.php">SHOPPING LIST</a>
			</form>
		</div>
	</div>
    <div class="row">
		<div class="col-md-2 col-md-offset-5 col-xs-12" id="statusBox">
		</div>
	</div>
    <div class="row">
        <br>
        <div class="col-md-2 col-md-offset-5 col-sm-6 col-sm-offset-3 col-xs-12" id="sortBox">
        <li class='list-group-item'>
        <p><b>SORT LISTS</b></p>
        <span class="glyphicon glyphicon-sort-by-attributes sort descending sort" aria-hidden="true"></span> <span class="glyphicon glyphicon-sort-by-attributes-alt sort ascending sort" aria-hidden="true"></span> <span class="glyphicon glyphicon-sort-by-alphabet sort alphabetical sort" aria-hidden="true"></span>
        </li>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <br>
            <hr>
        </div>
    </div>
	<div class="row">
		<div class="col-md-2 col-md-offset-3 col-sm-4 col-xs-12" id="boxA">
		 	<div class="headingDiv">
                <h3><span class="glyphicon glyphicon-cutlery" id="fbIcon" aria-hidden="true"></span></h3>
		 		<h3 class="headings">Food & Beverage</h3>
		 	</div>
		 	<div id="fbBox">
		 	</div>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-12" id="boxB">
			<div class="headingDiv">
                <h3><span class="glyphicon glyphicon-trash" id="dispIcon" aria-hidden="true"></span></h3>
		 		<h3 class="headings">Disposables</h3>
		 	</div>
		 	<div id="disposablesBox">
		 	</div>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-12" id="boxC">
			<div class="headingDiv">
                <h3><span class="glyphicon glyphicon-home" id="otherIcon" aria-hidden="true"></span></h3>
		 		<h3 class="headings">Other</h3>
		 	</div>
		 	<div id="otherBox">
		 	</div>
		</div>
	</div>
	<!--<div class="row">
		<div class="col-md-8 col-md-offset-2 col-xs-12" id="shoppingBox">

		</div>
	</div>-->

<div class="row">
    <div id="footer" class="col-md-12 col-xs-12">
        <br>
        <p>Created by Richard Oh</p>
        <p><b>© Richard Oh</b></p>
    </div>
</div>
</div>
<script src="/assets/scripts/script.js"></script>
</body>
</html>