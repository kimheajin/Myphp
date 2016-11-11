<?php
session_start();

echo "세션 시작!";

$_SESSION['userid']="mywd";
$_SESSION['username']="김혜진";
$_SESSION['time']=time(); //현재 시각

echo "세 개의 세션 변수 등록 완료!<br>";
echo $_SESSION['userid']."<br>";
echo $_SESSION['username']."<br>";
echo $_SESSION['time']."<br>";
 ?>
