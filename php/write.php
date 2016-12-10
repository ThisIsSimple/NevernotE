<?php
include "dbconnect.php";

$date = date("Ymd");
$type = $_POST['type'];
$time = 1;
$box = $_POST['box'];
$importance = $_POST['importance'];
$done = 0;

echo $date . '<br>' . $type . '<br>' . $time . '<br>' . $box . '<br>' . $importance . '<br>' . $done;

//$sql = 'insert into list (date, type, time, text, importance, done) values ("'.$today.'", "weekday", 1, "'.$box.'", 3, 0)';
//$result = $conn->query($sql);
//$row = $result->fetch_array(MYSQLI_ASSOC);

//echo $row['date'];
//echo $row['time'];
?>