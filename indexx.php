<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인화면</title>
    <link rel="stylesheet" href="./kiosk.css">  
    <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        // var countB = document.getElementById('countB').value;
        // var countC = document.getElementById('countC').value;
        // var countH = document.getElementById('countH').value;
          

        // var orderB = document.getElementById('orderB').value;
        // var orderC = document.getElementById('orderC').value;
        // var orderH = document.getElementById('orderH').value;


        // var total = 0;

        
        function bread(){ /*빵 종류 창*/ 
            window.open("bread.php","","width=800, height = 550");
        }

        function cheese(){ /*치즈 종류 창*/ 
            window.open("cheese.php","","width=800, height = 550");
        }

        function ham(){ /*햄 종류 창*/ 
            window.open("ham.php","","width=800, height = 550");
        }

        // function veg(){ /*빵 종류 창*/ 
        //     window.open("veg.php","","width=800, height = 550");
        // }

        function reset(){
            /*수량이랑 금액 0*/ 
            
            }

        function price(){
        
            var countB = document.getElementById('countB').value;
            var countC = document.getElementById('countC').value;
            var countH = document.getElementById('countH').value;
            

            var orderB = document.getElementById('orderB').value;
            var orderC = document.getElementById('orderC').value;
            var orderH = document.getElementById('orderH').value;


            var priceB = document.getElementById("priceB").value;
            var priceC = document.getElementById("priceC").value;
            var priceH =document.getElementById("priceH").value;

            var total = parseInt(priceB) + parseInt(priceC) + parseInt(priceH);

            
            if ( confirm("총"+total+"입니다.") ) { 
                // confirm("총"+total+"입니다.")
                // 확인 클릭시 true 가 리턴 되어 실행​ 
                window.open("kioskMenu.php?orderB=" + orderB + "&countB=" + countB +
                "&orderC=" + orderC + "&countC=" + countC + 
                "&orderH=" + orderH + "&countH=" + countH + 
                "&total=" + total,
                "","width=300, height = 550, left = 750, top = 300");    

                } else {

                    Swal.fire({
                    icon: 'success',
                    title: '취소 선택',
                    text: '취소를 누르셨습니다.'
                    })
            

            } 

            
        //     window.open("kioskMenu.php?orderB=" + orderB + "&countB=" + countB +
        //         "&orderC=" + orderC + "&countC=" + countC + 
        //         "&orderH=" + orderH + "&countH=" + countH + 
        //         "&total=" + total,
        //         "","width=800, height = 550");
        }


        function reset(){

            document.getElementById('orderB').value = '';
            document.getElementById('orderC').value = '';
            document.getElementById('orderH').value = '';

            document.getElementById('countB').value = '';
            document.getElementById('countC').value = '';
            document.getElementById('countH').value = '';

            document.getElementById('priceB').value = '';
            document.getElementById('priceC').value = '';
            document.getElementById('priceH').value = '';

        }
    </script>
    <!-- <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
</head>
<body>


    <header id = "header">
        <div id = "headBg">
            <img src="./bakery.png">
                <h2>빵빵 베이커리</h2>
        </div>
    </header>

    <div id = "menu">
    <h2>샌드위치 재료 선택</h2>
        <div class="tableDiv" >
            <!-- <form action="kioskMenu.php" method="get"> -->
                <div class="imgItem" id="bread" onclick="bread()"><img src="./img/bread.png"> <figcaption>빵</figcaption> </div>
                <div class="imgItem" id="cheese" onclick="cheese()" ><img src="./img/cheese.png" > <figcaption>치즈</figcaption> </div>
                <div class="imgItem" id="ham" onclick="ham()"><img src="./img/ham.png" > <figcaption>햄</figcaption> </div>
            <!-- </form> -->
        </div>

        <!-- <img src="./img/sandwhich.png" id="sandwhich"> -->
    </div>

    <div id = "order">

     <div id="menuCh">주문서

     <form action="kioskMenu.php" method="post">  
     
        <table id="odM">
            <tr>
                <td><input type="text" id="orderB" readonly>빵</td>
                <td><input type="text" id="countB" readonly >개</td>
                <td><input type="text" id="priceB" readonly>원</td>
            </tr>

            <tr>
                <td><input type="text" id="orderC" readonly>치즈</td>
                <td><input type="text" id="countC" readonly>개</td>
                <td><input type="text" id="priceC" readonly>원 </td>
            </tr>

            <tr>
                <td><input type="text" id="orderH" readonly>햄</td>
                <td><input type="text" id="countH" readonly>개</td>
                <td><input type="text" id="priceH" readonly>원 </td>
            </tr>

        </table>
            
        
        <hr>
        <div id="total">총 금액

            <input type="button" class="btn" value="주문하기" onclick="price()">
            <input type="button" class="btn" value="처음부터" onclick = "reset()">
        </div>
     </form>


     </div>
    
    </div>

    <img src="./sign.png" id="sign">
  
</body>
</html>