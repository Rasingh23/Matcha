$('#home').click(function () {
	if (last_page() == 'profile') {
		managescript('profile.js', 'remove');
		managescript('display_profile.js', 'remove');
		managescript('UI.js', 'remove');
		managescript('UI.js', 'add');
		managescript('navbar.js', 'remove');	
	} else if (last_page() == 'home') {} else {
		managescript(last_page() + ".js", 'remove');
		managescript('home.js', 'add');
	}
	$("#sofilButton").attr("disabled", false); 
	$("#sortingBtn").attr("disabled", false);
	$("#searchBtn").attr("disabled", false);
	

});

$('#profile').click(function () {
	if (last_page() != 'profile') {
		$('#middle_content').fadeOut('slow', function () {
			$('#middle_content').load("includes/UI/loggedin.php #preference", function () {
				managescript(last_page() + ".js", 'remove');
				managescript('profile.js', 'add');
			});
		}).fadeIn('slow');
	}
	$("#sofilButton").attr("disabled", true); 
	$("#sortingBtn").attr("disabled", true);
	$("#searchBtn").attr("disabled", true);
});

$('#logout_link').click(async function () {
	response = await Ajax('logout.php', 'POST', null, false);
	// console.log("RESPONSE: "+response);
	if (response == 1) {
		// managescript(last_page() + ".js", 'remove');
		// managescript('UI.js', 'remove');
		// managescript('UI.js', 'add');
		// // managescript('navbar.js', "remove");
		location.reload();
	}
});

$('#stats').click(function(){
	managescript(last_page() + ".js", 'remove');
	managescript('stats.js', 'add');
	$("#sofilButton").attr("disabled", true); 
	$("#sortingBtn").attr("disabled", true);
	$("#searchBtn").attr("disabled", true);
})

$('#Notifications_icon').hover(async function () {
	notes = await Ajax('notifications.php', 'POST', 'getnotes=getnotes', false);
	if (notes && notes != "0") {
		notes = JSON.parse(notes);
		$("#Notifications p").remove();
		var result = Object.keys(notes).map(function (key) {
			return [notes[key]];
		});
		for (i = 0; i < result.length; i++) {
			$('#Notifications').append('<p class="w3-bar-item w3-button">' + result[i] + '</p>');
		}
	}
});

$('#NotificationsBtn').click(function () {
	Ajax('notifications.php', 'POST', 'removenotes=removenotes', true);
	$("#Notifications p").remove();
})

setInterval(function () {
	// console.log("GODDAMNT");
	checknotes();
}, 1000);