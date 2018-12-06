<?php 
session_start();
/* phpinfo(); */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
    <script src="main.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <style>

    </style>
</head>
<body>

<br>
        <div id="form">
        <form action="conuserdetails.php" method="post">
        <fieldset style="width:80%; margin: auto">
        <input type=hidden name=email value=<?php echo $_GET['email'];?>>
            Add a bio:<br>
            <input type=text name="bio" required placeholder="Bio">
            <br><br>Select your Gender: <br>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other<br>  
            <br><br>Select your preference: <br>
            <input type="radio" name="pref" value="male"> Male<br>
            <input type="radio" name="pref" value="female"> Female<br>
            <input type="radio" name="pref" value="other"> Chinese<br>
            <input type="radio" name="pref" value="male"> Bi-Sexual<br>
            <input type="radio" name="pref" value="female"> Other<br>
            <br><br>Pls upload profile picture: <br>
            <button id="Uploadbtn" class="button">Upload</button>
<input type="file" id="image" name="dp" style="display:none;">
 <br><br>Preview<br>
 <img class="uploaded_image" height='100px' width='100px' id="img1" name="uploaded_image">
            <br><br>Enter your age: <br>
            <input type="number" name="age" required>
            <br><br>Select your interests<br>
<select class="tags" name="tags[]" multiple style="width: 50%">
  <option value="Hoes">Hella Hoes</option>
  <option value="Drugs">Drugs</option>
  <option value="Mary">Mary Jane</option>
  <option value="Guap">Money</option>
</select>
<br><button id='submit' class="w3-btn w3-black">Submit</button>        
</form> 
</div>
</fieldset>
</body>
</html>

<script>
    const uploadbtn = document.getElementById('Uploadbtn');
    uploadbtn.addEventListener('click', function () {

		imageupload = document.getElementById("image");
		imageupload.click();
		imageupload.addEventListener('change', function () {
			if (imageupload.files && imageupload.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					document.getElementById('img1').setAttribute('src', e.target.result);
                    document.getElementById('img1').style.display = "inline-block";
				};
				reader.readAsDataURL(imageupload.files[0]);
			}
		});

    }, false);

    $(document).ready(function() 
    {
        $('.tags').select2({
           placeholder: "select your interests"
        });
    });

    </script>