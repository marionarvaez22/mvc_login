<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User's Login Page</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div id="user_logged_in">
	<?php
		if(! isset($this->session->userdata['logged_in']))
			redirect(base_url());	
	?>
	<h3>Welcome <?= $this->session->userdata['user']['first_name'] ?>!</h3>
	<h2>User Information</h2>
	<table>
		<tr>
			<td>First Name:</td>
			<td><?= $this->session->userdata['user']['first_name'] ?></td>
		</tr>		<tr>
			<td>Last Name:</td>
			<td><?= $this->session->userdata['user']['last_name'] ?></td>
		</tr>		<tr>
			<td>Email:</td>
			<td><?= $this->session->userdata['user']['email'] ?></td>
		</tr>
	</table>
	<a href="/students/log_off">Log off</a>
</div>
</body>
</html>