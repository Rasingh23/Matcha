$('#middle_content').fadeOut('slow', async function () {
	$('#middle_content').load("includes/UI/loggedin.php #notify_hist", async function () {
		person = await Ajax('notifications.php', 'POST', 'stats=getstats', false);
		console.log("stat before parse " + person)
		person = JSON.parse(person)
		console.log(person);
		statsElem = "";
		person.forEach(element => {
			statsElem += "<div class='w3-container w3-card w3-white w3-round w3-margin-bottom w3-margin-top'><p>" + element.notification + "</p></div>";
		});
		$('#notify').html(statsElem);
	})
}).fadeIn('slow');