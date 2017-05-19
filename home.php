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
<script>

var str = $('#userVal').val();
var success = "Item successfully added!";
console.log(str);

if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fbBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/retrieve.inc.php", true);
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
                document.getElementById("disposablesBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/retrieveB.inc.php", true);
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
                document.getElementById("otherBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/retrieveC.inc.php", true);
        xmlhttp.send();

$(document).on('click', '#submitItem', function() {
    
    var name = $('#nameVal').val().trim();
    var category = $('#catVal').val().trim();
    var quantity = $('#quantVal').val().trim();

    console.log(name);
    console.log(category);
    console.log(quantity);

    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('Item added');

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
            } else {
                    // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("fbBox").innerHTML = this.responseText;
                }
            };
            
            xmlhttp.open("GET", "includes/retrieve.inc.php?q=" + str, true);
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
                    document.getElementById("disposablesBox").innerHTML = this.responseText;
                }
            };
            
            xmlhttp.open("GET", "includes/retrieveB.inc.php?q=" + str, true);
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
                    document.getElementById("otherBox").innerHTML = this.responseText;

                    $('#nameVal').val(null);

                    $('#selectDiv option:eq(0)').prop('selected', true);

                    $('#quantVal').val(null);

    
                }
            };
            
            xmlhttp.open("GET", "includes/retrieveC.inc.php?q=" + str, true);
            xmlhttp.send();

            }
        };
        
        xmlhttp.open("GET", "includes/insert.inc.php?n=" + name + "&c=" + category + "&q=" + quantity, true);
        xmlhttp.send();


        if (category == 'foodandbeverage' && name != '' && quantity != '') {
            $('#fbIcon').fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        }

        if (category == 'disposables' && name != '' && quantity != '') {
            $('#dispIcon').fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        }

        if (category == 'other' && name != '' && quantity != '') {
            $('#otherIcon').fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        }

        
        

        // if (window.XMLHttpRequest) {
        //             // code for IE7+, Firefox, Chrome, Opera, Safari
        //     xmlhttp = new XMLHttpRequest();
        //     } else {
        //             // code for IE6, IE5
        //         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        //       }
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             document.getElementById("fbBox").innerHTML = this.responseText;
        //         }
        //     };
            
        //     xmlhttp.open("GET", "includes/retrieve.inc.php?q=" + str, true);
        //     xmlhttp.send();

        // if (window.XMLHttpRequest) {
        //             // code for IE7+, Firefox, Chrome, Opera, Safari
        //     xmlhttp = new XMLHttpRequest();
        //     } else {
        //             // code for IE6, IE5
        //         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        //       }
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             document.getElementById("disposablesBox").innerHTML = this.responseText;
        //         }
        //     };
            
        //     xmlhttp.open("GET", "includes/retrieveB.inc.php?q=" + str, true);
        //     xmlhttp.send();

        // if (window.XMLHttpRequest) {
        //             // code for IE7+, Firefox, Chrome, Opera, Safari
        //     xmlhttp = new XMLHttpRequest();
        //     } else {
        //             // code for IE6, IE5
        //         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        //       }
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             document.getElementById("otherBox").innerHTML = this.responseText;
        //         }
        //     };
            
        //     xmlhttp.open("GET", "includes/retrieveC.inc.php?q=" + str, true);
        //     xmlhttp.send();

});

$(document).on('click', '.btnAddFB', function() {
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
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#fbBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/addFB.inc.php?i=" + item + "&q=" + quantity, true);
        xmlhttp.send();


});

$(document).on('click', '.btnSubFB', function() {
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
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#fbBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/subtractFB.inc.php?i=" + item + "&q=" + quantity, true);
        xmlhttp.send();


});

$(document).on('click', '.btnAddDisp', function() {
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
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#disposablesBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/addDisp.inc.php?i=" + item + "&q=" + quantity, true);
        xmlhttp.send();


});

$(document).on('click', '.btnSubDisp', function() {
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
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#disposablesBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/subtractDisp.inc.php?i=" + item + "&q=" + quantity, true);
        xmlhttp.send();


});

$(document).on('click', '.btnAddOther', function() {
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
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#otherBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/addOther.inc.php?i=" + item + "&q=" + quantity, true);
        xmlhttp.send();


});

$(document).on('click', '.btnSubOther', function() {
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
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#otherBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/subtractOther.inc.php?i=" + item + "&q=" + quantity, true);
        xmlhttp.send();


});

$(document).on('click', '.deleteFB', function() {
    console.log('click');

    var itemID = $(this).siblings('.itemID').val();
    console.log('Item ID: ' + itemID);
    
    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#fbBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/removeFB.inc.php?i=" + itemID, true);
        xmlhttp.send();


});

$(document).on('click', '.deleteDisp', function() {
    console.log('click');

    var itemID = $(this).siblings('.itemID').val();
    console.log('Item ID: ' + itemID);
    
    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#disposablesBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/removeDisp.inc.php?i=" + itemID, true);
        xmlhttp.send();


});

$(document).on('click', '.deleteOther', function() {
    console.log('click');

    var itemID = $(this).siblings('.itemID').val();
    console.log('Item ID: ' + itemID);
    
    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("fbBox").innerHTML = this.responseText;

                $('#otherBox').html(this.responseText);
            }
        };
        
        xmlhttp.open("GET", "includes/removeOther.inc.php?i=" + itemID, true);
        xmlhttp.send();


});


$('.descending').on('click', function() {

    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fbBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/sortDescFB.inc.php", true);
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
                document.getElementById("disposablesBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/sortDescDisp.inc.php", true);
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
                document.getElementById("otherBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/sortDescOther.inc.php", true);
        xmlhttp.send();

});

$('.ascending').on('click', function() {

    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fbBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/sortAscFB.inc.php", true);
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
                document.getElementById("disposablesBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/sortAscDisp.inc.php", true);
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
                document.getElementById("otherBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/sortAscOther.inc.php", true);
        xmlhttp.send();

});

$('.alphabetical').on('click', function() {

    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fbBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/retrieve.inc.php", true);
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
                document.getElementById("disposablesBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/retrieveB.inc.php", true);
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
                document.getElementById("otherBox").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "includes/retrieveC.inc.php", true);
        xmlhttp.send();

});



//if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
//        xmlhttp = new XMLHttpRequest();
//        } else {
//                // code for IE6, IE5
//            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//          }
//        xmlhttp.onreadystatechange = function() {
//            if (this.readyState == 4 && this.status == 200) {
//                document.getElementById("shoppingBox").innerHTML = this.responseText;
//            }
//        };
//        
//        xmlhttp.open("GET", "includes/retrieveD.inc.php?q=" + str, true);
//        xmlhttp.send();

//$(document).on('click', '.subBtn', function() {
//
//	var subItem = $(this).siblings('.crItem').text();
//
//	console.log(subItem);

//})


</script>
</body>
</html>