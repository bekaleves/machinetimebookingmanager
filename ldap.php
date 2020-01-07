<?php
session_start();
$ldap_dn = "cn=" . $_POST["username"] . ",dc=example,dc=com";
$ldap_password = $_POST["password"];
$_SESSION['username'] = $_POST["username"];

$ldap_con = ldap_connect("10.0.30.1");
ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

if (ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
    header("Location: choose.php");
} else {
    header("Location: failed.php");
}
?>
<!doctype html>
<head>
<title>LDAP</title>
</head>
<body>
</body>
</html>