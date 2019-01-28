<?php session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/explore.js"></script>
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="w3-top w3-animate-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 w3-animate-left"><i class="fa fa-home w3-margin-right"></i>Logo</a>
            <a href="stat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-left"
                title="Stats"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></a>
            <a href="edit.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-right"
                title="Account Settings"><i class="fa fa-user"></i></a>
            <a href="chat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-right"
                title="Messages"><i class="fa fa-envelope"></i></a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button w3-padding-large w3-animate-left" title="Notifications"><i class="fa fa-bell"></i><span
                        class="w3-badge w3-right w3-small w3-green">1</span></button>
                <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                    <a href="#" class="w3-bar-item w3-button">One new friend request</a>
                </div>
            </div>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white w3-animate-zoom"
                title="My Account">
                <img onmouseover="switchani(this)" src="img/bg.jpg" class="w3-circle w3-spin" style="height:23px;width:23px"
                    alt="Avatar">

                <script>
                    function switchani(item){
        item.className = "w3-circle w3-spin";
      }
      </script>
            </a>
            <a href="exit.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-left"
                title="News"><i class="glyphicon glyphicon-log-out"></i></a>
            <div class="search-container">
                <form action="/action_page.php">
                    <input id="srchBox" type="text" placeholder="Search.." name="search" onkeyup='fetchnames(this.value)'>
                    <button id="srchBtn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
        <a href="chat.php" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
        <a href="edit.php" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
    </div>
    <br>

    <div id="main">
        <div class="w3-content" style="max-width: 50%; padding: 20px">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Sort
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="0" href="#">Location</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="1" href="#">Tags</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="2" href="#">Fame</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" id="menu2" type="button" data-toggle="dropdown">Filter
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="0" href="#">Location</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="1" href="#">Age</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="2" href="#">Tags</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="3" href="#">Fame</a></li>
                </ul>
            </div>
        </div>


    </div>


</body>

</html>

<script>
var i = 0;
var original = document.getElementById('card');

function duplicate() {
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "duplicater" + ++i;
    // or clone.id = ""; if the divs don't need an ID
    original.parentNode.appendChild(clone);
    document.createElement('br');
}
</script>