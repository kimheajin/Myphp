<?php
require_once('DBManager.php');

try {

  $db = connect();

  if (isset($_GET['mode'])=="insert") { //if

    $inid = $_POST['userid'];
    $inpass = $_POST['pass'];

    echo "<br>아이디와 비밀번호를 입력해주세요.";


      $stt = $db->prepare("SELECT * FROM login");

      $stt->execute();

      while ($row = $stt->fetch(PDO::FETCH_ASSOC)) { //while문

        if($row['userid'] == $inid && $row['pass'] == $inpass){ //if문


        session_start();
        $_SESSION['userid'] = $row['userid'];

          if(isset($row['userid'])){
            header("Location:login_result.php");
          }
        }
        else{
        echo "로그인 실패!!<br/><br> 다시 입력해주세요";
        }//else문
    }//while문
  }else{
    echo "아이디와 비밀번호를 입력해주세요.<br/>";
  }

?>
<form action="login_session.php?mode=insert" method="post">
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
