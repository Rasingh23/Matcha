<?php
session_start();
session_destroy();
header('Location: index.php');
echo "<script>alert('You have successfully logged out.')</script>"
?>