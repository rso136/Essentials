<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/assets/scripts/pace.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/pace.css">
    <link href="https://fonts.googleapis.com/css?family=Muli|Playfair+Display|Architects+Daughter|Satisfy" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand navbar-left" href="home.php">
                <p class="brandTitle"><b><i>ESSENTIALS</i></b></p>
            </a>
            
            <?php
            if (isset($_SESSION['id'])) {

                echo "<p class='navbar-brand navbar-right userInfo'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> ".$_SESSION['userID']."</p>";

                echo "<div class='navbar-header'><button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></button></div>";

                echo "<div class='collapse navbar-collapse' id='myNavbar'><ul class='nav navbar-nav'><li class='menuOption'><a href='home.php'><span class='glyphicon glyphicon-home' aria-hidden='true'></span></a></li><li class='menuOption'><a href='list.php'><span class='glyphicon glyphicon-th-list' aria-hidden='true'></a></span></li><li class='menuOption'><a href='about.php'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a></li><li class='menuOption'><form action='includes/logout.inc.php'><button type='submit' class='btn btn-logout btn-sm navbar-btn'>Logout</button></form></li></ul></div>";


            }
            ?>
        </div>
    </nav>
