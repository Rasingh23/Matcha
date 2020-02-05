
window.location.href = "#forgorpassword";

$('form').submit(async function (event) {
    event.preventDefault();
    value = $('form').serialize();
    check = await forgotpassword(value)
    if (check == 1) {
        $('#content').fadeOut('slow', function(){
			$('#content').load("includes/UI/loggedout.php #login",function()
			{
				$('h2').after('<div class="w3-panel w3-green w3-center"><h3>Password Reset Success!</h3><p>Please check your email to activate account </p></div>');
				managescript('login.js', 'add');
				managescript('forgotpassword.js', 'remove');
			}).fadeIn('slow');
		});
    }
    else {
        if (document.getElementById('error'))
            $('#error').html(check);
        else
        {
            $('h2').after('<div class="w3-panel w3-red w3-center"><h3>ERROR!</h3><p id="error"></p></div>');
            $('#error').html(check);
        }
    }
    return false;
});


async function forgotpassword(value)
{
    request = await Ajax('forgot.php', 'POST',value, false);
	return request;
}
