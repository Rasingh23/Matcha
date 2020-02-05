$(document).ready(function () {
	my_name = details.username
	user = friend_id;

	LoadChat(user);
	setInterval(function () {
		LoadChat(user);
	}, 1000); 
	 function LoadChat(user_id) {
		// var user = user_id
		$.post('message.php?action=getMessages&user=' + user_id, function (response) {
			
			var scrollpos = $('#chat').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('#chat').prop('scrollHeight');
			// alert(response);
			//  console.log(JSON.parse(response)[0][]);

			// console.log(user + " users id");
			$('#chat').html(JSON.parse(response)[0]["chat"]);
			if (scrollpos < scrollHeight) {

			} else {
				$('#chat').scrollTop($('#chat').prop('scrollHeight'));
			}
		});
	} 

	$('#textarea').keyup(function (e) {
		if (e.which == 13) {
			$('form').submit();
		}
	});

	$('form').submit(function () {
	
		var message = $('#textarea').val();
		Ajax('notifications.php', 'POST', 'addnotes=sent you a message&name=' + user, true);

		// var fullChat = "<p>"+$('#chat').html()+"</p>";
		var fullChat = $('#chat').html()+ "<div class='w3-container w3-card w3-white w3-round w3-margin-bottom w3-margin-top' ><h5>"+my_name+"</h5><p>"+message+"</p></div>";

		// console.log(fullChat);
		// console.log(JSON.stringify( fullChat));
		//console.log(message);
		$.post('message.php?action=sendMessage&message=' + JSON.stringify( fullChat) +'&person=' + user , function (response) {
			// alert(response);
			if (response == 1) {
				LoadChat(user);
				$('#messageFrm')[0].reset();
			}
		});
		return false;
	});

});