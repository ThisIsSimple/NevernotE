<?php
$hostname = "localhost";
$username = "root";
$dbpassword = "simple1234";
$dbname = "nevernote";

$conn = mysqli_connect($hostname, $username, $dbpassword, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$date = $_POST['date']; //20001122
$type = $_POST['type']; // 0, 1(평일), 2(잔류)
$time = $_POST['time']; // 0, 1, 2, 3, 4, 5, 6, 7
$text = $_POST['box'];
$importance = $_POST['importance'];
$done = 0;

echo $date. $type. $time. $text. $importance. $done;

$sql = "INSERT INTO list (date, type, time, text, importnace, done)";
$sql .= "VALUES ('$date', '$type', '$time', '$text', '$importance', '$done')";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($conn->query($sql)) {
    echo 'success!';
}
else {
    echo 'failed';
}

echo $row['date'].'<br>';
echo $row['type'].'<br>';
echo $row['time'].'<br>';
echo $row['text'].'<br>';
echo $row['importance'].'<br>';
echo $row['done'].'<br>';
?>