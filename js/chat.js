/* 
 $('div').on("click", function(){
	alert("boi");
	this.off();
	stop();

   });  */
$(document).ready(function () {
	LoadChat();
	LoadUsers();
	setInterval(function () {
		LoadChat();
	}, 10000); 


/* 	$(".uname").on("click", function(){
		alert(this);
		showPart(this);
	}) */

/* 	$('#users').on("click", function(){
		//alert("boi");
		//this.off();
		stop();
	
	   });  */


	user = 0;
	

	function LoadUsers() {
		$.post('functions/messages.php?action=getUsers', function (response) {
			$('#users').html(response);
		});
	}


	function LoadChat(user) {
		$.post('functions/messages.php?action=getMessages&user='+user, function (response) {

			var scrollpos = $('#chat').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('#chat').prop('scrollHeight');
			$('#chat').html(response);
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
		$.post('functions/messages.php?action=sendMessage&message=' + message, function (response) {
			if (response == 1) {
				LoadChat();
				$('#messageFrm')[0].reset();
			}
		});
		return false;
	});
});

function showPart(theParticipant){
	user = theParticipant.getAttribute("id");
	Loadchat(user);
}