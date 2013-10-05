<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<form name="loginForm" action="checkLogin.php" method=post>
		UserName: <input name="userName" type="text" size="30"></input><br>
		Password: <input name="password" type="password" size="30"></input><br>
		<input type="submit" value="Login"/>
		<a href="register.php">Not a Registered User?</a>
	</form>
</body>
</html>