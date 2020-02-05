<?php

	require_once 'core/init.php';	
	
	$db = DB::getInstance();
    try{
		$db->query("SELECT `user_id` FROM `users` WHERE `email` = ? AND `active`= 0 AND `ver_code`= ?",
		 array('email' => escape(input::get('email')), 'ver_code' => escape(input::get('token'))));
        if ($db->count() > 0)
        {
			$db->query("UPDATE `users` SET `active` = 1, `ver_code` = '' WHERE `email` = ?", array('email' => escape(input::get('email'))));
			echo "<meta http-equiv='refresh' content='0,url=index.php'>";
			echo '<script>alert("Your account has been activated successfully")</script>';
        }
    }
    catch (PDOException $e) {
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
    
?>