<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Login Page</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div id="container">
	
	<form id="login" action="/students/login" method="post">
	<h1>Login</h1>
<?php 
		echo (isset($login_errors)) ? $login_errors : "";
?>
		<table>
			<tr>
				<td>Email: </td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" id="login_button" value="Login"></td>
			</tr>
		</table>
	</form>
	<form id="register" action="/students/register" method="post">
	<h1>Register</h1>
<?php 
		echo (isset($registration_errors)) ? $registration_errors : "";
?>
		<table>
			<tr>
				<td>First name: </td>
				<td><input type="text" name="first_name"></td>
			</tr>
			<tr>
				<td>Last name:</td>
				<td><input type="text" name="last_name"></td>
			</tr>
			<tr>
				<td>Email-address:</td>
				<td><input type="email" name="email"></td>
			</tr>	
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Confirm Password: </td>
				<td><input type="password" name="confirm_password"></td>
			</tr>			
			<tr>
				<td colspan="2"><input type="submit" id="register_button" value="Register"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>