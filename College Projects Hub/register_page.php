<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="register_page.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="registerValidation.js"></script>
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
                <a id="home" href="login_page.php">LOGIN</a>
                </li>
                <li>
                <a id="home" href="about.php">ABOUT</a>
                </li>
                </ul> 
				</nav>
			</div>
        </div>
		</header>

		<div id = "login2" style="border-radius:6px;">
		<form name="register" action="register_driver.php" onsubmit="return regValidate()" method="post">
				<table>
					<tr>
						<td>
							<i class="fa fa-users">
							<label for="username">username</label></i>
						</td>
						<td>
							<input name="username" style="padding-bottom: 15px; margin-bottom: 15px;" type="text">
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-lock">
							<label for="password"> password</label></i>
						</td>
						<td>
							<input name="password" style="padding-bottom: 15px; margin-bottom: 15px;" type="password">
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-at">
							<label for="email">E-mail id</label></i>
						</td>
						<td>
							<input style="padding-bottom: 15px; margin-bottom: 15px;" type="email" name="email_id">
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-mobile">
							<label for="phone">phone</label></i>
						</td>
						<td>
							<input style="padding-bottom: 15px; margin-bottom: 15px;" type="tel" name="phone" pattern="[0-9]{10}">
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-map">
							<label for="address">address</label></i>
						</td>
						<td>
							<input style="padding-bottom: 15px; margin-bottom: 15px;" type="text" name="address">
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-university">
							<label for="college">College</label></i>
						</td>
						<td>
							<input style="padding-bottom: 15px; margin-bottom: 15px;" type="text" name="college">
						</td>
					</tr>
				</table>
				<input name="submit" style="font-weight: bold; padding: 0px 5px 2px 10px" type="submit" value="Register">

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