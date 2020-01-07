<?php 
session_start();
if ($_POST["submit"]) {
    
    $result = '<div class="alert alert-success">Proxmox is set!</div>';
    
    if (! $_POST['hostip']) {
        $error = "<br />Please enter a host or IP address!";
    } else {
        $_SESSION['hostip'] = $_POST['hostip'];
    }
    
    if (! $_POST['port']) {
        $error .= "<br />Please enter port number!";
    } else {
        $_SESSION['port'] = $_POST['port'];
    }
    
    if (! $_POST['pxusername']) {
        $error .= "<br />Please enter username!";
    } else {
        $_SESSION['pxusername'] = $_POST['pxusername'];
    }
    
    if (! $_POST['password']) {
        $error .= "<br />Please enter password!";
    } else {
        $_SESSION['password'] = $_POST['password'];
    }
    
    if ($error) {
        
        $result = '<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>' . $error . '</div>';
    } else {
        header("Location: prxmxres.php");
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

<title>Proxmox Setter</title>

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
			
				<h1>Proxmox VE Settings</h1>
				
				<p class="lead">Please fill in the values!</p>

				<?php echo $result; ?>

				<form method="post">
					<div class="form-group">
						<label for="hostip">Proxmox host or IP address:</label> <input type="text"
							name="hostip" class="form-control" placeholder="10.108.99.19" />
						<label for="port">Port:</label> <input type="number" name="port"
							class="form-control" placeholder="8006" />
						<label for="pxusername">Username:</label> <input type="text"
							name="pxusername" class="form-control" placeholder="root@pam" />
						<label for="password">Password:</label> <input type="password"
							name="password" class="form-control" />
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