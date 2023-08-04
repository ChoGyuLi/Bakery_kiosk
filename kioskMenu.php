<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메뉴 최종선택</title>
</head>
<style>

    @font-face {
            font-family: 'GangwonEdu_OTFBoldA';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2201-2@1.0/GangwonEdu_OTFBoldA.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

    body {
        background-color: wheat;
        font-family: 'GangwonEdu_OTFBoldA';
    }

    #bg {
    
        width: 95%;
        height: 500px;
        background-color: white;
        border-radius: 40px 80px / 80px 40px; 
        text-align: center;
        margin-left: 2.5%;
        
    }

    h3 {
        padding-top: 25%;
        text-align: center;
    }

    input  {
        width: 50px;
        border-color: pink;
        border-width: 1px;
        border-radius: 30px;
        background-color: white;
        font-weight: bold;
        text-align: center;
    }

    input :hover {
        box-shadow:  1px 1px 1px 1px gray inset;
        transform: translate(2px, 1px);
        background-color: pink;
        color: white;
    }


</style>
<body>
    
    <?php

    $orderB = $_GET['orderB'];
    $countB = $_GET['countB'];
    $orderC = $_GET['orderC'];
    $countC = $_GET['countC'];
    $orderH = $_GET['orderH'];
    $countH = $_GET['countH'];
    $total = $_GET['total'];


    echo"<div id='bg'>";
    echo"<h3>";
    echo $orderB." x ".$countB."<br>".
    $orderC." x ".$countC."<br>".
    $orderH." x ".$countH."<br><br><div id = 'total'> 총 금액 : ".
    number_format($total)."원</div>";
    echo"</h3>";
 

    $dbcon = mysqli_connect('localhost','wh3614208','tangerine53!');
             mysqli_select_db($dbcon,'wh3614208');
 
    $query = "insert into orderM values ('$orderB',$countB,'$orderC',$countC,'$orderH',$countH,$total)";
    $result = mysqli_query($dbcon,$query);
    mysqli_close($dbcon);
 
    ?>
    <br><br>
    <input type="button" value="닫기" onclick="window.close()">
    <?php
        echo"</div>";
    ?>
</body>
</html>