<?php
header("Content-Type: text/html; charset=utf-8");
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "reservation");
$conn = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("<b>Error while connecting!</b>");
mysqli_query($conn, "SET NAMES utf8");
?>