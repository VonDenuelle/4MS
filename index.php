<?php
session_start();

//checks if already logged in
if (isset($_SESSION['userid'])) {
      header("Location: /Temp/items");
}

//checks if admin is  logged in
if (isset($_SESSION['adminid'])) {
    header("Location: /Temp/admin");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name=”title” content="Geo Tag Generator" />
    <meta name="description" content="This is meta description Sample. We can add up to 158.">

    <meta name="geo.region" content="PH-ZMB" />
    <meta name="geo.placename" content="Olongapo" />
    <meta name="geo.position" content="14.831468;120.283521" />
    <meta name="ICBM" content="14.831468, 120.283521" />

    <meta name=”keywords” content=”tag, generator, geo, web, tags, meta, site, create, html, editor, geocoding,
        geotagging” />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>4MS Flower Shop</title>
    <link rel="stylesheet" href="css/index.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/index.js" charset="utf-8"></script>
</head>

<body>
<h1>Template For Login Signup</h1>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
		
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>

			<span>or use your account</span>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
        Located at #31 18th St., East Bajac-Bajac Olongapo
		<a target="_blank" href="https://www.facebook.com/4msflowershop">4MS Flower Shop</a>
		- Check their reviews
		<a target="_blank" href="https://www.facebook.com/4msflowershop/reviews/?ref=page_internal">here</a>.
	</p>
</footer>
</body>

</html>