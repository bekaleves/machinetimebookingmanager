<?php
session_start();
phpinfo();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!doctype html>
<head>

<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<style>
body {
	text-align: center;
}

#wrapper {
    width: 485px;
    margin: 0 auto;
    margin-top: calc(50vh - 150px);
}

.setForm {
	margin: 0 auto;
	border: 1px solid grey;
	border-radius: 10px;
	margin-top: 20px;
}

input {
	padding: 10px;
	font-size: 20;
    margin: 0 auto;
	padding-bottom: 20px;
}
}
</style>
<title>Login page</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 setForm">
			
				<h1>Login page</h1>
				<p class="lead">Please use credentials for login!</p>
				<form action="ldap.php" method="post">
					<input type="text" name="username" value="username" /><br>
					<input type="password" name="password" value="password" /><br> 
					<br>
					<input type="submit" name="submit" class="btn btn-success btn-lg" value="Login" /><br> 
				</form>
				<br>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>
</html>