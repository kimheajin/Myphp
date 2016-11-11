<?php
require_once('DBManager.php');
  try {
    $db = connect();

    $uid = setcookie("userid",$_POST['userid']);
    $ups = setcookie("userpass",$_POST['pass']);

      if ($_GET['mode']=="insert") {

        $id = $_COOKIE['userid'];
        $pass = $_COOKIE['userpass'];

        $stt = $db->prepare("SELECT * FROM usertest");

        $result = $stt->execute(
         array(
           ':id'=>$id,
           ':pass'=>$pass
         )
        );
        // if(isset($id and $pass)){
        //   echo "로그인 되었습니다. $id님 환영합니다.";
        //}

        if($result){
            print '데이터 입력 성공';
          }else{
            print '데이터 입력 실패';
          }
      }
    } catch (PDOException $e) {
          exit("DB접속 불가 : {$e->getMessage()}");
      }
        $db=NULL;        // 데이터베이스와의 접속 종료
        ?>
 <form action="cookie1.php?mode=insert" method="post">
   <!-- <input type="hidden" name="mode" value="insert"> -->
    ID :  &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name=userid><br/>
    PASS : <input type="text" name=pass><br/>
    <input type="submit" name=submit value="Login"><br/>
 </form>

<?php
// while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
//   echo "아이디".$row['$id']."님 어서오세요.";
// }
// if($result){
//     print '데이터 입력 성공';
//   }else{
//     print '데이터 입력 실패';
//   }
// } catch (PDOException $e) {
// exit("DB접속 불가 : {$e->getMessage()}");
// }
// $db=NULL;        // 데이터베이스와의 접속 종료
?>
