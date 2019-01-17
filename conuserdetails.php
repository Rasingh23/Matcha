<?php
session_start();
/* var_dump($_POST); */
if (!isset($_POST['gender']))
{
    header('Location: userdetails.php');
    echo "<br>pls select gender";
    exit();

}
if (!isset($_POST['pref']))
{
    echo "<br>pls select pref";
    exit();
}
if (empty($_POST['dp']))
{
    echo "<br>pls select dp";
    exit();
}
if (!isset($_POST['tags']))
{
    echo "<br>pls select tags";
    exit();
}
if ($_POST["age"] < 18)
{
    echo "<br>You must be at least 18 to sign up.";
    exit();
}
$tags = $_POST['tags'];
$info['age'] = $_POST['age'];
$info['dp'] = $_POST['dp'];
$info['bio'] = $_POST['bio'];
$info['pref'] = $_POST['pref'];
$info['gender'] = $_POST['gender'];
$info['tags'] = $tags;
$email = $_POST['email'];

$json = json_encode($info);
//var_dump($json);
///NEED TO FIGURE OUT HOW TO UPDATE JSON ARRAY
 try{
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("UPDATE `users` SET `info` = :info WHERE `E-mail` = :email");
    $stmt->bindValue(':info', $json);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $con=null;
}
catch (PDOException $e) {
    print "Error : ".$e->getMessage()."<br/>";
    die();
}   
header ('location: index.php');
?>

<script>

</script>