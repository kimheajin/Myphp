<?php
$tel = "010-2777-3333";

$num_tel = strlen($tel);  //문자열 길이 계산
echo "strlen()함수 사용 : $num_tel<br>";

$tel1=substr($tel,0,3);
$tel2=substr($tel,4,4);
$tel3=substr($tel,9,4);

echo "substr()함수 사용 : $tel1 $tel2 $tel3<br/>";

$phone = explode("-", $tel);    //하이픈(-)을 기준으로 문자열 분리

echo "explode() 함수 사용 : $phone[0] $phone[1] $phone[2]<br>";
 ?>
