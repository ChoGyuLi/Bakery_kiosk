<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>햄 종류 선택</title>
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

    .test {
        display: inline-block;
        
        
    }

    /*img*/ 
    .meat {
        margin: 50% 0 30% 0;

        width: 150px;
        height: 180px;
        border-radius: 20px;
        
    }

    /*count & button*/ 
    .inputBtn {
        float: left;
        /* margin-right: 2%; */
        margin-left: 26%;
        
    }

    figcaption:active, .inputBtn :active {
        color: coral;
    }

    .cntBtn {
        width: 30px;
        border-color: pink;
        border-width: 1px;
        border-radius: 30px;
        background-color: white;
        
  
    }

    #check {
        width: 60px;
        font-size: small;
        font-weight: bold;
        border-color: pink;
        border-width: 1px;
        border-radius: 30px;
        background-color: white;
    }

    .cntBtn:active, #check:active {
        box-shadow:  1px 1px 1px 1px gray inset;
        transform: translate(2px, 1px);
        background-color: pink;
        color: white;

    }
    
</style>

<?php
    //$bread = $_POST['bread'];

    $dbcon = mysqli_connect('localhost','wh3614208','tangerine53!');
    mysqli_select_db($dbcon, 'wh3614208');
    $query = "select * from menu";
    $result = mysqli_query($dbcon, $query);
    
    $row = mysqli_fetch_array($result);

    ?>

<script>

    var price = 0;

    function chooseH(event){
        opener.document.getElementById("orderH").value =  event.target.value; /* 빵 종류 주문서에 출력 */

    }

    function count(type)  {
            
        var resultElement = document.getElementById('cnt');
        var number = resultElement.innerText;
        
        if(type === 'plus') {
            number = parseInt(number) + 1;
        }else if(type === 'minus')  {
            number = parseInt(number) - 1;
        }

        resultElement.innerText = number;
        var value = opener.document.getElementById("orderH").value;
        opener.document.getElementById("countH").value = number;

        // alert(value);

        if(value == "슬라이스햄"){
            price = <?= $row['item5'] ?>;
        
        }else if(value == "베이컨"){
            price = <?= $row['item6'] ?>;
        }else{
            price = 0;
        }

        result = price * number;
        opener.document.getElementById("priceH").value = result;


    
    }
</script>

<body>
    
    <div id = "bg">
            <div class="test">
            <img src="./img/ham.jpg" class="meat" >
                <figcaption><input type="radio" name="meat" id = "ham" value="슬라이스햄" onclick="chooseH(event)">슬라이스 햄</figcaption>
                <span>1000원</span>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="test">
            <img src="./img/bacon.jpg" class="meat">
                <figcaption><input type="radio" name="meat" id = "bacon" value="베이컨" onclick="chooseH(event)">베이컨</figcaption>
                <span>1200원</span>
            </div>
            <div class="test">
            <img src="./img/forbidden.png" class="meat" style="padding-left: 40px;">
                <figcaption> <input type="radio" name="meat" id = "none" value="뺴주세요" onclick="chooseH(event)" >빼주세요</figcaption>
                <span>0원</span>
            </div>
            
            <br><br>

            <span class="inputBtn">
                <input type='button' class="cntBtn" value='+' onclick='count("plus")'/>
                <span id='cnt'>0</span>
                <input type='button' class="cntBtn" value='-' onclick='count("minus")' /> 
            </span>
           

            <!-- <input type="text" id="test">
            <input type="button" value="선택" >-->
            
            <span class="inputBtn"><input type="button" id="check" value="확인" onclick="window.close()"></span>

    </div>
</body>
</html>