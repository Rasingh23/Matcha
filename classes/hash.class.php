<?php

	require_once "core/init.php";

	class hash
	{
		public static function make($string)
		{
			return hash('whirlpool', $string);
		}

		public static function unique()
		{
			return self::make(uniqid());
		}
	}

?>
