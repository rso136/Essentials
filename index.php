<?php
	include 'header.php'
?>

<?php
    
    if (isset($_SESSION['id'])) {
        
        header("Location: home.php");
    }

?>
<div class="jumbotron">
	<h1 id="jumboHeading">ESSENTIALS</h1>
	<h2 id="jumboSub">Home & Lifestyle</h2>
	<a href='signup.php' type="button" class="btn btn-jumbo btn-lg">Join Today <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a><a href="#anchor" type="button" class="btn btn-jumboB btn-lg">Learn More <span class="glyphicon glyphicon-file" aria-hidden="true"></span></a>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-md-offset-5 col-sm-6 col-sm-offset-3 col-xs-12" id="loginBox">
			<form action="includes/login.inc.php" method="POST">
				<div class="form-group">
		  			<input type="text" class="form-control" placeholder="Username" name="userID" required>
				</div>
				<div class="form-group">
		  			<input type="password" class="form-control" placeholder="Password" name="pass" required>
				</div>
				<button type="submit" class="btn btn-login btn-block">LOGIN <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></button>
			</form>
			<form action="includes/login.inc.php" method="POST">
				<input type="hidden" name="userID" value="guest">
				<input type="hidden" name="pass" value="abcd">
				<br>
				<a href='#' id="guestLogin" onclick='this.parentNode.submit(); return false;'>Login with guest account</a>
			</form>
			<hr>
			<h4>or</h4>
			<hr>
			<a class="btn btn-signup btn-block" href="signup.php">New Account <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
		</div>
	</div>
	<div id="anchor">
	</div>
	<div class="row" id="description">
		<div class="col-md-8 col-md-offset-2 col-xs-12">
		 	<h2><b>How Essentials Works</b></h2>
		 	<br>
		 	<h3>1. Track your home products which need to be replenished regularly by entering them into your personalized inventory.</h3>
		 	<br>
		 	<img src="/assets/images/imgA.png" height="350" width="250">
		 	<br>
		 	<h3>2. Whenever you expend an item, easily subtract it from your inventory through either your mobile device or computer.</h3>
		 	<br>
		 	<img src="/assets/images/imgC.png" height="350" width="250">
		 	<br>
		 	<h3>3. The Essentials app will automatically add fully expended items to your own shopping list so you don't have to worry about recalling what you need next time you go shopping.</h3>
		 	<br>
		 	<img src="/assets/images/imgB.png" height="350" width="250">
		 	<br>
		 	<h3>4. Knock items off your automated shopping list as you add them to your cart or once you're back home. Items crossed off your list will instantaneously return to your inventory for continued management.</h3>
		 	<br>
		 	<br>
		 	<h2 id="signUpLink"><a href='signup.php' id="signUpATag"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Try out Essentials today!</a></h2>
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

$('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
        return false;
        }
    }
});

</script>

</body>
</html>