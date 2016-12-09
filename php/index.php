<?php
include "header.php";
?>

<script>
    var $d = new Date(year, month, day);
</script>

<link rel="stylesheet" href="assets/css/main.css" />

<div id="board" style="text-align: center">

    <div class="upper_bar">
        <div class="shutup"><a id="close" href="javascript:window.close()"><i class="fa fa-circle fa-1x" aria-hidden="true"></i></a></div>
    </div>

    <h1 id="today" class="display-3">December 25, 2016</h1>

    <div class="row">
        <div class="col-md-2 arrow">
            <i class="fa fa-angle-left fa-5x" aria-hidden="true"></i>
        </div>
        <div class="col-md-8">
            <div class="status" style="text-align: left;">
                <p>Today's To-Do :
                    <span class="bold">
                <select>
                    <option value="mod-weekday">평일</option>
                    <option value="mod-stay">잔류</option>
                    <option value="mod-vacation">방학</option>
                    <option value="mod-weekend">주말/휴일</option>
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
            </div>
        </div>
        <div class="col-md-2 arrow">
            <i class="fa fa-angle-right fa-5x" aria-hidden="true"></i>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>

