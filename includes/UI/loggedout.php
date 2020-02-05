<!--///////////////////////////////////////////// NAV BAR /////////////////////////////////////////////-->

<div id="nav_bar">
	<div class="w3-top">
		<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
			 href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
			<a class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Matcher</a>
			<a href="#login" id='login_link' class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-pencil w3-margin-right"></i>Login</a>
			<a href="#register" id='register_link' class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i
				 class="fa fa-pencil w3-margin-right"></i>Register</a>	
		</div>
	</div>

	<!-- Navbar on small screens -->
	<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
		<a  class="w3-bar-item w3-button w3-padding-large">Link 1</a>
		<a href="#login" id='login_link2' class="w3-bar-item w3-button w3-padding-large fa fa-pencil w3-margin-right">Login</a>
		<a href="#register" id='register_link2' class="w3-bar-item w3-button w3-padding-large fa fa-pencil w3-margin-right">Register</a>
	</div>
</div>

<!--///////////////////////////////////////////// FOOTER /////////////////////////////////////////////-->

<footer id="footer" class="w3-container w3-theme-d3 w3-padding-16 w3-bottom">
	<h5>&copymbond</h5>
</footer>
<!--//////////////////////////////////////////// REGISTER FORM /////////////////////////////////////////////-->

<div id="register" class="w3-container w3-content" style="max-width:60%	;margin-top:80px; margin-bottom: 80px">
	<form class="w3-container w3-card-4 w3-light-grey w3-text-black">
		<h2 class="w3-center">REGISTER</h2>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="username" type="text" placeholder="Username" required>
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="first_name" type="text" placeholder="First Name" required>
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="last_name" type="text" placeholder="Last Name" required>
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="email" type="text" placeholder="example@host.com" required>
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="passwd" type="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
					title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="passwd_again" type="password" placeholder="Password again"
					required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
			</div>
		</div>


		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>
			<div class="w3-rest">
			<input class="w3-input w3-border" type='date' name='age' id="age" max="2002-01-01" min="1940-01-01"  required>
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-male"></i></div>
			<div class="w3-rest">
				<input id="male" class="w3-radio" type="radio" name="gender" value="Male"> MALE
			</div>
		</div>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-female"></i></div>
			<div class="w3-rest">
				<input id="female" class="w3-radio" type="radio" name="gender" value="Female" checked> FEMALE
			</div>
		</div>
		<p class="w3-center">
			<button id="RegButton" class="w3-button w3-section w3-black w3-ripple"> REGISTER </button>

		</p>
	</form>
</div>

<!--//////////////////////////////////////////// LOGIN FORM /////////////////////////////////////////////-->

<div id="login" class="w3-container w3-content w3-light-grey" style="max-width:60%;margin-top:80px; margin-bottom: 80px">
	<form class="w3-container w3-card-4  w3-text-black w3-margin-bottom">
		<h2 class="w3-center">LOGIN</h2>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="username" type="text" placeholder="Username" required>
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="passwd" type="password" placeholder="password" required>
			</div>
		</div>

		<p class="w3-center">
			<button id="LoginButton" class="w3-button  w3-black w3-ripple"> LOGIN </button>
		</p>
		<p class="w3-center">
			<button id="ForgotButton" class="w3-button w3-black w3-ripple"> Forgot password </button>
		</p>
	</form>
</div>

<!--//////////////////////////////////////////// FORGOT PASSWORD FORM /////////////////////////////////////////////-->

<div id="forgot_password" class="w3-container w3-content" style="max-width:60%;margin-top:80px; margin-bottom: 80px">
	<form class="w3-container w3-card-4  w3-light-grey w3-text-black w3-margin">
		<h2 class="w3-center">FORGOT PASSWORD</h2>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" name="email" type="email" placeholder="example@host.com" required>
			</div>
		</div>

		<p class="w3-center">
			<button id="SendButton" class="w3-button w3-section w3-black w3-ripple"> Send </button>
		</p>
	</form>
</div>