<?php

	function age($dob)
	{
		date_default_timezone_set('Africa/Johannesburg');
		$date = date_create($dob);
		$today = date_create(date('Y-m-d'));
		$age = date_diff($date,$today);
		return $age->format('%y');
	}

?>