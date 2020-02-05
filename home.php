<?php
require_once 'core/init.php';
$db = DB::getInstance();
$user = new user;
$userProfile = json_decode($user->data()->profile);

function build_list($people)
{
	global $db;
	$profiles = "";
	foreach ($people as $person => $details) {
		$info = json_decode($details->profile);
		$profiles .= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
			<img src="' . $info->dp . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height:60px">
			<span class="w3-right w3-opacity">' . $info->last_login . '</span>
			<h4 style="cursor: pointer;" ><a onclick="build_profile(this)" style="text-decoration: none" href="#'. $details->username .'">' . $details->username . '</a></h4><br>
			<h5>' . $details->first_name . ' ' . $details->last_name . '</h5>
			<h5>Age: '. age($info->DOB) .'</h5>
			<hr class="w3-clear">
			<div class="w3-row-padding" style="margin:0 -16px">';
		$images = explode(",", $details->images);
		foreach ($images as $image => $pic) {
			$profiles .= '<div class="w3-half">
				<img src="' . $pic . '" style="max-width:100%" alt="' . $pic . '" class="w3-margin-bottom">
				</div>';
		}
		$profiles .= '</div>
			</div>';
	}
	return $profiles;
}

if (input::exists('request')) {
	if (input::get('all'))
	{
		$db->query("DROP TABLE IF EXISTS " . $user->data()->username . "; 
		CREATE TABLE " . $user->data()->username . " AS (SELECT users.*, GROUP_CONCAT(gallery.img_name) AS 'images', 
		CAST(JSON_EXTRACT(`profile`, '$.age') AS unsigned) AS 'age',
		CAST(JSON_EXTRACT(`profile`, '$.fame') AS unsigned) AS 'fame' " . tagCount(input::get('tags')) . ",
		CAST('0' AS unsigned) AS 'distance'
		FROM `users` JOIN gallery ON gallery.user_id = users.user_id  
		WHERE `users`.`user_id` != ?
		AND (SELECT JSON_SEARCH(`blocked`, 'all', '".$user->data()->username ."')) IS NULL 
		AND " .preference(json_decode($user->data()->profile)) ." 
		GROUP BY users.user_id);", array('users.user_id' => $user->data()->user_id));	
		
		$db->query("SELECT * FROM " . $user->data()->username); 
		$people = $db->results();
		distanceUpdate($people);
		$db->query("SELECT * FROM " . $user->data()->username); 
		$people = $db->results();
		//filter people according to prefs/interests blahblah then print them
		if (empty($people))
		{
			echo '<div class="w3-container w3-card w3-white w3-round w3-margin">
			<h1> <strong> NO RESAULTS </strong> </h1>
			</div>';
		}
		else
			echo build_list($people);
	}
	else if (input::get("filter"))
	{
		$min = 18;
		$max = 100;
		$fame = 0;
		$location = "";

		if (input::get("minAge") != "")
			$min = intval(input::get("minAge"));
		if (input::get("maxAge") != "")
			$max = intval(input::get("maxAge"));
		if (input::get("fame_greater") != "")
			$fame = intval(input::get("fame_greater"));
		if (input::get("locChkBox"))
			$location = "AND JSON_CONTAINS(`profile`, '\"".$userProfile->location."\"','$.location') = 1";
		
		$db->query("DROP TABLE IF EXISTS " . $user->data()->username . "; 
		CREATE TABLE " . $user->data()->username . " AS (SELECT users.*, GROUP_CONCAT(gallery.img_name) AS 'images', 
		CAST(JSON_EXTRACT(`profile`, '$.age') AS unsigned) AS 'age',
		CAST(JSON_EXTRACT(`profile`, '$.fame') AS unsigned) AS 'fame' " . tagCount(input::get('tags')) . ",
		CAST('0' AS unsigned) AS 'distance'
		FROM `users` JOIN gallery ON gallery.user_id = users.user_id  
		WHERE `users`.`user_id` != ?
		AND (SELECT JSON_SEARCH(`blocked`, 'all', '".$user->data()->username ."')) IS NULL 
		AND " .preference(json_decode($user->data()->profile)) . interest(input::get('tags')). $location ." 
		AND CAST(JSON_EXTRACT(`profile`, '$.age') AS unsigned) BETWEEN ".$min." AND ".$max." 
		AND CAST(JSON_EXTRACT(`profile`, '$.fame') AS unsigned) >= ".$fame."
		GROUP BY users.user_id);", array('users.user_id' => $user->data()->user_id));
		
		$db->query("SELECT * FROM " . $user->data()->username); 
		$people = $db->results();
		distanceUpdate($people);
		$db->query("SELECT * FROM " . $user->data()->username); 
		$people = $db->results();
		//filter people according to prefs/interests blahblah then print them
		if (empty($people))
		{
			echo '<div class="w3-container w3-card w3-white w3-round w3-margin">
			<h1> <strong> NO RESAULTS </strong> </h1>
			</div>';
		}
		else
			echo build_list($people);
		
	}
	else if (input::get('search')) {

		$db->query("DROP TABLE IF EXISTS " . $user->data()->username . "; 
		CREATE TABLE " . $user->data()->username . " AS (SELECT users.*, GROUP_CONCAT(gallery.img_name) AS 'images', 
		CAST(JSON_EXTRACT(`profile`, '$.age') AS unsigned) AS 'age',
		CAST(JSON_EXTRACT(`profile`, '$.fame') AS unsigned) AS 'fame' " . tagCount(input::get('tags')) . ",
		CAST('0' AS unsigned) AS 'distance'
		FROM `users` JOIN gallery ON gallery.user_id = users.user_id  
		WHERE `users`.`user_id` != ?
		AND (SELECT JSON_SEARCH(`blocked`, 'all', '".$user->data()->username ."')) IS NULL 
		AND " .preference(json_decode($user->data()->profile)) ." AND `username` LIKE ? GROUP BY users.user_id);",
		array('user_id' => $user->data()->user_id, 'username' => "%" . input::get('search') . "%"));

		$db->query("SELECT * FROM " . $user->data()->username); 
		$people = $db->results();
		distanceUpdate($people);
		$db->query("SELECT * FROM " . $user->data()->username); 
		$people = $db->results();
		if (empty($people))
		{
			echo '<div class="w3-container w3-card w3-white w3-round w3-margin">
			<h1> <strong> NO RESAULTS </strong> </h1>
			</div>';
		}
		else
			echo build_list($people);
	}
	elseif (input::get('sort')) {
		$age = input::get('sortAge') == "ascending" ? "ASC" : "DESC";
		$distance = input::get('sortLoc') == "ascending" ? "ASC" : "DESC";
		$fame = input::get('sortFame') == "ascending" ? "ASC" : "DESC";
		$tagCount = input::get('sortInter') == "ascending" ? "ASC" : "DESC";
		$order = " ORDER BY `age` " . $age .", `distance` " . $distance . ", `fame` " . $fame . ", `tagCount` " . $tagCount ;
		// echo $order;
		$db->query("SELECT * FROM " . $user->data()->username . $order); 
		$people = $db->results();
		if (empty($people))
		{
			echo '<div class="w3-container w3-card w3-white w3-round w3-margin">
			<h1> <strong> NO RESAULTS </strong> </h1>
			</div>';
		}
		else
			echo build_list($people);
		// var_dump($_REQUEST);
	}
	
}
	

function preference($profile)
{
	$gender = '';
	if ($profile->preference == "Female")
	{
		$gender = "JSON_EXTRACT(`profile`, '$.gender') = 'Female' AND 
					(JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR 
					JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
	}
	elseif ($profile->preference == "Male") 
	{	
		$gender = "JSON_EXTRACT(`profile`, '$.gender') = 'Male' AND 
					(JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR 
					JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
	}
	else
	{
		$gender = "(JSON_EXTRACT(`profile`, '$.gender') = 'Female' OR 
					JSON_EXTRACT(`profile`, '$.gender') = 'Male')";
		if ($profile->gender == "Male") {
			$gender .= " AND (JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR 
							JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
		} else {
			$gender .= " AND (JSON_EXTRACT(`profile`, '$.preference') = 'Female' OR 
							JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')";
		}	
	}	
	return $gender;
}
function interest($tags) {
	$interest = '';
	if (empty($tags))
		return $interest;
 	foreach ($tags as $key => $value) {
		$interest .= "JSON_CONTAINS(`profile`, '{\"".$value."\":\"".$value."\"}' ,'$.interest') = 1 OR ";
	}
	$interest = trim($interest);
	if ($interest == '')
		return $interest;
	else
		return "AND (". substr($interest, 0 , strlen($interest) - 3) .")";
}

function tagCount($tags)
{
	$interest = '';
	if (empty($tags))
		return ", 0 AS tagCount";;
 	foreach ($tags as $key => $value) {
		$interest .= "JSON_CONTAINS(`profile`, '{\"".$value."\":\"".$value."\"}' ,'$.interest') +";
	}
	$interest = trim($interest);
	if ($interest == '')
		return ", 0 AS tagCount";
	else
		return ", ". substr($interest, 0 , strlen($interest) - 2) ." AS tagCount";
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);
  
	if ($unit == "K") {
		return ($miles * 1.609344);
	} else if ($unit == "N") {
		return ($miles * 0.8684);
	} else {
		return $miles;
	}
  }

  function distanceUpdate($people)
{
	global $userProfile;
	global $db;
	global $user;
	foreach ($people as $person => $details) {
		$info = json_decode($details->profile);
		$db->update($user->data()->username, $details->user_id, array('distance' => distance(floatval($userProfile->lat),floatval($userProfile->lng),floatval($info->lat),floatval($info->lng),'K')));
	}
}
	
	
// get all users
// SELECT * FROM `users` WHERE (`user_id` != ?) AND (SELECT JSON_SEARCH(`blocked`, 'all', 'Black_Cupid')) IS NULL AND JSON_EXTRACT(`profile`, '$.gender') = 'Female' AND (JSON_EXTRACT(`profile`, '$.preference') = 'Male' OR JSON_EXTRACT(`profile`, '$.preference') = 'BI-SEXUAL')
// SELECT * FROM `users` WHERE JSON_CONTAINS(`profile`, '{"GAMING":"GAMING"}' ,"$.interest") = 1 ORDER BY JSON_LENGTH(`profile`, '$.interest') DESC	
	
// (SELECT SUM(JSON_CONTAINS(`profile`, '{"GAMING":"GAMING"}' ,"$.interest") + JSON_CONTAINS(`profile`, '{"ART":"ART"}' ,"$.interest")) AS test FROM users
	
	
	
	
	
	
	
	
	/* else if (input::get('profile'))
	{
		$user2 = new user(input::get('profile'));
		$views = json_decode($user2->data()->views);
		$pro = json_decode($user2->data()->profile);
		$pro->fame += 2;
		$user2->update(array('profile' => json_encode($pro)), $user2->data()->user_id);
		if ($views){
			if (!in_array($user->data()->username, $views)){
				$views[] = $user->data()->username;
				$user2->update(array('views' => json_encode($views)), $user2->data()->user_id);
			}
		}
		else{
			$views[] = $user->data()->username;
			$user2->update(array('views' => json_encode($views)), $user2->data()->user_id);
		}
		$db->query("SELECT users.*, gallery.img_name, likes.* FROM `users` LEFT JOIN gallery ON gallery.user_id = users.user_id Left JOIN likes ON likes.liker_id = users.user_id OR likes.likee_id = users.user_id WHERE username =  ?", array('username' => input::get('profile')));
		$data = $db->results();
		echo json_encode($data);
	}else if (input::get('likestatus')){
		if (input::get('me') == "liker"){

			$db->query("INSERT INTO `likes` (`liker_id`, `likee_id`, `chat` ) VALUES (?, ?,'{}') ON DUPLICATE KEY UPDATE `liker_stat` = NOT `liker_stat`", array('liker_id' => intval($user->data()->user_id), 'likee' => intval(input::get('them'))));
			$db->query("SELECT `likee_stat` FROM `likes` WHERE `liker_id` = ? AND `likee_id` = ?", array('liker_id' => intval($user->data()->user_id), 'likee_id' => intval( input::get('them'))));	
		}	
		else{
			$db->query("UPDATE `likes` SET `likee_stat` = NOT `likee_stat` WHERE `liker_id` = ? AND `likee_id` = ?", array('liker_id' => intval( input::get('them')), 'likee_id' => intval($user->data()->user_id)));
		    $db->query("SELECT `liker_stat` FROM `likes` WHERE `liker_id` = ? AND `likee_id` = ?", array('liker_id' => intval( input::get('them')), 'likee_id' => intval($user->data()->user_id)));
		}
		
		$test = $db->results();
		echo json_encode($test);
	}









	else if (input::get('block')) {
		$user2 = new user(input::get('block'));
		$blockee = json_decode($user2->data()->blocked);
		$blockee->blocker[] = $user->data()->username;
		// echo json_encode($blockee);
		$user2->update(array('blocked' => json_encode($blockee)), $user2->data()->user_id);
		$blocker = json_decode($user->data()->blocked);
		$blocker->blockee[] = input::get('block');
		$user->update(array('blocked' => json_encode($blocker)));
		echo 1;

	
	
	}
	 else if (input::get('blockstat')){
		$user2 = new user(input::get('blockstat'));
		$blockee = json_decode($user2->data()->blocked);
		if (in_array($user->data()->username, $blockee->blockee) || in_array($user->data()->username, $blockee->blocker)){
			echo 'unblock';
		}
		else {
			echo 'block';
		}
	}
 */
