
$('#ForgotButton').click(function (e) {
	e.preventDefault()
	$('#content').fadeOut('slow', function () {
		$('#content').load("includes/UI/loggedout.php #forgot_password").fadeIn('slow');
	});
	managescript('forgotpassword.js', 'add');
	managescript('login.js', 'remove');
})

$('form').submit(async function (event) {
	event.preventDefault();
	value = $('form').serialize();
	check = await login(value)
	if (check == 1) {
			managescript('UI.js', 'remove');
			managescript('UI.js', 'add');
			managescript('login.js', 'remove');
	}
	else {
		// console.log("CHECK: " +check);
		if (document.getElementById('error'))
			$('#error').html(check);
		else {
			$('h2').after('<div class="w3-panel w3-red w3-center"><h3>ERROR!</h3><p id="error"></p></div>');
			$('#error').html(check);
		}
	}

	return false;
});

async function login(value) {
	request = await Ajax('login.php', 'POST', value, false);
	return request;

}

