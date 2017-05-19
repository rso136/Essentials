<?php
	include 'header.php'
?>

<?php
    
    if (!isset($_SESSION['id'])) {
        
        header("Location: index.php");
    }

?>

<div class="container">
	<div class="row listHeadingRow">
		<div class="col-md-12 col-xs-12">
			<h2 id='listHeading'><b>MY SHOPPING LIST</b>  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></h2>
		</div>
	</div>
	<div class="row backRow">
	 	<div class="col-md-12 col-xs-12">

	 		<a href='home.php' id='backInvLink'><h4><span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span> Back to Inventory</h4></a>

	 	</div>
	</div>
	<div class="row listRow">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<br>
			<h2 id="fbHeading"><b>Food & Beverages</b></h2>
			<br>
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12" id="shopListFB">
			</div>

		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<br>
			<h2 id="dispHeading"><b>Disposables</b></h2>
			<br>
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12" id="shopListDisp">
			</div>

		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<br>
			<h2 id="otherHeading"><b>Other</b></h2>
			<br>
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12" id="shopListOther">
			</div>
		</div>
	</div>
	<div class="row backRow">
	 	<div class="col-md-12 col-xs-12">

	 		<!-- <a href='home.php'><h4><span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span> Back to Inventory</h4></a> -->

	 	</div>
	</div>

<div class="row">
    <div id="footer" class="col-md-12 col-xs-12">
        <br>
        <p>Created by Richard Oh</p>
        <p><b>© Richard Oh</b></p>
    </div>
</div>
</div>
<script>

if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

            	var response = this.responseText;

            	$('#shopListFB').html(response);
                
            }
        };
        
        xmlhttp.open("GET", "includes/fbList.inc.php");
        xmlhttp.send();

if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

            	var response = this.responseText;

            	$('#shopListDisp').html(response);
                
            }
        };
        
        xmlhttp.open("GET", "includes/dispList.inc.php");
        xmlhttp.send();

if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

            	var response = this.responseText;

            	$('#shopListOther').html(response);
                
            }
        };
        
        xmlhttp.open("GET", "includes/otherList.inc.php");
        xmlhttp.send();

$(document).on('click', '.buyBtnFB', function() {

	var item = $(this).siblings('.itemName').val();
	var quantity = $(this).siblings('.shopInputBox').children('.itemQuantity').val();
	
	console.log('item: ' + item);
	console.log('quantity: ' + quantity);

	if (quantity != '' && parseFloat(quantity) > 0) {

		if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp = new XMLHttpRequest();
	        } else {
	                // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	          }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                
	                var response = this.responseText;
	                $('#shopListFB').html(response);
	                
	            }
	        };
	        
	        xmlhttp.open("GET", "includes/buyFB.inc.php?i=" + item + "&q=" + quantity, true);
	        xmlhttp.send();
    }

});

$(document).on('click', '.buyBtnDisp', function() {

	var item = $(this).siblings('.itemName').val();
	var quantity = $(this).siblings('.shopInputBox').children('.itemQuantity').val();
	
	console.log('item: ' + item);
	console.log('quantity: ' + quantity);

	if (quantity != '' && parseFloat(quantity) > 0) {

		if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp = new XMLHttpRequest();
	        } else {
	                // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	          }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                
	                var response = this.responseText;
	                $('#shopListDisp').html(response);
	                
	            }
	        };
	        
	        xmlhttp.open("GET", "includes/buyDisp.inc.php?i=" + item + "&q=" + quantity, true);
	        xmlhttp.send();
    }

});

$(document).on('click', '.buyBtnOther', function() {

	var item = $(this).siblings('.itemName').val();
	var quantity = $(this).siblings('.shopInputBox').children('.itemQuantity').val();
	
	console.log('item: ' + item);
	console.log('quantity: ' + quantity);

	if (quantity != '' && parseFloat(quantity) > 0) {

		if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp = new XMLHttpRequest();
	        } else {
	                // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	          }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                
	                var response = this.responseText;
	                $('#shopListOther').html(response);
	                
	            }
	        };
	        
	        xmlhttp.open("GET", "includes/buyOther.inc.php?i=" + item + "&q=" + quantity, true);
	        xmlhttp.send();

    }

});



</script>

</body>
</html>
