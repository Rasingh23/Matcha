// import { LoadChat } from "chat.js";
$(document).ready(function () {
	
friend_id = null; 

details =  Ajax('profile.php', 'POST', 'action=display_info', false);
	details.then(function(data){
		// console.log("IN FUNCTION : "+ data)
		details = data;
		details = JSON.parse(details);
		profile = JSON.parse(details['profile']);
		$("#propic").attr('src', profile.dp);
		$('#display_username').append(details.username);
		$('#display_name').append(details.first_name + ' ' + details.last_name);
		$('#display_gender').append(profile.gender);
		$('#display_dob').append(profile.DOB);
		$('#display_loca').append(profile.location);
		$('#bio_text').html(profile.bio);
	})

	images =  Ajax('profile.php', 'POST', 'images=images', false)
	images.then(function(data){
		images = data;
		images = JSON.parse(images);
	
	// console.log(" FUNCTION CALL : "+ details)
	for (var i = 0; i < images.length; i++)
		$('#display_images').append('<div class="w3-half"><img src="' + images[i]['img_name'] + '" style="max-width:100%" class="w3-margin-bottom"></div>');
	for (const key in profile.interest) {
		if (profile.interest.hasOwnProperty(key)) {
			const element = profile.interest[key];
			$('#display_interest').append('<span class="w3-tag w3-small w3-theme-l1 w3-margin-right-16">' + element + '</span>  ');
		}
	}
	})
	LoadFriends();
	
}

);
function LoadFriends() {
	friends = Ajax('profile.php', 'POST', 'friends=friends', false)
	friends.then(function(data){
	
		friends = data;
		friends = JSON.parse(friends);
		// console.log("FRIENDS: <"+friends+">");
		$('#display_friends').html('');
		for (var i = 0; i < friends.length; i++)
			$('#display_friends').append('<div class="w3-quarter"><a style="text-decoration: none" href="#chat"><p style="max-width:100%" class="w3-margin-bottom" onclick="startchat(' + friends[i]['user_id'] + ')"><strong>' + friends[i]['username'] + '</strong></p></a></div>');
	});
}

function startchat(user_id) {
	$('#middle_content').fadeOut('slow', function () {
		$('#middle_content').load("includes/UI/loggedin.php #chatRoom", function () {
			friend_id = user_id;
			managescript(last_page() + ".js", 'remove');
			managescript('chat.js', 'add');
		});
	}).fadeIn('slow');
	$("#sofilButton").attr("disabled", true);
	$("#sortingBtn").attr("disabled", true);
}
