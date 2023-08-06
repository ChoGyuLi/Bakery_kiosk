<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>치즈 종류 선택</title>
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
    .cheese {
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

    $dbcon = mysqli_connect('localhost','root','');
    mysqli_select_db($dbcon, 'kt');

    $query = "select * from menu";
    $result = mysqli_query($dbcon, $query);
    
    $row = mysqli_fetch_array($result);


    ?>

<script>

    var price = 0;

    function chooseC(event){
        opener.document.getElementById("orderC").value =  event.target.value; /* 빵 종류 주문서에 출력 */

    }

    function count(type)  {
            
        var resultElement = document.getElementById('cnt');
        var number = resultElement.innerText;
        
        if (type === 'plus'){
            number = parseInt(number) + 1;
        }else if(type === 'minus'){
        if (parseInt(number) > 0) {
            number = parseInt(number) - 1;
            }
        }


        resultElement.innerText = number;

        var value = opener.document.getElementById("orderC").value;
        opener.document.getElementById("countC").value = number;

        // alert(value);

        if(value == "아메리칸"){
            price = <?= $row['item3'] ?>;
        
        }else if(value == "모짜렐라"){
            price = <?= $row['item4'] ?>;
        }else{
            price = 0;
        }

        result = price * number;
        opener.document.getElementById("priceC").value = result;


    
    }
</script>
<body>
    
    <div id = "bg">
            <div class="test">
                <img src="./img/american_cheese.jpg" class="cheese" >
                <figcaption><input type="radio" name="cheese" id = "american" value="아메리칸" onclick="chooseC(event)">아메리칸 치즈</figcaption>
                <span>500원</span>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="test">
                <img src="./img/Mozzarella_cheese.jpg" class="cheese">
                <figcaption><input type="radio" name="cheese" id = "mozzarella" value="모짜렐라" onclick="chooseC(event)">모짜렐라 치즈</figcaption>
                <span>700원</span>
            </div>
            <div class="test">
            <img src="./img/forbidden.png" class="cheese" style="padding-left: 50px;">
                <figcaption> <input type="radio" name="cheese" id = "none" value="뺴주세요" onclick="chooseC(event)">빼주세요</figcaption>
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