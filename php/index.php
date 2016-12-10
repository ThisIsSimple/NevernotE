<?php
include "header.php";
?>

<?php

$thisdate = $_GET['thisdate'];

$today_y = mb_strimwidth($thisdate, '0', '4', '', 'utf-8');
$temp = substr($thisdate, 4);
$today_m = substr($temp, 0, 2);
$today_d = substr($temp, 2);

if(!$today_y) {
    $today_y = date("Y");
}

if(!$today_m) {
    $today_m = date("m");
}

if(!$today_d) {
    $today_d = date("d");
}

$today_m = checklen($today_m);
$today_d = checklen($today_d);

switch($today_m) {
    case 1: $m = 'January'; break;
    case 2: $m = 'Feburary'; break;
    case 3: $m = 'March'; break;
    case 4: $m = 'April'; break;
    case 5: $m = 'May'; break;
    case 6: $m = 'June'; break;
    case 7: $m = 'July'; break;
    case 8: $m = 'August'; break;
    case 9: $m = 'September'; break;
    case 10: $m = 'October'; break;
    case 11: $m = 'November'; break;
    case 12: $m = 'December'; break;
}



//날짜 구하기 함수
/**
 * @param $y
 * @param $m
 * @param $d
 * @return string
 */
function nextpage($y, $m, $d) {
    switch($m) {
        case 1: case 3: case 5: case 7: case 8: case 10:
            if($d==31) {
                $m++;
                $d = 1;
            }
            else $d++;
            break;
        case 4: case 6: case 9: case 11:
            if($d==30) {
                $m++;
                $d = 1;
            }
            else $d++;
            break;
        case 2:
            if(29==date("t",mktime(0,0,0,2,1,$y))) {
                if($d==29) {
                    $m++;
                    $d = 1;
                }
                else $d++;
            }
            else {
                if($d==28) {
                    $m++;
                    $d = 1;
                }
                else $d++;
            }
            break;
        case 12:
            if($d==31) {
                $m = 1;
                $d = 1;
                $y++;
            }
            else $d++;
            break;
    }
    if(strlen($m)<2) $m = '0'.$m;
    if(strlen($d)<2) $d = '0'.$d;

    $nextdate = $y.$m.$d;

    return $nextdate;
}
function prevpage($y, $m, $d) {
    switch($m) {
        case 5: case 7: case 10: case 12:
        if($d==1) {
            $m--;
            $d = 30;
        }
        else $d--;
        break;
        case 2: case 4: case 6: case 8: case 9: case 11:
        if($d==1) {
            $m--;
            $d = 31;
        }
        else $d--;
        break;
        case 3:
            if(29==date("t",mktime(0,0,0,2,1,$y))) {
                if($d==1) {
                    $m--;
                    $d = 29;
                }
                else $d--;
            }
            else {
                if($d==1) {
                    $m--;
                    $d = 28;
                }
                else $d--;
            }
            break;
        case 1:
            if($d==1) {
                $m = 12;
                $d = 31;
                $y--;
            }
            else $d--;
            break;
    }
    if(strlen($m)<2) $m = '0'.$m;
    if(strlen($d)<2) $d = '0'.$d;

    $prevdate = $y.$m.$d;

    return $prevdate;
}


?>

<link rel="stylesheet" href="assets/css/main.css" />

<div id="board" style="text-align: center">

    <a href="index.php" style="color: #373A3C;"><h1 id="today" class="display-3"><?php echo $m; ?> <?php echo $today_d; ?>, <?php echo $today_y; ?></h1></a>

    <div class="row">
        <div class="col-md-2 arrow">
            <a href="/index.php?thisdate=<?php echo prevpage($today_y, $today_m, $today_d) ?>" style="color: #373A3C;"><i class="fa fa-angle-left fa-5x" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-8">
            <div class="status" style="text-align: left;">
                <p>Today's To-Do :
                    <span class="bold">
                <select>
                    <option value="weekday">평일</option>
                    <option value="stay">잔류</option>
                    <option value="vacation">방학</option>
                    <option value="weekend">주말/휴일</option>
                </select>
            </span>
                </p>
            </div>


            <div class="list">
                <div class="item-wrapper">
                    <span class="list-item">asdfsdafasdfascxvawedvxzcv</span>
                </div>
                <div class="item-wrapper">
                    <span class="list-item">asdfsdafasdfascxvawedvxzcv</span>
                </div>
                <div class="item-wrapper">
                    <span class="list-item">asdfsdafasdfascxvawedvxzcv</span>
                </div>
<?php
include "dbconnect.php";
$sql = 'select * from list where date = "'.$thisdate.'"';
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
?>

                <div class="item-wrapper">
                    <span class="list-item">asdfsdafasdfascxvawedvxzcv</span>
                </div>

<?php } ?>
            </div>


        </div>
        <div class="col-md-2 arrow">
            <a href="/index.php?thisdate=<?php echo nextpage($today_y, $today_m, $today_d); ?>" style="color: #373A3C;">
            <i class="fa fa-angle-right fa-5x" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

<div class="menu">
    <a href="index.php?thisdate=<?php echo $thisdate; ?>">
        <div class="menu-item active"><i class="fa fa-calendar-o fa-3x" aria-hidden="true"></i></div>
    </a>
    <a href="content-list.php?thisdate=<?php echo $thisdate; ?>">
        <div class="menu-item"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></div>
    </a>
    <a href="edit.php?thisdate=<?php echo $thisdate; ?>">
        <div class="menu-item"><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></div>
    </a>
</div>

<?php
include "footer.php";
?>

