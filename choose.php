<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<title>Choose hypervisor</title>

<style>

#wrapper {
    width: 485px;
    margin: 0 auto;
    margin-top: calc(50vh - 150px);
}

.left {
    width: 240px;
    height: 120px;
    border-radius: 10px;
    background-color: lightgreen;
    float: left;
    display: flex;
    align-items: center;
    justify-content: center;
}

.right {
    width: 240px;
    height: 120px;
    border-radius: 10px;
    background-color: lightgreen;
    float: right;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
</head>
<body>
	<div id="wrapper">
		<h1>Welcome <?php echo $_SESSION['username'] ?>!</h1>
		<p>Choose your hypervisor type!</p>
		<div class="left">
			<button type="button" class="btn btn-success btn-lg" onclick="window.location.href='prxmxform.php'">Proxmox VE</button>
		</div>
		<div class="right">
			<button type="button" class="btn btn-success btn-lg" onclick="window.location.href='vboxform.php'">VirtualBox</button>
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