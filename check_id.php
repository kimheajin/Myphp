<meta charset="kor">
<?php
   if(!isset($_GET['id'])){

  echo("아이디를 입력하세요.");
}
else{
  require_once "DBManager.php";
}
try{
      $dbo = connect();
      $sql = "select * from member where id = :id"; //place quer

      $stt=$dbo->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));

      $stt->execute(array(":id"=>$_GET['id']));
      $result= $stt->rowCount(); // rowCount


      if($result){
        echo "아이디가 중복됩니다!<br>";
        echo "다른 아이디를 사용하세요.!<br>";
      }else {
        echo "사용 가능한 아이디입니다.";
      }
      $dbo=null;
    }catch(PDOException $e){
      exit("에러 발생 : {$e->getMessage()}");
    }
 ?>
