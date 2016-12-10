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

$thisdate = $today_y.$today_m.$today_d;

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


//시간 관련 서비스
$nowt = date("H");
if($nowt>=8 && $nowt<13) $now = 1; //아침
else if($nowt>=13 && $nowt<14) $now = 2; //점심
else if($nowt>=14 && $nowt<18) $now = 3; //오후
else if($nowt>=18 && $nowt<20) $now = 4; //저녁
else if($nowt>=20 && $nowt<22) $now = 5; //야자1
else if($nowt>=22 && $nowt<24) $now = 6; //야자2
else $now = 7; //심자

?>

<link rel="stylesheet" href="assets/css/main.css" />
<script src="assets/js/main.js"></script>

<div id="board" style="text-align: center">

    <div style="height: 30px"></div>

    <a href="index.php" style="color: #373A3C;"><h1 id="today" class="display-3"><?php echo $m; ?> <?php echo $today_d; ?>, <?php echo $today_y; ?></h1></a>

    <div class="row">
        <div class="col-md-2 arrow">
            <a href="/index.php?thisdate=<?php echo prevpage($today_y, $today_m, $today_d) ?>" style="color: #373A3C;"><i class="fa fa-angle-left fa-5x" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-8">
            <div class="status" style="text-align: left;">
                <p>Today's To-Do :
                    <span class="bold">
                        <?php
                        $w = w($thisdate);
                        if($w==0 || $w==6) {
                            echo '주말/잔류';
                        }
                        else {
                            echo '평일';
                        }
                        ?>
                    </span>
                </p>
            </div>


            <div class="list" style="overflow-y: auto; height: 75%;">

                <?php
                include "dbconnect.php";
                $sql = 'select * from list where date = "'.$thisdate.'" and done="0" and time="'.$now.'" order by id asc';
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()) {
                    if($row['type']==1) {
                        switch($row['time']) {
                            case 1:
                                $strtime='오전 수업'; break;
                            case 2:
                                $strtime='점심 시간'; break;
                            case 3:
                                $strtime='오후 수업'; break;
                            case 4:
                                $strtime='저녁 시간'; break;
                            case 5:
                                $strtime='야자 1타임'; break;
                            case 6:
                                $strtime='야자 2타임'; break;
                            case 7:
                                $strtime='심야 자율학습'; break;
                        }
                    }
                    else if($row['type']==2) {
                        switch($row['time']) {
                            case 1:
                                $strtime='오전 자습'; break;
                            case 2:
                                $strtime='점심 시간'; break;
                            case 3:
                                $strtime='오후 자습'; break;
                            case 4:
                                $strtime='저녁 시간'; break;
                            case 5:
                                $strtime='야자 1타임'; break;
                            case 6:
                                $strtime='야자 2타임'; break;
                            case 7:
                                $strtime='심야 자율학습'; break;
                        }
                    }
                ?>
                    <div class="item-wrapper" style="border-bottom: 1px solid #666;">
                        <span class="list-item"><span style="float: left; margin-left: 20px; color: #ff3d7f"><b><?php echo $strtime; ?></b></span><?php echo $row['text']; ?></span>
                        <div class="list-button" style="float: right; width: 60px; height: 100%;">
                            <div class="inner">
                                <a href="done.php?date=<?php echo $row['date'];?>&id=<?php echo $row['id']; ?>" style="color: #818A91; margin-right: 10px;"><i class="fa fa-check fa-1x" aria-hidden="true"></i></a>
                                <a href="delete.php?date=<?php echo $row['date'];?>&id=<?php echo $row['id']; ?>" style="color: #818A91; margin-right: 15px;"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>



<?php
include "dbconnect.php";
$sql = 'select * from list where date = "'.$thisdate.'" and done="0" order by time asc';
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {

    if($row['type']==1) {
        switch($row['time']) {
            case 1:
                $strtime='오전 수업'; break;
            case 2:
                $strtime='점심 시간'; break;
            case 3:
                $strtime='오후 수업'; break;
            case 4:
                $strtime='저녁 시간'; break;
            case 5:
                $strtime='야자 1타임'; break;
            case 6:
                $strtime='야자 2타임'; break;
            case 7:
                $strtime='심야 자율학습'; break;
        }
    }
    else if($row['type']==2) {
        switch($row['time']) {
            case 1:
                $strtime='오전 자습'; break;
            case 2:
                $strtime='점심 시간'; break;
            case 3:
                $strtime='오후 자습'; break;
            case 4:
                $strtime='저녁 시간'; break;
            case 5:
                $strtime='야자 1타임'; break;
            case 6:
                $strtime='야자 2타임'; break;
            case 7:
                $strtime='심야 자율학습'; break;
        }
    }
?>

                <div class="item-wrapper">
                    <span class="list-item"><span style="float: left; margin-left: 20px;"><b><?php echo $strtime; ?></b></span><?php echo $row['text']; ?></span>
                    <div class="list-button" style="float: right; width: 60px; height: 100%;">
                        <div class="inner">
                            <a href="done.php?date=<?php echo $row['date'];?>&id=<?php echo $row['id']; ?>" style="color: #818A91; margin-right: 10px;"><i class="fa fa-check fa-1x" aria-hidden="true"></i></a>
                            <a href="delete.php?date=<?php echo $row['date'];?>&id=<?php echo $row['id']; ?>" style="color: #818A91; margin-right: 15px;"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></a>
                        </div>
                    </div>
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

