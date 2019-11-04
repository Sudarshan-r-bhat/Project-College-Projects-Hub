<!DOCTYPE html>
<html>
<head>
	<title>Login!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="login_page.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="loginValidation.js"></script>
</head>
<body>
	<div id="particles-js">
		<div id="login">
		<header>
        <div>
			<div id="header1">COLL-<span class="highlight">PRO-HUB</span></div>
			<div>
                <nav id="header">
                <ul>
                <a id="home" href="register_page.php">REGISTER</a>
                </li>
                <li>
                <a id="home" href="about.php">ABOUT</a>
                </li>
                </ul> 
				</nav>
			</div>
        </div>
		</header>
		<div id="login2">
			<form name="login" method="post" action="login_driver.php" onsubmit="return validate()">
				<div>
				<i class="fa fa-users">
				<label for="username">username</label></i>
				<input type="text" name="username">
				</div>

				<div>
				<i class="fa fa-lock">
				<label for="password"> password</label></i>
				<input style="margin-left:10px;" type="password" name="password">
				</div>
				<input type="submit" value="login">
			</form>
		</div>
			
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
	<script>
		particlesJS.load('particles-js', 'particles.json', function()
			{
				console.log('effects applied');
			});
	</script>
</body>
</html>