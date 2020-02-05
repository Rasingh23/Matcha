$(document).ready(async function () {
	


	if ((check = await Ajax('user_status.php', 'POST', 'action=login', false)) != 1) {
		$('body').fadeOut('slow', function () {
			$('#nav').load("includes/UI/loggedout.php #nav_bar", function () {
				$('#login_link').click(function () {
					if (!document.getElementById('login'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #login", function () {
								managescript('login.js', 'add');
								managescript(last_page() + ".js", 'remove');
							}).fadeIn('slow');
						});
				})

				$('#register_link').click(function () {
					if (!document.getElementById('register'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #register", function () {
								managescript(last_page() + ".js", 'remove');
								managescript('register.js', 'add');
							}).fadeIn('slow');
						});
				})

				$('#login_link2').click(function () {
					if (!document.getElementById('login'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #login", function () {
								managescript('login.js', 'add');
								managescript(last_page() + ".js", 'remove');
							}).fadeIn('slow');
						});
				})

				$('#register_link2').click(function () {

					if (!document.getElementById('register'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #register", function () {
								managescript(last_page() + ".js", 'remove');
								managescript('register.js', 'add');
							}).fadeIn('slow');
						});
				})
			});
			$('#foot').load("includes/UI/loggedout.php #footer");

			$('#content').load("includes/UI/loggedout.php #register", function (e) {
				window.location.href = "#register"
				managescript('register.js', 'add');
			});
		}).fadeIn('slow');
	} else {
		Ajax('user_status.php', 'POST', 'action=online', true)

		$('body').fadeOut('slow', function () {
			$('#nav').load("includes/UI/loggedin.php #nav_bar", function () {
				managescript('navbar.js', 'add');

			});
			$('#foot').load("includes/UI/loggedout.php #footer");
			$('#content').load("includes/UI/loggedin.php #main_content", function () {
				managescript('display_profile.js', 'add');
				if (Ajax('user_status.php', 'POST', "action=p.p", false) == 0) {
					$('#middle_column').load("includes/UI/loggedin.php #preference", function () {
						$('#error_spot').html('<p>Please upload an image before you can continue</p>');
						window.location.href = "#profile";
						managescript('profile.js', 'add')
					})
				} else {
					managescript('home.js', 'add');
					window.location.href = "#home";
				}
				$('#search').keyup(function (e) {
					if (e.which == 13) {
						search();
					}
				});
				$('.tags').select2({
					placeholder: "select your interests"
				});
			});

		}).fadeIn('slow');
	}

	setInterval(function () {
		$.post("user_status.php?action=login",
			function (data) {
				if (data != 1 && (last_page() != 'login' && last_page() != 'register' && last_page() != 'forgotpassword')) {
					location.reload();
				}
			}
		);
	}, 3000);
});


async function checknotes() {
	notes = await Ajax('notifications.php', 'POST', 'getnotes=getnotes', false);
	//  console.log("NOTES: " + notes);
	notes = JSON.parse(notes);
	if (notes && notes != "0") {
		var result = Object.keys(notes).map(function (key) {
			return [Number(key), notes[key]];
		});
		$('#notes_count').text(result.length);
	} else
		$('#notes_count').html('0');
}


async function promise(sendto, method, value) {
	PromiseResponse = null;
	testResponse = await new Promise(function (resolve) {

		request = "";
		request =  $.ajax({
			url: sendto,
			type: method,
			data: value,
			async: true,
			success: function (data) {
				PromiseResponse = data;
				resolve(data);
				return "1";
			},
			error: function () {
				alert('Error occured');
			}
		})
		return request;	
	});
	return await PromiseResponse;
}


async function Ajax(sendto, method, value, AsyncOrSync) {
	request = "";
	if (AsyncOrSync == false) {
		request = await promise(sendto, method, value);
		// console.log("REQUEST: "+ request);
		return request;
	}
	else {

		request = $.ajax({
			url: sendto,
			type: method,
			data: value,
			async: true,
		})
	}
	return request.responseText;
}


function managescript(script, task) {
	if (task == 'remove')
		$("script[src='js/" + script + "']").remove();
	if (task == 'add')
		$.getScript("js/" + script);
}

function myFunction(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-theme-d1";
	} else {
		x.className = x.className.replace("w3-show", "");
		x.previousElementSibling.className =
			x.previousElementSibling.className.replace(" w3-theme-d1", "");
	}
}

function openNav() {
	var x = document.getElementById("navDemo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else {
		x.className = x.className.replace(" w3-show", "");
	}
}


function last_page() {
	place = window.location.href;
	place = place.split('#');
	return place[1];
}

function Age(dob) {
	var year = Number(dob.substr(0, 4));
	var month = Number(dob.substr(5, 2)) - 1;
	var day = Number(dob.substr(8, 2));
	var today = new Date();
	var age = today.getFullYear() - year;
	if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
		age--;
	}
	return age;
}

function search() {
	var name  = $("#search").val();
	$('#middle_content').fadeOut('slow', async function () {
		if (name.trim().length == 0)
			var person = await Ajax('home.php', 'POST', 'all=all', false)
		else
			var person = await Ajax('home.php', 'POST', 'search=' + name.trim(), false)
		$('#middle_content').html(person);
	}).fadeIn('slow');
}
