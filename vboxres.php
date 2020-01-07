<?php 
session_start();
require("connection.php");
$vxhostip =  $_SESSION['vxhostip'];
$vboxes = 'curl http://'.$vxhostip.':8269/vboxmanage/list/vms | jq ".list"';
$vboxes_json = shell_exec($vboxes);
extract(json_decode($vboxes_json, true));

if (isset($_POST['submit'])) {
		
	$vmlxc_name = strip_tags(strtolower(trim($_POST['name'])));
	$start = $_POST['start'];
	$stop = $_POST['stop'];
	$reserving_username = $_SESSION['username'];
	
	$sql = "INSERT INTO events
			(name, start, stop, user)
			VALUES
			('{$vmlxc_name}', '{$start}', '{$stop}', '{$reserving_username}')";
			
	$result = mysqli_query($conn, $sql);

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
<title>phpVirtualBox Resources</title>
<style>

#wrapper {
    width: 1000px;
    margin: 0 auto;
	margin-top: 20px;
}

.resources {
    margin: 0 auto;
	border: 1px solid grey;
	border-radius: 10px;
	margin-top: 20px;
}

img {
    max-width: 50px;
    max-height: 50px;
}

</style>
</head>
<body>
	<div id="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 resources">
					<h1>VirtualBox Resources</h1>
                        <?php 
                            $vboxes_decoded = json_decode($vboxes_json, true);
                            for ($num = 0; $num < sizeof($vboxes_decoded); $num++) {
								$port_curl = 'curl http://'.$vxhostip.':8269/vboxmanage/showvminfo/'.$vboxes_decoded[$num]['name'].' | jq ".shell | .output" | awk -F "VRDE port:                   " "{ print $2}"';
								$port_curl_result = shell_exec($port_curl);
								$port_arr = explode("\\", $port_curl_result, 2);
								$port = $port_arr[0];
								echo '<a href="http://'.$vxhostip.'/phpvirtualbox-develop/endpoints/rdp.php?host='.$vxhostip.'&port='.$port.'&id='.$vboxes_decoded[$num]['uuid'].'&vm='.$vboxes_decoded[$num]['name'].'"><img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Virtualbox_logo.png" title="' . $vboxes_decoded[$num]['name'] . '" /></a>' . $vboxes_decoded[$num]['name'] . '</br>';	
								$sql = "INSERT INTO resources (id, name)
										SELECT * 
										FROM (SELECT '{$vboxes_decoded[$num]['uuid']}',
											 		 '{$vboxes_decoded[$num]['name']}')
										AS tmp
										WHERE NOT EXISTS (SELECT id,
														       name
											  	  		  FROM resources 
											  			  WHERE id = '{$vboxes_decoded[$num]['uuid']}' 
											  	  		  AND name = '{$vboxes_decoded[$num]['name']}') 
											  	  		  LIMIT 1;";
								mysqli_query($conn, $sql);
							}
							echo '</br';
						?>
						<h2>Reservation</h2>
						<form method="post" action="">
							<p><label for="">VM/LXC name:</label><br> 
							<input type="text" id="vmlxc_name" name="name" maxlength="20" placeholder="ubi" required></p>
							<p><label for="">From:</label><br> 
							<input type="datetime-local" id="from_date" name="start" required></p>
							<p><label for="">To:</label><br> 
							<input type="datetime-local" id="to_date" name="stop" required></p>
							<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success btn-lg">
							<input type="reset" value="Reset" class="btn btn-danger">
						</form>
						<br>
						<?php
						$list_events = "SELECT * FROM events";
						$query = mysqli_query($conn, $list_events);
						$output = "<table align=center>
								<tr>
									<th>Name</th>
									<th>From</th>
									<th>To</th>
									<th>User</th>
									<th>Del</th>
								</tr>";
						while ($line = mysqli_fetch_assoc($query)) {
						$output.= "<tr align=center>
										<td>{$line['name']}</td>
										<td>{$line['start']}</td>
										<td>{$line['stop']}</td>	
										<td>{$line['user']}</td>
										<td><a href=\"del.php?id={$line['id']}\"><img src='http://chittagongit.com/images/x-icon-png/x-icon-png-27.jpg' style='width:16px;height:16px;border:0;' /></a></td>
									</tr>";
						}
						$output.= "</table>";
						print $output;
					?>
				</div>
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
