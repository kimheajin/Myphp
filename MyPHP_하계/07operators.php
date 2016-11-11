<?php
$i=2;
if($i>=1) echo "1"."입니다.";
if($i==2) echo "2"."입니다.";
if($i==3) echo "3"."입니다.";

$v =102;
if($v%2==0 && $v%3==0) {
  echo "<br/> {$v}는 2의 배수이고 3의 배수입니다.";
}

$v=50;
$v=$v+20;
echo "<br/>{$v}";
$v=50;
//echo "<br/>{$v+20}"; 사용불가
echo "<br/>{$v}";

$point = 12;
$point++;
echo "<br/>{$point}"; //위에서 point를 먼저 사용하고 더해주므로 여기서 echo의 결과는 13이다.

$a = 30;
echo "<br/>".++$a;

$a = 6;
$a*=2; //$a = $a*2; 축약형
echo "<br/>".$a;
?>
