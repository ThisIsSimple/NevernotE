<html>

<head>
    <title>NevernotE</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/common.css" />

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/df09efc7f1.js"></script>
    <script src="assets/js/jquery.js"></script>
    <style>
        .shutup {
            width: 1120px;
            height: 20px;
            margin-top: 5px;
            margin-left: -545px;
            position: absolute;
        }
        
        .shutup i {
            color: #777777;
        }
        
        .shutup i:hover {
            color: #ff6b6b;
        }
    </style>
</head>

<body>

    <div style="width: 1120px; height: 700px;">

    <?php
    //2글자 미만의 날짜를 2글자로 만들어줌
    function checklen($str) {
        if(strlen($str)<2) {
            return '0'.$str;
        }
        else if(strlen($str)==2) {
            return $str;
        }
        else {
            substr($str, 0, 2);
        }
    }

    //입력받은 날짜의 요일을 구함
    function w($date) {
        $w = strftime("%w",strtotime($date));
        return $w;
    }
    ?>