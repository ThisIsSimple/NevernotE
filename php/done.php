<?php
$hostname = "localhost";
$username = "root";
$dbpassword = "simple1234";
$dbname = "nevernote";

$conn = mysqli_connect($hostname, $username, $dbpassword, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$date = $_GET['date'];
$id = $_GET['id'];

$sql = "update list set done='1' where id='".$id."'";
$result = $conn->query($sql);
?>

<html>
<head>
    <meta http-equiv="refresh" content="0.5;url=index.php?thisdate=<?php echo $date; ?>">
</head>
</html>