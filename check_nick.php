<meta charset="euc-kr">
<?php
   if(!isset($_GET['nick']))
   {
      echo("닉네임을 입력하세요.");
   }
   else
   {
      require_once "./DBManager.php";
    }
    try {

      $db = connect();

      $sql = "select * from member where nick=:nick ";

      $stt=$db->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));

      $stt->execute(array(":nick"=>$_GET['nick']));
      $result= $stt->rowCount(); // rowCount

      // $result = mysql_query($sql, $connect);
      // $num_record = mysql_num_rows($result);

      if ($result)
      {
         echo "닉네임이 중복됩니다.<br>";
         echo "다른 닉네임을 사용하세요.<br>";
      }
      else
      {
         echo "사용가능한 닉네임입니다.";
      }
    } catch (Exception $e) {
      exit("DB접속 불가 : {$e->getMessage()}");
    }
    $db=null;
?>
