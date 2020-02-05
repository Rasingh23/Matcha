$('#middle_content').fadeOut('slow', function () {
	$('#middle_content').load("includes/UI/loggedin.php #person_profile", async function () {
		await Ajax('notifications.php', 'POST', 'addnotes=viewed your page&name=' + name, false);
		person = await Ajax('view_profile.php', 'POST', 'profile=' + name, false);
		person = JSON.parse(person)
		console.log(person);
		data = person[0].profile;
		data = JSON.parse(data);
		// var status = $('#likeBtn').html();
		// status = status.substring(status.lastIndexOf(' ') + 1, status.length);
		alert(person[0].user_id + " "+ person[0].liker_id);
		me = person[0].liker_id == person[0].user_id ? 'likee' : 'liker';
		response = await Ajax('view_profile.php', 'POST', 'likecheck=likecheck&me=' + me + '&them=' + person[0].user_id, false)
		if (response.trim() == 0) {
			$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
		}
		else {
			response = JSON.parse(response);
			//console.log(response);
			if ((response[0].liker_stat == 1 && me == "liker" ) || (response[0].likee_stat == 1 && me == "likee" )) {
				$('#likeBtn').html("<i class='fa fa-thumbs-down'></i> UnLike");
			}
			else if ((response[0].liker_stat == 1 && response[0].liker_id == person[0].user_id && response[0].likee_stat == 0)
				|| (response[0].likee_stat == 1 && response[0].likee_id == person[0].user_id && response[0].liker_stat == 0)) {
				$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like Back");
			}
			else {
				$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
			}

		}
		// alert()
		$("#persons_dp").attr('src', data.dp);
		$('#last_seen').html(data.last_login);
		$('#persons_username').html(person[0].username);
		$('#persons_names').html(person[0].first_name + " " + person[0].last_name);
		$('#persons_location').html(data.location);
		$('#persons_age').html('Age: ' + Age(data.DOB));
		$('#persons_fame').html('Fame: ' + data.fame + " pts");
		$('#persons_bio').html(data.bio);
		for (const key in data.interest) {
			if (data.interest.hasOwnProperty(key)) {
				const element = data.interest[key];
				$('#persons_interests').append('<span class="w3-tag w3-medium w3-theme-l1" style="margin-top: 5px; margin-right: 5px">' + element + '</span>');
			}
		}
		for (let i = 0; i < person.length; i++) {
			const element = person[i].img_name;
			$('#persons_pics').append('<div class="w3-half"><img src="' + element + '" style="width:100%" alt="' + element + '" class="w3-margin-bottom"></div>');
		}

		$('#likeBtn').click(async function (e) {
			e.preventDefault();
			var status = $('#likeBtn').html();
			status = status.substring(status.lastIndexOf(' ') + 1, status.length);
			if (status == "Like"){
				Ajax('notifications.php', 'POST', 'addnotes=liked your profile&name=' + name.innerHTML, true);	
			}
			if (status == "Like Back"){
				Ajax('notifications.php', 'POST', 'addnotes=liked back your profile&name=' + name.innerHTML, true);
			}
			else{
				Ajax('notifications.php', 'POST', 'addnotes=unliked your profile&name=' + name.innerHTML, true);
			}
			var response = await Ajax('view_profile.php', 'POST', 'likestatus=' + status + '&me=' + me + '&them=' + person[0].user_id, false)
			// console.log(response);
			response = JSON.parse(response);
			// alert()
			LoadFriends();
			if (status == "UnLike") {
				if (response[0]) {
					
					if (Object.keys(response[0]) == 'likee_stat') {
						if (response[0].likee_stat == 1) {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like Back");
						}
						else {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
						}
					}
					else {
						if (response[0].liker_stat == 1) {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like Back");
						}
						else {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
						}
					}
				}
			}
			else {
				$('#likeBtn').html("<i class='fa fa-thumbs-down'></i> UnLike");
			}
		});
	});
}).fadeIn('slow');



function block() {
	person = $('#persons_username').html();
	blockstatus = $('#blockBtn').attr('data-blkstat');
	check = Ajax('view_profile.php', 'POST', 'block=' + person, true);
	location.reload();
	profiles();
}

function report(params) {
	Ajax('view_profile.php', 'POST', "report=" + params, true);
}