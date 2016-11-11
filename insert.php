<meta charset="kor">
<?php
   $hp = $_POST['hp1']."-".$_POST['hp2']."z-".$_POST['hp3'];
   //$_SERVER
   $email = $_POST['email1']."@".$_POST['email2'];

   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
   //$ip = $REMOTE_ADDR;         // �湮���� IP �ּҸ� ����
   //ip가 계속 바뀌기 때문에 지금은 있어도 필요가 없다.

   require_once "./DBManager.php";
   //include "../lib/dbconn.php";       // dconn.php ������ �ҷ���

   try {

     $db = connect();

     $sql = "select * from member where id=':id'";

     $stt = $db -> prepare($sql,
     array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
   $stt->execute(array(":id"=>$_POST['id']));

   $result = $stt->rowCount();


   if($result){
     echo ("
      <script>
        whindow.stat('해당아이디가 존재함.');
        history.go(-1);
      <script>
     ");
     exit;
   }else{
    $sql = "insert into member(id, pass, name, nick, hp,email, regist_day,level)";
    $sql.="values(:id, :pass,:name,:nick,:hp,:email,:regist_day,:level)";
    $stt=$db->prepare($sql,
    array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL)
  );
  $stt->execute(
  array(':id'=>$_POST['id'],
  ':pass'=>$_POST['pass'],
  ':name'=>$_POST['name'],
  ':nick'=>$_POST['nick'],
  ':hp'=>$hp,
  ':email'=>$email,
  ':regist_day'=>$regist_day,
  ':level'=>9
    )
  );
   if($result){
     echo("
     <script>
     location.href='./index.php';
     </script>
     ");
    }
   }
 }catch (PDOException $e) {
     exit("DB접속 불가 : {$e->getMessage()}");
 }
 $db=NULL;        // 데이터베이스와의 접속 종료
 ?>
