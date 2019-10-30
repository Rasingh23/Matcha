<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/notify.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- <script src="js/editjs.js"></script> -->
    <!-- <script src="js/myjs.js"></script> -->
</head>
<body>
  <!-- Navbar -->
  <div class="w3-top w3-animate-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 w3-animate-left"><i class="fa fa-home w3-margin-right"></i></a>
            <a href="stat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-left"
                title="Stats"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></a>
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
<br>
<form method = "POST" action = "conedit.php">
    <fieldset>
    Edit First Name <br>
    <input type='text' name="newfirstname" placeholder="New first name"><br>
    <br><input type="submit" name="user" value="Change First Name">
    </fieldset>
    </form>
    <form method = "POST" action = "conedit.php">
    <br><fieldset>
    Edit Surname <br>
    <input type='text' name="newsurname" placeholder="New surname"><br>
    <br><input type="submit" name="user" value="Change Surname">
    </fieldset>
    </form>
    <form method = "POST" action = "conedit.php">
    <br><fieldset>
    Edit Username <br>
    <input type='text' name="newname" placeholder="New username"><br>
    <br><input type="submit" name="user" value="Change Username">
    </fieldset>
    </form>
    <br>
    <form method = "POST" action = "conedit.php">
    <fieldset>
    Edit Password <br>
    <input type='password' name="upass" placeholder="current password"><br>
    <input type='password' name="newpass" placeholder="new password"><br>
    <input type='password' name="conpass" placeholder="Confirm new password"><br>
    <br><input type="submit" name="pass" value="Change Password">
    </fieldset>
    </form>
    <br>
    <form method = "POST" action = "conedit.php">
    <fieldset>
    Edit Email<br>
    <input type='text' name="umail" placeholder="current email"><br>
    <input type='text' name="newmail" placeholder="new email"><br>
    <br><input type="submit" name = "email" value="Change Email">
    </fieldset>
    </form>


    <input id="locSearch" type='text' name="locSearch" placeholder="search Location"><br>
    <select id="loc" class="loc" name="opt[]" multiple style="width: 50%">
                </select>
    <button id="locupd">Update Location</button>
    <br>
    <?php
$user = $_SESSION['username'];
try {
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `User` = :username");
    $stmt->bindValue(':username', $user);
    $stmt->execute();
    $res = $stmt->fetch();
    $con = null;
} catch (PDOException $e) {
    print "Error : " . $e->getMessage() . "<br/>";
    die();
}
echo "
        <input onclick='testfunc()' type='checkbox' id='chbx'  name='chbx'>
        <label for='chbx'>Receive notifications<label>
        ";

?>
<div class="footer">
  <p>Footer</p>
</div>
</body>
</html>
<script>
     /*      $(document).ready(function() {
        $('select').select2({
            placeholder: "enter location"
        }); */
$("#locupd").click(function (e) { 
    e.preventDefault();
   // alert($("select").val());
    $.post("functions/funcs.php?location="+$("select").val(), function (response){
        //console.log(response);
        if (response == 1){
            alert("Location updated");
            
        }
    });
});

$(document).ready(function () {

    $("#locSearch").keyup(function (e) {
        $("select").html('');
    e.preventDefault();
    searchVal = e.target.value;
    url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?input="+searchVal+"&types=(cities)&language=en_ZA&key=AIzaSyDwMhLbkQbBk7091NEYpSx9T_ykXnwgPuI";

    $.post(url, function (response) {
        console.log(response.predictions);
        var count = Object.keys(response.predictions).length;
        for (let index = 0; index < count; index++) {
            console.log(response.predictions[index]['description']);
            var opt = document.createElement('option');
            opt.value = response.predictions[index]['description'];
            opt.innerHTML = response.predictions[index]['description'] ;
           // select.appendChild(opt);
            $("select").append(opt);
       }


    });

    });

});

    </script>