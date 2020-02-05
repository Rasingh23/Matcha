<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/chat.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="js/chat.js"></script>

</head>

<body>

    <div id="wrapper">
        <center>
            <h1>Welcome to my website</h1>
        </center>
        <div class="chat_wrapper" id="chat_wrapper">
            <div id="chat"></div>
            <form method="POST" id="messageFrm">
                <textarea name="message" cols="30" rows="7" class="textarea" id="textarea" placeholder="Please Type a message to send"></textarea>
            </form>
        </div>
    </div>
</body>

</html>