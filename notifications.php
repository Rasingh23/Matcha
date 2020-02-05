<?php
	require_once 'core/init.php';
	$user = new user;
	$db = DB::getInstance();
	$profile = json_decode($user->data()->profile);

	if(input::exists('request'))
	{
		if (input::get('getnotes'))
		{
			if (isset($profile->notifications))
			{
				echo json_encode($profile->notifications);
				
			}else{
				echo "0";
			}
		}
		else if (input::get('addnotes'))
		{
			// echo ("NAME: ". input::get('name'));
			$user2 = new user(input::get('name'));
			$profile2 = json_decode($user2->data()->profile);
			if ($profile2->notifications){
				if (!in_array($user->data()->username. " " .input::get('addnotes'), $profile2->notifications)){
					$profile2->notifications[] = $user->data()->username. " " .input::get('addnotes');
					$user2->update(array('profile' => json_encode($profile2)), $user2->data()->user_id);

					$db->insert('notif_hist', array(
                        'usersid' => $user2->data()->user_id,
                        'notification' => $user->data()->username. " " .input::get('addnotes')
                    ));
				}
			}
			else {
				$profile2->notifications[] = $user->data()->username. " " .input::get('addnotes');
					$user2->update(array('profile' => json_encode($profile2)), $user2->data()->user_id);
			}
			echo 1;			
		}
		else if(input::get('removenotes'))
		{
			unset($profile->notifications);
			$user->update(array('profile' => json_encode($profile)));
		}
		else if(input::get('stats'))
		{
			$db->query('SELECT `notification` FROM notif_hist  WHERE `usersid`= ' . $user->data()->user_id);
			echo json_encode($db->results());
		}
	}
?>

