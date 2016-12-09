<?php
include "header.php";
?>

<link rel="stylesheet" href="assets/css/edit.css" />
<script src="assets/js/star.js"></script>

<div id="board">

    <div class="upper_bar">
        <div class="shutup"><a id="close" href="javascript:window.close()"><i class="fa fa-circle fa-1x" aria-hidden="true"></i></a></div>
    </div>

    <h1 id="today" class="display-3 center-align">Add To-Do</h1>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="status">
                <p class="left-align">Today's To-Do :
                    <span class="bold">
                        <select>
                            <option value="mod-weekday">평일</option>
                            <option value="mod-stay">잔류</option>
                            <option value="mod-vacation">방학</option>
                            <option value="mod-weekend">주말/휴일</option>
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
            <textarea rows="8" placeholder="요! 할일이 뭔가?" autofocus></textarea>
            <div class="right-align" style="margin: 3px 3px 0 0;">
                <a href="#" class="text-muted">등록</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php
include "footer.php";
?>