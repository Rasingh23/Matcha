<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <script src="main.js"></script>
</head>
<body>
<div class="navbar" style="color:white;float:right">
<form action="login.php" method="post" style="float:right; margin:15px 50px">
Username <input type="text" name="usn" placeholder="Enter Username" required>      Password </label><input type="password" placeholder="Enter Password" name="pwd" required>
    <button type="submit" style="border:solid 1px;">Sign in</button>
    </form> 
</div>
    <form class ="otherform" action="consignup.php" method="post">
        <fieldset>
        <br>
        <b>First Name</b>
        <br><input  class="input"  type="text" name="first" placeholder="Enter First name" required><br>
        <br><b>Surname</b>
        <br><input  class="input"  type="text" name="last" placeholder="Enter Surname" required><br>
        <br><b>Username</b>
        <br><input  class="input"  type="text" name="user" placeholder="Enter Username" required><br>
       <br><label for="email"><b>Email</b></label><br>
      <input  class="input" type="text" placeholder="Enter Email" name="email" required><br>
      <br><label for="newpass"><b>Password</b></label><br>
      <input class="input"  type="password" placeholder="Enter Password" name="newpass" required><br>
      <br><label for="confirm"><b>Repeat Password</b></label><br>
      <input  class="input" type="password" placeholder="Repeat Password" name="confirm" required><br>
      <br><button style = "border : solid 1px" type="submit">Sign Up</button>
    </fieldset>
</form>
</body>
</html>