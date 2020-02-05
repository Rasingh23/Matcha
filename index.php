<?php
require_once 'core/init.php'
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Matcha</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/select2.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/datepicker.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/checkbox.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/UI.js"></script>
	<style>
		.error {
			position: fixed;
			padding: 7px;
			bottom: 80px;
			right: 15px;
			z-index: 999;
		}

		html,
		body,
		h1,
		h2,
		h3,
		h4,
		h5 {
			font-family: "Open Sans", sans-serif
		}
	</style>
</head>

<body class="w3-theme-l5">

	<!-- Navbar -->
	<div id="nav">
	</div>

	<!-- Main content -->
	<div id='content'>
	</div>

	<br>

	<!-- Footer -->
	<div id='foot'></div>
</body>
<script>
// function managescript(script, task) {
// 	if (task == 'remove')
// 		$("script[src='js/" + script + "']").remove();
// 	if (task == 'add')
// 		$.getScript("js/" + script);
// }

// managescript('UI.js', 'add')
// managescript('chat.js', 'add')

</script>
</html>
