

$(document).ready(function () {
	/* LoadChat(); */
	LoadUsers();
	if (user == 0)
	{
		$("#textarea").hide();
	}
	/* setInterval(function () {
		LoadChat();
	}, 10000);  */
	$('#textarea').keyup(function (e) {
		if (e.which == 13) {
			$('#messageFrm').submit();
		}
	});

	$('#messageFrm').submit(function () {
		var chat = escape($('#chat').html());
		var message = $('#textarea').val();
		$.post('functions/messages.php?action=sendMessage&message=' + message +'&chat='+chat +'&user='+user , function (response) {
			console.log(response);
			 if (response == 1) { 
				document.getElementById('messageFrm').reset();
				LoadChat(user);
			}
		});
		return false;
	});

});


	user = 0;
	

	function LoadUsers() {
		$.post('functions/messages.php?action=getUsers', function (response) {
			$('#users').html(response);
		});
	}


	function LoadChat(user) {
		$.post('functions/messages.php?action=getMessages&user='+user, function (response) {
			themessages = JSON.parse(response);
			themessages = JSON.parse(themessages["chat"]);
			//console.log(JSON.parse(themessages["chat"]));
			//console.log(themessages["chat"]);
			const length = Object.getOwnPropertyNames(themessages);
			$('#chat').html('');
			for(var t = 0; t < length.length - 1; t++){
				$('#chat').append(themessages[t] + '<br>');
			}
			var scrollpos = $('#chat').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('#chat').prop('scrollHeight');
		//	console.log(JSON.parse(response));
			//$('#chat').html(response);
			if (scrollpos > scrollHeight) {
				$('#chat').scrollTop($('#chat').prop('scrollHeight'));
			}
		});
	}

	


	function showPart(theParticipant){
		user = theParticipant.getAttribute("data-pid");
		LoadChat(user);
		$("#textarea").show();

	}

