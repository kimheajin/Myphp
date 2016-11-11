<?php
require_once('DBManager.php');

try {

  $db = connect();

  if (isset($_GET['mode'])=="insert") {


    $inid = $_POST['userid'];
    $inpass = $_POST['pass'];

      $stt = $db->prepare("SELECT * FROM login");

      $stt->execute();

       while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
         if($row['userid'] == $inid && $row['pass'] == $inpass){

           setcookie("userid",$row['userid']);

           if(isset($row['userid'])){
              header("Location:login_result_cookie.php");
          }

    }else{
      echo "<br>접속실패!! 아이디와 비밀번호를 다시 입력해주세요.<br/>";
    }
  }
//}if문
    }else {
      echo "아이디와 비밀번호를 입력해주세요.<br/>";
    }
?>
 <form action="login_cookie.php?mode=insert" method="post">
    ID :  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name=userid><br/>
    PASS : <input type="password" name=pass><br/>
    <input type="submit" name=submit value="Login"><br/>
</form>

<?php

}
catch (Exception $e) {
exit("DB접속 불가 : {$e->getMessage()}");
}
$db=NULL;        // 데이터베이스와의 접속 종료
?>
