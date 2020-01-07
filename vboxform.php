<?php 
session_start();

if ($_POST["submit"]) {
    
    $result = '<div class="alert alert-success">phpVirtualBox is set!</div>';
    
    if (! $_POST['vxhostip']) {
        $error = "<br />Please enter a host or IP address!";
    } else {
        $_SESSION['vxhostip'] = $_POST['vxhostip'];
    }
    
    if ($error) {
        $result = '<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>' . $error . '</div>';
    } else {
        header("Location: vboxres.php");
    }
    
}

?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<title>phpVirtualBox IP</title>

<style>

.setForm {
    margin: 0 auto;
	border: 1px solid grey;
	border-radius: 10px;
	margin-top: 20px;
}

form {
    margin: 0 auto;
	padding-bottom: 20px;
}

</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 setForm">
			
				<h1>phpVirtualBox IP</h1>
				<p class="lead">Please fill in the IP address!</p>

				<?php echo $result; ?>

				<form method="post">
					<div class="form-group">
						<label for="vxhostip">phpVirtualBox host or IP address:</label> <input type="text"
							name="vxhostip" class="form-control" placeholder="10.0.30.1" />
					</div>
					<input type="submit" name="submit" class="btn btn-success btn-lg"
						value="Submit" />
				</form>
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