<?php
require_once('DBManager.php');

try {

  $mid = $_COOKIE['userid'];

  $db = connect();

  echo "<br>아이디와 비밀번호를 입력해주세요.";

        echo "<div>";
        echo "<h2>로그인 성공!";
        echo "<strong>".$mid."</strong>";
        echo "님 환영합니다.</h2>";
        echo "</div>";
}//try

catch (Exception $e) {
exit("DB접속 불가 : {$e->getMessage()}");
}
$db=NULL;        // 데이터베이스와의 접속 종료
 ?>

<!--  SESSION으로 하는 PHP 로그인 페이지
 require_once('DBManager.php');

 try {
   session_start();

   $mid = $_SESSION['userid'];

   $db = connect();

   echo "<br>아이디와 비밀번호를 입력해주세요.";

         echo "<div>";
         echo "<h2>로그인 성공!";
         echo "<strong>".$mid."</strong>";
         echo "님 환영합니다.</h2>";
         echo "</div>";
 }//try

 catch (Exception $e) {
 exit("DB접속 불가 : {$e->getMessage()}");
 }
 $db=NULL;        // 데이터베이스와의 접속 종료
   -->
