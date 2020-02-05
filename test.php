<?php
	require_once 'core/init.php';
	
	$db = DB::getInstance();
	$girls = ['https://data.whicdn.com/images/56978021/large.jpg', 'https://pbs.twimg.com/profile_images/543749134076088320/_5IGZSJ2.jpeg',
				'https://pbs.twimg.com/profile_images/575446987408982019/9M56UceZ_400x400.jpeg','https://tragictantrum.com/wp-content/uploads/2018/09/pretty-gallery-of-general-hospital-scoops-and-spoilers-carol-banks-weber-of-general-hospital-scoops-and-spoilers-carol-banks-weber.jpg',
				'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQy8J7Goz7J1C9NWD97M8ldp8gdkQo8krZ6Sn-7EJ0AiqovMB91','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_RMkP8CDiRR_ZRlifwHKAnEzSXSs_V3_3Hd6k346529pv13xmTg',
				'https://i.imgur.com/EcF03HZ.jpg','http://www.babynameshub.com/upload/user_photos/Shelby-female-20160326-000542714.jpg',
				'https://i0.wp.com/www.teleblog.it/wp-content/uploads/2017/03/camilla-mangiapelo.jpg?resize=620%2C400&ssl=1','https://tinathemusical.com/content/uploads/2017/11/Adreinne-Warren-Approved-Image-600x600.jpeg',
				'https://assets2.hrc.org/files/images/blog/KarlaPatriciaFloresPavon-1600x900.jpg', 'https://pbs.twimg.com/media/BzeF125IAAIDZG-.jpg',
				'https://s3.amazonaws.com/giveffect-assets/system/photos/users/small/27245x72c2b2a8e71e1e8a4a7b21a2394a1efae22d9f40.jpg','https://yt3.ggpht.com/a-/AAuE7mCqNsRrh7FHP0sDd6vqzX6kh0bQ1hoYiyGCLw=s900-mo-c-c0xffffffff-rj-k-no',
				'https://pbs.twimg.com/profile_images/741922249255575552/sRldcO3g_400x400.jpg'];


	$boys = ['https://pbs.twimg.com/profile_images/905702521728937984/rzoNtLDy_400x400.jpg','https://m.media-amazon.com/images/M/MV5BYmI5YWZhM2YtOTJlYy00NjBmLTliZTItYzUzNmJlODBkMzVmXkEyXkFqcGdeQXVyNTI5NjIyMw@@._V1_UY317_CR20,0,214,317_AL_.jpg',
			'https://i.dailymail.co.uk/i/pix/2015/05/01/22/2834A4C600000578-0-image-m-64_1430515905072.jpg','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNb1J4iSJVzt__CyMUpmYEGP5S_vGf5OqztePLxbwrG9ZsiGE2OA',
			'https://s.hdnux.com/photos/72/20/65/15273324/3/920x920.jpg','https://cdn.newsapi.com.au/image/v1/575f468bd1ba0718afbac35f62f21f8e?width=650',
			'https://static1.squarespace.com/static/534346f2e4b01edccd7213e3/t/546ec5e4e4b0cb681e1d6871/1416545765510/About-Josh.jpg', 'https://www.michael-patrick-kelly.com/img/MPK_by_Andreas_H_Bitesnich_4.jpg',
			'http://wavenewspapers.com/wp-content/uploads/2017/02/Simply-Jessica-01.jpg','https://pixel.nymag.com/imgs/daily/vulture/2014/09/05/magazine/05-michael-egan.w330.h412.jpg',
			'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnM8bT-vZLLxxG-lb9c6XcqP9LJ_2Ffqd4PKR-CP-CM3Q8hHLDbA','https://i.pinimg.com/280x280_RS/a2/e8/8f/a2e88fce83ef753322443ecab3880c11.jpg'];



	$db->query('SELECT * FROM `users`  WHERE json_unquote(json_extract(`profile`, "$.gender")) = "Female"');
	$results = $db->results();
	$i = 0;
	foreach ($results as $result) {
		$person = new user($result->username);
		$info = json_decode($person->data()->profile);
		$info->dp = $girls[$i];
		$person->update(array('profile' => json_encode($info)),$person->data()->user_id);
		$db->insert('gallery', array('img_name' => $girls[$i], 'user_id' => $person->data()->user_id));
		$i++;
	}

	$db->query('SELECT * FROM `users`  WHERE json_unquote(json_extract(`profile`, "$.gender")) = "Male" AND `user_id` != 10');
	$results = $db->results();
	$i = 0;
	foreach ($results as $result) {
		$person = new user($result->username);
		$info = json_decode($person->data()->profile);
		$info->dp = $boys[$i];
		$person->update(array('profile' => json_encode($info)),$person->data()->user_id);
		$db->insert('gallery', array('img_name' => $boys[$i], 'user_id' => $person->data()->user_id));
		$i++;
	}
?>