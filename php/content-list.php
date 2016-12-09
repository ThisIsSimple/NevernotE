<?php
include "header.php";
?>

<link rel="stylesheet" href="assets/css/content-list.css"/>

<div id="board" style="text-align: center;">

    <div class="upper_bar">
        <div class="shutup"><a id="close" href="javascript:window.close()"><i class="fa fa-circle fa-1x" aria-hidden="true"></i></a></div>
    </div>

    <h1 id="content_title" class="display-3">To-Do List</h1>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="complete_list">

                <div class="subcopy"><i class="fa fa-check-circle" aria-hidden="true" style="margin-right: 4px"></i>Complete To-Do</div>

                <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>
                <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>
                <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>

                <div class="ongoing_list">

                    <div class="subcopy"><i class="fa fa-play-circle" aria-hidden="true" style="margin-right: 4px"></i>Ongoing To-Do</div>

                    <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>
                    <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>
                    <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>