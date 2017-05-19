<?php
	include 'header.php'
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-md-offset-5 col-xs-12" id="goBackRow">
			<br>
			<a class="btn btn-submit btn-block" href="home.php">BACK TO ITEM MANAGER</a>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-xs-12" id="shoppingHeading">
			<br>
			<h3>MY SHOPPING LIST</h3>
			<?php
		 		echo "<input type='hidden' name='userID' id='userValB' value="."'".$_SESSION['userID']."'".">";
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-3 col-xs-12" id="shoppingBox">

			<div class="col-md-3 col-xs-12 placeHolder">
					
					<img src="/assets/images/appleIcon.png" class="img-responsive appleImg" width="55" height="55">
			</div>
			<div class="col-md-3 col-xs-12 placeHolder">
				
					<img src="/assets/images/appleIcon.png" class="img-responsive appleImg" width="55" height="55">
			</div>
			<div class="col-md-3 col-xs-12 placeHolder">
					
					<img src="/assets/images/appleIcon.png" class="img-responsive appleImg" width="55" height="55">
					
			</div>
			<div class="col-md-3 col-xs-12 placeHolder">
					
					<img src="/assets/images/appleIcon.png" class="img-responsive appleImg" width="55" height="55">
			</div>
			<div class="col-md-3 col-xs-12 placeHolder">
					
					<img src="/assets/images/appleIcon.png" class="img-responsive appleImg" width="55" height="55">
			</div>
			<div class="col-md-3 col-xs-12 placeHolder">
					
					<img src="/assets/images/appleIcon.png" class="img-responsive appleImg" width="55" height="55">
					
			</div>
		</div>
	</div>
</div>
<script>

var str = $('#userValB').val();

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

            	$('#shoppingBox').prepend(response);

                var responseNum = $('.shoppingItem').length;
                console.log(responseNum);


                for (var i = 0; i < responseNum; i++) {
                	$('.placeHolder:first').remove();
                }
                
            }
        };
        
        xmlhttp.open("GET", "includes/retrieveD.inc.php?q=" + str, true);
        xmlhttp.send();

$(document).on('click', '.buyBtn', function() {
	console.log('click');

	var item = $(this).siblings('.itemName').val();
	var quantity = $(this).siblings('.itemQuantity').val();
	
	console.log('item: ' + item);
	console.log('quantity: ' + quantity);

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

                $(".shoppingItem").remove();
                $(".placeHolder").remove();
                
                for (var i = 0; i < 6; i++) {

                	$('#shoppingBox').append("<div class='col-md-3 col-xs-12 placeHolder'><img src='/assets/images/appleIcon.png' class='img-responsive appleImg' width='55' height='55'></div>");
            	}

            	$('#shoppingBox').prepend(response);
            	//$('#shoppingList').prepend(response);

                var responseNum = $('.shoppingItem').length;
                console.log(responseNum);


                for (var i = 0; i < responseNum; i++) {
                	$('.placeHolder:first').remove();
                }
            }
        };
        
        xmlhttp.open("GET", "includes/buy.inc.php?i=" + item + "&q=" + quantity, true);
        xmlhttp.send();


});

</script>
</body>
</html>