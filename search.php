<?php session_start();

try {
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `User`=:user");
    $stmt->bindParam(':user', $_GET['user']);
    $stmt->execute();
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
    $new = json_decode($info['info'], true);
    $GLOBALS['dp'] = "img/" . $new['dp'];
    $GLOBALS['bio'] = $new['bio'];
    $GLOBALS['age'] = $new['age'];
    $GLOBALS['a'] = $new;
    $GLOBALS['u_id'] = $info['userID'];
    $GLOBALS['online'] = $info['online'];
    $con = null;
    // var_dump ($_GET);
} catch (PDOException $e) {

    print "Error : " . $e->getMessage() . "<br/>";
    die();
}
try {
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("SELECT * FROM `likes` WHERE `likee_id` = :id AND `liker_stat` = 1 OR `liker_id` = :id AND `likee_stat` = 1");
    $stmt->bindParam(':id', $GLOBALS['u_id']);
    $stmt->execute();
    $GLOBALS['rating'] = $stmt->rowCount();
    $con = null;
} catch (PDOException $e) {

    print "Error : " . $e->getMessage() . "<br/>";
    die();
}
try {
  $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
        $token = str_shuffle($token);
        $token = substr($token, 0, 3);
        $user = $_SESSION['username'];
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("UPDATE `users` SET `views` = JSON_SET(views, '$.{$token}', '{$user}' ) WHERE `userID` = {$GLOBALS['u_id']}");
    $stmt->execute();
    $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
    $token = str_shuffle($token);
    $token = substr($token, 0, 3);
    $note = $_SESSION['username']." viewed your profile.";
    $con->query("USE matcha");
    $stmt = $con->prepare("UPDATE `users` SET `notify` = JSON_SET(notify, '$.{$token}', '{$note}' ) WHERE `userID` = {$GLOBALS['u_id']}");
    $stmt->execute();
    $con = null;
} catch (PDOException $e) {

    print "Error : " . $e->getMessage() . "<br/>";
    die();
}
?>

<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
<script src="js/like.js"></script>
<script src="js/block.js"></script>
<script src="js/notify.js"></script>
<!-- <script src="js/upload.js"></script> -->
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}

.dot {
  height: 1%;
  width: 3%;
  background-color: green;
  border-radius: 50%;
  margin-left: 2%;
}
.search-container button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
  }

.search-container {
  float: right;
}
  input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}
 .search-container button:hover {
    background: #ccc;
  }

  @media screen and (max-width: 600px) {
   .search-container {
      float: none;
    }
    .input[type=text], .search-container button {
      float: none;
      display: block;
      text-align: left;
      width: 12%;
      margin: 0;
      padding: 14px;
    }
    input[type=text] {
      border: 1px solid #ccc;
    }
  }
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top w3-animate-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 w3-animate-left"><i class="fa fa-home w3-margin-right"></i></a>
  <a href="stat.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-left" title="News"><i class="fa fa-globe"></i></a>
  <a href="edit.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-right" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="chat.php"  class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-right" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button w3-padding-large w3-animate-left" title="Notifications"><i class="fa fa-bell"></i><span id = "notifycount"
                        class="w3-badge w3-right w3-small w3-green"></span></button>
                <div class="w3-dropdown-content w3-card-4 w3-bar-block" id="notify" style="width:300px">
                </div>
            </div>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white w3-animate-zoom" title="My Account">
    <img onmouseover="switchani(this)" src="img/bg.jpg" class="w3-circle w3-spin" style="height:23px;width:23px" alt="Avatar">

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
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center" id="name"><?php echo $_GET['user'] ?></h4>
         <p class="w3-center"><img src=<?php echo $GLOBALS['dp']; ?> class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <?php if ($GLOBALS['online'] == '1') {
    echo '<p><i class="fa dot fa-fw w3-margin-right w3-text-theme"></i> online</p>';
} else {
    echo '<p><i class="fa dot fa-fw w3-margin-right w3-text-theme" style="  background-color: red;"></i>Last seen: ' . $GLOBALS['online'] . '</p>';
}

?>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $info['location'] ?> </p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo $GLOBALS['age'] ?> years old</p>
         <p><i style="font-size:100%;color:gold;" class="fa fa-fw w3-margin-right ">&starf;</i><?php echo $GLOBALS['rating']?> </p>
        </div>
      </div>
      <br>



      <!-- Interests -->
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
          <?php
