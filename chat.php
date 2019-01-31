<?php 
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<!--    <link rel="stylesheet" type="text/css" media="screen" href="css/chat.css" /> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="js/chat.js"></script>
    <script src="js/notify.js"></script>

</head>

<body>
 <!-- Navbar -->
 <div class="w3-top w3-animate-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 w3-animate-left"><i class="fa fa-home w3-margin-right"></i>Logo</a>
            <a href="stat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-left"
                title="Stats"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
            <a href="edit.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-right"
                title="Account Settings"><i class="fa fa-user"></i></a>
            <a href="chat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-right"
                title="Messages"><i class="fa fa-envelope"></i></a>
                <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button w3-padding-large w3-animate-left" title="Notifications"><i class="fa fa-bell"></i><span id = "notifycount"
                        class="w3-badge w3-right w3-small w3-green"></span></button>
                <div class="w3-dropdown-content w3-card-4 w3-bar-block" id="notify" style="width:300px">
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
    <div id="wrapper">
        <center>
            <h1>Welcome to my website</h1>
        </center>
        <div id="users" style="float:left;border:1px solid;">
</div>

        <div class="chat_wrapper" id="chat_wrapper" style="float:right;margin-right:60%">
        <div id="chat" style="border:solid 1px black"></div>
            <form method="POST" id="messageFrm">
                <textarea name="message" cols="50" rows="2" class="textarea" id="textarea" placeholder="Please Type a message to send"></textarea>
            </form>
        </div>
        
    </div>
</body>
</html>
