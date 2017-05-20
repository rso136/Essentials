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

    if (name != '' && quantity != '') {

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

    }

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

    if (quantity < 0) {
        quantity = 1;
        $(this).siblings('.itemQuantity').val(1);
    }

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

    if (quantity < 0) {
        quantity = 1;
        $(this).siblings('.itemQuantity').val(1);
    }

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

    if (quantity < 0) {
        quantity = 1;
        $(this).siblings('.itemQuantity').val(1);
    }

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
