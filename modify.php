<?php
	session_start();
?>
<meta charset="utf-8">
<?php
   $hp = $_POST['hp1']."-".$_POST['hp2']."-".$_POST['hp3'];
   $email = $_POST['email1']."@".$_POST['email2'];
   $regist_day = date("Y-m-d (H:i:s)");

	 $pass = $_POST['pass'];
	 $name = $_POST['name'];
	 $nick = $_POST['nick'];
	 $userid = $_SESSON['userid'];



	 require_once "./DBManager.php";
	 try {
		 $db = connect();

		 $sql = "update member set pass=':pass', name=':name' , ";
		 $sql .= "nick=:nick, hp=:hp, email=:email, regist_day=:regist_day where id=:userid";

		 $stt = $db -> prepare($sql,[PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL]);

		 $stt->excute(
		 [
			 ':pass'=>$pass,
			 ':name'=>$name,
			 ':nick'=>$nick,
			 ':hp'=>$hp,
			 ':email'=>$email,
			 ':regist_day'=>$regist_day,
			 ':id'=>$userid
		 ]
	 );

	//  if($res){ 단순히 체크하는 코드
	// 	 echo "수정 성공!";
	//  }else{
	// 	 echo "수정 실패!";
	//  }

	 $db=NULL;
	 } catch (Exception $e) {
		 exit("예외 발생 {$e->getMessage()}");
	 }

	 header("Location:./index.php");
?>
