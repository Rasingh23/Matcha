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
    <script src="js/editjs.js"></script>
    <script src="js/myjs.js"></script>
</head>
<body>
<div class="navbar">
    <?php
    if(isset($_SESSION['loggedin']))
    {
        echo " <span id='open' onclick='openNav()'>&#9776; </span>";
        echo "<button id='logout' onclick='logout()' class='loginbtn'>Logout</button>";
    }
    else
    {
        echo "<a href=signup.php ><button class='registerbtn'>Register</button></a>";
        echo "<button  onclick='showmodal()' class='loginbtn'>Login</button>";
    }
    ?>
</div>

<div id="mySidenav" class="sidenav" onload="shownav()"> 
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="profile.php">My Profile</a> 
    <a href="upload.php">Upload</a>   
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
    <br>
    <?php
    $user = $_SESSION['username'];
     try{
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE camagru");
        $stmt = $con->prepare("SELECT * FROM `users` WHERE `User` = :username");
        $stmt->bindValue(':username', $user);
        $stmt->execute();
        $res = $stmt->fetch();
        $con = null;
    }
    catch (PDOException $e) {
        print "Error : ".$e->getMessage()."<br/>";
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