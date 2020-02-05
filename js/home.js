$(document).ready(async function () {
	$('#middle_content').fadeOut('slow', async function () {
		$('#middle_content').html(await profiles());
	}).fadeIn('slow');

});


async function profiles() {
	people = await Ajax('home.php', 'POST', 'all=all', false)
	// console.log("PEOPLE: "+ people);
	return people
}

//// this is Filtering!!!!!!!
$("#sofilButton").click(function (event) {
	event.preventDefault();
	var theForm = $("#sofil_form").serializeArray();
    theForm.push({name: 'filter', value: 1});

	$('#middle_content').fadeOut('slow', async function () {
		$('#middle_content').html(await Ajax('home.php', 'POST', theForm, false)
		);
	}).fadeIn('slow');
	
})

//// this is sorting!!!!!
$("#sortingBtn").click(function (event) {

	event.preventDefault();
	var theForm = $("#sorting").serializeArray();
    theForm.push({name: 'sort', value: 1});

	$('#middle_content').fadeOut('slow', async function () {
		$('#middle_content').html(await Ajax('home.php', 'POST', theForm, false)
		);
	}).fadeIn('slow');
	
})


async function build_profile(profile) {
	name = profile.innerHTML;
	managescript('view_profile.js', 'remove')
	managescript('view_profile.js', 'add')
}






