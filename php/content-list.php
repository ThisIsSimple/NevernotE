<?php
include "header.php";
?>

<?php
$thisdate = $_GET['thisdate'];
?>

<link rel="stylesheet" href="assets/css/content-list.css"/>

<div id="board" style="text-align: center;">

    <h1 id="content_title" class="display-3">To-Do List</h1>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="complete_list">

                <div class="subcopy"><i class="fa fa-check-circle" aria-hidden="true" style="margin-right: 4px"></i>Complete To-Do</div>

                <?php
                include "dbconnect.php";
                $sql = 'select * from list where done = "1"';
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    ?>

                    <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>

                <?php } ?>

                <div class="ongoing_list">

                    <div class="subcopy"><i class="fa fa-play-circle" aria-hidden="true" style="margin-right: 4px"></i>Ongoing To-Do</div>

                    <?php
                    include "dbconnect.php";
                    $sql = 'select * from list where done = "0"';
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        ?>

                        <div class="item-wrapper">Lorem ipsum dolor sit amet.</div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu">
    <a href="index.php?thisdate=<?php echo $thisdate; ?>">
        <div class="menu-item"><i class="fa fa-calendar-o fa-3x" aria-hidden="true"></i></div>
    </a>
    <a href="content-list.php?thisdate=<?php echo $thisdate; ?>">
        <div class="menu-item active"><i class="fa fa-bars fa-3x" aria-hidden="true"></i></div>
    </a>
    <a href="edit.php?thisdate=<?php echo $thisdate; ?>">
        <div class="menu-item"><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></div>
    </a>
</div>

<?php
include "footer.php";
?>