<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>나이 계산</title>
    <style>
      body{
        font-size: 28px;
        background-color: #cccccc;
      }
    </style>
  </head>
  <body>
    <form>
      <select name="year">
        <option>생년을 선택하시오.</option>
        <?php
        $this_year = date("Y");
        //DATE : http://php.net/manual/kr/function.date.php
        //Y :	연도의 완전한 숫자 표현, 4 숫자
        //date("m"), date("d"), date("Y-m-d"), date("H:i:s");
        $end_year=$this_year-100;
        $y=$this_year;
        for($y=$this_year;$y>=$end_year;$y--){
          echo "<option value='$y'>서기{$y}년</option>";
        }
         ?>
      </select>
      <input type="submit" value="계산"/>
    </form>
    <?php
    if(isset($_GET['year'])){
      echo "올해".($this_year-intval($_GET['year']))."세입니다.";
    }
     ?>
  </body>
  </html>
