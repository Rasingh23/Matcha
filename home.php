<?php session_start();
/* var_dump($_SESSION); */
try{

  $con = new PDO("mysql:host=localhost", "root", "123456");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $con->query("USE matcha");
  $stmt = $con->prepare("SELECT * FROM `users` WHERE `User`=:user");
  $stmt->bindParam(':user', $_SESSION['username']);
  $stmt->execute();
  $info = $stmt->fetch(PDO::FETCH_ASSOC);
  $new = json_decode($info['info'], true) ;
  $_SESSION['dp'] = "img/".$new['dp']; 
  $_SESSION['bio'] = $new['bio'];
  $_SESSION['age'] = $new['age'];
  $_SESSION['gender'] = $new['gender'];
  $GLOBALS['a'] = $new;
  $_SESSION['pref'] = $new['pref'];
  $con = null;
}
catch (PDOException $e) {

  print "Error : ".$e->getMessage()."<br/>";
  die();
}
try{

  $con = new PDO("mysql:host=localhost", "root", "123456");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $con->query("USE matcha");
  $stmt = $con->prepare("SELECT * FROM `likes` WHERE `likee_id` = :id AND `liker_stat` = 1 OR `liker_id` = :id AND `likee_stat` = 1");
  $stmt->bindParam(':id', $_SESSION['id']);
  $stmt->execute();
  $GLOBALS['rating'] = $stmt->rowCount();
  $con = null;
}
catch (PDOException $e) {

  print "Error : ".$e->getMessage()."<br/>";
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
<script src="js/upload.js"></script>
<script src="js/locate.js"></script>
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
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 w3-animate-left"><i class="fa fa-home w3-margin-right"></i>Logo</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-animate-left"
                title="News"><i class="fa fa-globe"></i></a>
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

    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <!-- Profile -->
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container">
                        <h4 class="w3-center">
                            <?php echo $_SESSION["username"] ?>
                        </h4>
                        <p class="w3-center"><img id='dp' src=<?php echo $_SESSION['dp'];?> class="w3-circle"
                            style="height:106px;width:106px" alt="Avatar"></p>
                        <hr>
                        <p><i class="fa dot fa-fw w3-margin-right w3-text-theme"></i></span>online</p>
                        <p id="locate"><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i></p>
                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>
                            <?php echo $_SESSION['age']?> years old</p>
                        <p><i style="font-size:100%;color:gold;" class="fa fa-fw w3-margin-right ">&starf;</i>
                            <?php echo $GLOBALS['rating']?>
                        </p>
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
            echo '<span class="w3-tag w3-small w3-theme-d5">'.$nu.'</span><br>';
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

                <div class="w3-card w3-round w3-white w3-center">
                    <div class="w3-container">
                        <p>Suggested</p>
                        <img id="suggest_img" src="" alt="Avatar" style="width:50%"><br>
                        <a href="" id = "suggest_name">Jane Doe</a>
                    </div>
                    <a href=".php">see more profiles</a>
                </div>

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
                                    <?php echo $_SESSION['bio'] ?>
                                </p>
                                <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="w3-third" style="padding:5px 5px 5px 5px;">
                    <div class=" w3-margin-bottom">
                        <img id='img0' class="w3-round-medium " style="width:100%;display:none;" onclick="onClick(this)"
                            alt="img0">
                    </div>
                    <img id='img1' class="w3-round-medium" style="width:100%;display:none;" onclick="onClick(this)" alt="img1">
                </div>
                <div class="w3-third" style=" padding:5px 5px 5px 5px">

                    <div class=" w3-margin-bottom">
                        <img id='img2' class="w3-round-medium" style="width:100%;display:none;" onclick="onClick(this)"
                            alt="img2">
                    </div>
                    <img id='img3' class="w3-round-medium" style="width:100%;display:none;" onclick="onClick(this)" alt="img3">
                </div>
                <br>

                <input type="submit" onclick="newimg()" class="w3-green" value="Upload Image" id="add" name="submit">
                <form id="form">
                    <input type="file" name="userpic" id="userpic" style="display:none">
                </form>
                <img id="newimg" style="display:none;">
                <br> <button id="del">delete</button>
            </div>
            <!-- End Middle Column -->


            <!-- Right Column -->

            <!-- <div style="float:right;border:solid; height:500px;">
  hi -->

            <!-- Right Column -->
            <div class="w3-col m2 w3-right">

                <div class="w3-card w3-round w3-white w3-center" id="results" class="w3-col m3">
                    .....
                </div>
                <!-- <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div> -->
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
    <footer class="w3-container w3-theme-d3 w3-padding-16" style="
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;">
        <h5>Footer</h5>
    </footer>


    <script>
        // Accordion
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-theme-d1";
            } else {
                x.className = x.className.replace("w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-theme-d1", "");
            }
        }

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
    </script>

</body>

</html>