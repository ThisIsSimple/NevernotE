<?php
$hostname = "localhost";
$username = "root";
$dbpassword = "simple1234";
$dbname = "nevernote";

$conn = mysqli_connect($hostname, $username, $dbpassword, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>