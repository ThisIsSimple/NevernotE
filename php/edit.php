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

?>

<link rel="stylesheet" href="assets/css/edit.css" />
<script src="assets/js/star.js"></script>

<div id="board">

    <h1 id="today" class="display-3 center-align">Add To-Do</h1>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <form name="new" method="post" action="write.php">
            <div class="status" id="starrate">
                <p class="left-align">Today's To-Do :
                    <span class="bold">
                        <select name="type">
                            <option value="weekday">평일</option>
                            <option value="weekend">주말/휴일</option>
                            <option value="stay">잔류</option>
                            <option value="vacation">방학</option>
                        </select>
                    </span>
                    <span style="float: right">
                        <i class="fa fa-circle star" aria-hidden="true"></i>
                        <i class="fa fa-star-o star" aria-hidden="true"></i>
                        <i class="fa fa-star-o star" aria-hidden="true"></i>
                        <i class="fa fa-star-o star" aria-hidden="true"></i>
                    </span>
                </p>
            </div>

            <script>
            
            </script>

            <script>
            function countstar() {
                var count = $('#starrate').find('.fa-star').length;
            }
            </script>

                <textarea name="box" rows="8" placeholder="요! 할일이 뭔가?" autofocus></textarea>
                <input type="hidden" name="importance" value="<?php echo $count; ?>">
                <div class="right-align" style="margin: 3px 3px 0 0;">
                    <input type="submit" onclick="countstar()" value="등록" style="color: #818A91; background-color: transparent; border: 0;">
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