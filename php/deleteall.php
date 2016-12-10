<?php
$hostname = "localhost";
$username = "root";
$dbpassword = "simple1234";
$dbname = "nevernote";

$conn = mysqli_connect($hostname, $username, $dbpassword, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "delete from list where done='1'";
$result = $conn->query($sql);
?>

<html>
<head>
    <meta http-equiv="refresh" content="0.5;url=content-list.php">
</head>
</html>
