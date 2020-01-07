<?php
header("Content-Type: text/html; charset=utf-8");
if (isset($_GET['id'])) {
	require("connection.php");
	$id = (int)$_GET['id'];
	$sql = "DELETE FROM `events` 
	WHERE id = {$id}";
	mysqli_query($conn, $sql);
}
header("Location: prxmxres.php");
?>