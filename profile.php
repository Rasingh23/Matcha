<?php
require_once 'core/init.php';
$user = new user;
$db = DB::getInstance();
$profile = json_decode($user->data()->profile);

if (Input::exists('request')) {
	///////SEND USER INFO FOR DISPLAY////////////
	if (input::get('action') === 'display_info') {
		echo json_encode($user->data());
	}
	///////SEND USER IMAGES FOR DISPLAY////////////
	else if (input::get('images')) {
		echo json_encode($db->get('gallery', array('user_id', '=', $user->data()->user_id))->results());
	}
	else if (input::get("friends"))
	{
		echo json_encode($db->query("SELECT `username`, `user_id` FROM `users` JOIN `likes` ON `liker_id` = `user_id` OR `likee_id` = `user_id` WHERE (`likee_id` = ? OR `liker_id` = ?) AND (`user_id` != ? AND `liker_stat` = 1 AND `likee_stat` = 1)", array('likee_id' => intval( $user->data()->user_id), 'liker_id' => intval($user->data()->user_id), 'user_id' => intval($user->data()->user_id)))->results());
	} 
	///////UPDATE BIO////////////
	else if (input::get('bio')) {
		$profile->bio = escape(trim(input::get('bio')));
		$user->update(array('profile' => json_encode($profile)));
		echo 1;
	}
	///////UPDATE BIRTHDAY////////////
	else if (input::get('age')) {
		$profile->DOB = input::get('age');
		$profile->age = age(input::get('age'));
		$user->update(array('profile' => json_encode($profile)));
		echo 1;
	}
	///////UPDATE INTEREST////////////
	else if (input::get('tags')) {
		$interest = array();
		$tags = input::get('tags');
		foreach ($tags as $key => $value) {
			$interest[$value] = $value;
		}
		$profile->interest = $interest;
		$user->update(array('profile' => json_encode($profile)));
	}
	///////UPDATE PREFERENCE////////////
	else if (input::get('pref')) {
		$profile->preference = input::get('pref');
		$user->update(array('profile' => json_encode($profile)));
	}
	///////UPDATE PROFILE PICTURE////////////
	else if (input::get('new_propic')) {
		$profile->dp = input::get('new_propic');
		$user->update(array('profile' => json_encode($profile)));
	}
	///////DELETE PICTURE////////////
	else if (input::get('delete_pic')) {
		$db->delete('gallery', array("img_name", '=', input::get('delete_pic')));
		if(isset($profile->dp))
			if ($profile->dp == input::get('delete_pic')) {
				unset($profile->dp);
				$user->update(array('profile' => json_encode($profile)));
			}
		unlink(input::get('delete_pic'));
		echo 1;
	}
	///////UPDATE USERNAME////////////
	else if (input::get('username')) {
		usernameupdate2();
	} 
	///////UPDATE FIRST NAME////////////
	else if (input::get('first_name'))
	{
		$user->update(array('first_name' => escape(trim(input::get('first_name')))));
		echo 1;
	}
	///////UPDATE LAST NAME////////////
	else if (input::get('last_name'))
	{
		$user->update(array('last_name' => escape(trim(input::get('last_name')))));
		echo 1;
	}
	///////UPDATE EMAIL////////////    
	else if (input::get('email')) {
		emailupdate2();
	} 
	///////UPDATE PASSWORD////////////    
	else if (input::get('passwd_new') && input::get('passwd_current') && input::get('passwd_new_again')) {
		passwordupdate2();
	} 
	///////UPDATE NOTIFICATION////////////    
	else if (input::get('notify')) {
		notify();
	} 
	
	else if (input::get('mypostname')) {
		checknotify();
	}

	///////UPDATE LOCATION////////////  
	else if (input::get('lat')) {
		$profile->lat = escape(trim(input::get('lat')));
		$profile->lng = escape(trim(input::get('lng')));
		$profile->location = escape(trim(input::get('location')));
		$user->update(array('profile' => json_encode($profile)));
		echo 1;
	}

}

////////////////////////////////////UPLOAD OF IMAGE///////////////////////////
else if ($_FILES['image']) {
	$target_dir = "images/gallery/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo 0;
			$uploadOk = 0;
		}
	}
	if (file_exists($target_file)) {
		echo 0;
		$uploadOk = 0;
	}
	if ($_FILES["image"]["size"] > 500000) {
		echo 0;
		$uploadOk = 0;
	}
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif") {
		echo 0;
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo 0;
	} else {
		if (($count = $db->get('gallery', array('user_id', '=', $user->data()->user_id))->count()) < 5) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $user->data()->username . '_' . basename($_FILES["image"]["name"]) . '_' . $count . '.jpeg')) {
				if (!isset($profile->dp)) {
					$profile->dp = $target_dir . $user->data()->username . '_' . basename($_FILES["image"]["name"]) . '_' . $count . '.jpeg';
					$user->update(array('profile' => json_encode($profile)));
				}
				$db->insert('gallery', array('img_name' => $target_dir . $user->data()->username . '_' . basename($_FILES["image"]["name"]) . '_' . $count . '.jpeg', 'user_id' => $user->data()->user_id));
				echo 1;
			} else {
				echo 0;
			}
		} else {
			echo 2;
		}

	}
}



function checknotify()
{
	global $user;
	echo $user->data()->notify;
}

function notify()
{
	
	global $user;
	echo (input::get('notify'));
	$user->update(array(
		'notify' => input::get('notify'),
	));
	echo "Update successful";
}

function passwordupdate2()
{

	if (input::exists()) {

		global $user;

		$validate = new validate();
		$validation = $validate->check($_POST, array(
			'passwd_current' => array(
				'required' => true,
				'min' => 6,
			),
			'passwd_new' => array(
				'required' => true,
				'min' => 6,
			),
			'passwd_new_again' => array(
				'required' => true,
				'min' => 6,
				'matches' => 'passwd_new',
			),
		));

		if ($validation->passed()) {
			if (hash::make(escape(input::get('passwd_current'))) !== $user->data()->passwd) {
				echo "Your current password was incorrect :(";
			} else {
				$user->update(array(
					'passwd' => hash::make(escape(input::get('passwd_new'))),
				));
				echo "Successful update";
			}
		} else {
			foreach ($validation->errors() as $error) {
				echo $error, "<br>";
			}
		}

	}
}

function usernameupdate2()
{
	global $user;
	if (input::exists()) {

		$validate = new validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'min' => 2,
				'max' => 20,
				'unique' => 'users',
			),
		));
		if ($validation->passed()) {
			try {
				$user->update(array(
					'username' => escape(trim(input::get('username'))),
				));
				echo "Username update successfully";
			} catch (Exception $e) {
				die($e->getMessage());
			}
		} else {
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}

	}
}

function emailupdate2()
{
	global $user;
	if (input::exists()) {

		$validate = new validate();
		$validation = $validate->check($_POST, array(
			'email' => array(
				'required' => true,
				'unique' => 'users',
			),
			'email_again' => array(
				'required' => true,
				'matches' => 'email',
			),
		));

		if ($validation->passed()) {

			$user->update(array(
				'email' => escape(trim(input::get('email'))),
			));
			echo "Email update successfully";

		} else {
			foreach ($validation->errors() as $error) {
				echo $error, "<br>";
			}
		}

	}
}


function locationUpdate()
{
	global $user;
	if (input::exists()) {



		try {
			$user->update(array(
				'lat' => escape(trim(input::get('lat'))),
				'lng' => escape(trim(input::get('lng'))),
			));
			echo "location update successfully";
		} catch (Exception $e) {
			die($e->getMessage());
		}

		

	}
}
