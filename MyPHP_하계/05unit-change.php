<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>인치에서 센치로</title>
    <style>
      body{
        font-size: 28px;
        background-color: #cccccc;
      }
    </style>
  </head>
  <body>

    <h1>인치에서 센치로 변환하는 프로그램</h1>
    <?php
      //isset : http://php.net/manual/kr/function.isset.php
    if(isset($_POST["cm"])&&isset($_POST["kg"])){
      $cm = $_POST["cm"];
      $kg = $_POST["kg"];
      $cm = floatval($cm);
      $kg = floatval($kg);
      //floatval : http://php.net/manual/kr/function.floatval.php
      $bmi= $kg/pow($cm/100,2);
      $bmi= round($bmi,2);
      echo "<div> (결과) 몸무게 : {$kg}는 BMI지수 : {$bmi} 입니다. </div>";
    }
    else {
      $self = $_SERVER["SCRIPT_NAME"]; //현재 소스코딩중인 파일의 URL주소 알아내기
                                        //./05unit-change.php
      //http://php.net/manual/kr/reserved.variables.server.php

      echo "<form action='$self' method='POST'>";
      echo "신장 : ";
      echo "<input type='text' name='cm' value=''/><br/>";
      echo "체중 : ";
      echo "<input type='text' name='kg' value=''/><br/>";
      echo "<input type='submit' value='계산'/>";
      echo "</form>";
    }

     ?>
  </body>
</html>