foreach ($GLOBALS['a']['tags'] as $nu) {
    echo '<span class="w3-tag w3-small w3-theme-d5">' . $nu . '</span><br>';
}
//
?>
          </p>
        </div>
      </div>
      <br>

       <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

      <!-- Suggested -->
      <button class="w3-btn w3-red" style="text-shadow:1px 1px 0 #444" id="Report"> <a href="report.php"><b>Report</b> </a></button>
      <button class="w3-btn w3-black" style="text-shadow:1px 1px 0 #444" id="block" onclick="block()"><b>Block</b></button>
      <br>
      <br>
<?php

try {
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("Use matcha");
    $stmt = $con->prepare("SELECT * FROM `likes` WHERE `likee_id` = :id AND `liker_id` = :user");
    $stmt->bindValue(':user', $GLOBALS['u_id']);
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $con->query("Use matcha");
        $stmt = $con->prepare("SELECT * FROM `likes` WHERE `likee_id` = :user AND `liker_id` = :id");
        $stmt->bindValue(':user', $GLOBALS['u_id']);
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
    }
    $res = $stmt->fetch();
    if (($res['likee_stat'] == 1 && $res['likee_id'] == $_SESSION['id']) || ($res['liker_stat'] == 1 && $res['liker_id'] == $_SESSION['id'])) {
        echo '<button class="w3-btn w3-blue" data-this_shit=' . $GLOBALS['u_id'] . ' style="text-shadow:1px 1px 0 #444" id="like"><b>unlike</b></button>';
    } else if (($res['liker_stat'] == 1 && $res['likee_stat'] == 0 && $res['likee_id']) || ($res['liker_stat'] == 0 && $res['likee_stat'] == 1 && $res['liker_id'])) {
        echo '<button class="w3-btn w3-blue" data-this_shit=' . $GLOBALS['u_id'] . ' style="text-shadow:1px 1px 0 #444" id="like"><b>Like back</b></button>';
    } else {
        echo '<button class="w3-btn w3-blue" data-this_shit=' . $GLOBALS['u_id'] . ' style="text-shadow:1px 1px 0 #444" id="like"><b>Like</b></button>';
    }

    $con = null;
} catch (PDOException $e) {
    print "Error : " . $e->getMessage() . "<br/>";
    die();
}

?>

    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m7" style="padding:0px 10px 10px 10px">

      <div class="w3-row">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">About me:</h6>
              <p contenteditable="true" class="w3-border w3-padding">
                  <?php echo $GLOBALS['bio'] ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="w3-third" style="padding:5px 5px 5px 5px;">
      <div class=" w3-margin-bottom" >
      <img  id='img0'class="w3-round-medium " style="width:100%;display:none;" onclick="onClick(this)" alt="img0">
      </div>
      <img id='img1'class="w3-round-medium" style="width:100%;display:none;" onclick="onClick(this)" alt="img1">
    </div>
    <div class="w3-third" style=" padding:5px 5px 5px 5px">

<div class=" w3-margin-bottom" >
      <img id='img2'class="w3-round-medium" style="width:100%;display:none;" onclick="onClick(this)" alt="img2">
      </div>
      <img id='img3'class="w3-round-medium" style="width:100%;display:none;" onclick="onClick(this)" alt="img3">
    </div>
    <br>
      </div>
    <!-- End Middle Column -->

    <!-- Right Column -->
    <div class="w3-col m2 w3-right">

      <div class="w3-card w3-round w3-white w3-center" id="results" class="w3-col m3">
.....
</div>
        <br>

      <br>

    <!-- End Right Column -->
    </div>
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16"
   style="
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;">
  <h5>Footer</h5>
</footer>


<script>
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


 function ajaxdisplay() {
        var hr = new XMLHttpRequest();
        var url = "display.php";
        var parts = window.location.search.substr(1).split("&");
        var get = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            get[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }
         hr.open("POST", url, true);
        hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                 var test = JSON.parse(return_data);
               var arrayLength = test.length;
                for (var i = 0; i < arrayLength; i++) {
                    document.getElementById('img'+i).setAttribute('src',test[i]['img']);
                    document.getElementById('img'+i).style.display = "block";
                }
            }
        }
        var user = "user="+get['user'];
        hr.send(user);
    }


    $('document').ready(function (){
         ajaxdisplay();
    });

//     function block() {
//     alert("User has been blocked by function");
// }
</script>

</body>
</html>
