<?php
include "header.php";
?>

<?php
$date = $_GET['thisdate'];

$today_y = mb_strimwidth($date, '0', '4', '', 'utf-8');
$temp = substr($date, 4);
$today_m = substr($temp, 0, 2);
$today_d = substr($temp, 2);

if (!$today_y) {
    $today_y = date("Y");
}

if (!$today_m) {
    $today_m = date("m");
}

if (!$today_d) {
    $today_d = date("d");
}

$today_m = checklen($today_m);
$today_d = checklen($today_d);

$date = $today_y.$today_m.$today_d;

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

?>

<link rel="stylesheet" href="assets/css/edit.css" />
<script src="assets/js/star.js"></script>

<div id="board">

    <h1 id="today" class="display-3 center-align">Add To-Do</h1>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <form method="post" action="write.php">
            <input type="hidden" name="date" value="<?php echo $date; ?>">
            <div class="status" id="starrate">
                <p class="left-align">Today's To-Do :
                    <span class="bold"><?php echo $m.' '.$today_d.', '.$today_y; ?></span>
                    <span style="float: right;">
                        <span style="display: inline;">중요도</span>
                        <select name="importance" class="form-control" style="display: inline; border: 0; width: 60px; height: auto; overflow: hidden;">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <!--
                        <i class="fa fa-circle star" aria-hidden="true"></i>
                        <i class="fa fa-star-o star" aria-hidden="true"></i>
                        <i class="fa fa-star-o star" aria-hidden="true"></i>
                        <i class="fa fa-star-o star" aria-hidden="true"></i>
                        -->
                    </span>
                </p>
            </div>

            <script>
            function countstar() {
                var count = $('#starrate').find('.fa-star').length;
            }
            </script>

                <textarea name="box" rows="8" placeholder="요! 할일이 뭔가?" autofocus></textarea>

            <?php
                $w = w($date);
                if($w==0 || $w==6) {
            ?>
            <p class="left-align">Timeline for <span style="font-weight: 700">잔류</span></p>
                    <input type="hidden" name="type" value="2">
            <div class="form-group">
                <select name="time" class="form-control" style="width: 100%; height: auto; overflow: hidden;">
                    <option value="1">오전 자습</option>
                    <option value="2">점심 시간</option>
                    <option value="3">오후 자습</option>
                    <option value="4">저녁 시간</option>
                    <option value="5">야자 1타임</option>
                    <option value="6">야자 2타임</option>
                    <option value="7">심야 자율학습</option>
                </select>
            </div>
            <?php } else { ?>
            <p class="left-align">Timeline for <span style="font-weight: 700">평일</span></p>
                    <input type="hidden" name="type" value="1">
            <div class="form-group">
                <select name="time" class="form-control" style="border: 0; width: 100%; height: auto; overflow: hidden;">
                    <option value="1">오전 수업</option>
                    <option value="2">점심 시간</option>
                    <option value="3">오후 수업</option>
                    <option value="4">저녁 시간</option>
                    <option value="5">야자 1타임</option>
                    <option value="6">야자 2타임</option>
                    <option value="7">심야 자율학습</option>
                </select>
            </div>
            <?php } ?>

            <div class="right-align" style="margin: 3px 3px 0 0;">
                <input type="submit" value="등록" style="color: #818A91; background-color: transparent; border: 0;">
            </div>

            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<div class="menu">
    <a href="index.php?thisdate=<?php echo $date; ?>">
        <div class="menu-item"><i class="fa fa-calendar-o fa-3x" aria-hidden="true"></i></div>
    </a>
    <a href="content-list.php?thisdate=<?php echo $date; ?>">
        <div class="menu-item"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></div>
    </a>
    <a href="edit.php?thisdate=<?php echo $date; ?>">
        <div class="menu-item active"><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></div>
    </a>
</div>

<?php
include "footer.php";
?>