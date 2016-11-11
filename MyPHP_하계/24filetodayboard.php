<?php
//echo $_SERVER['SCRIPT_NAME'];
$savefile = dirname(__FILE__)."/msg.txt";
$master_pw = 'algo';

if(isset($_POST['msg'])){
  $pass = isset($_POST['pass'])?$_POST['pass']:"";
  if ($pass!=$master_pw) {
    echo "정신차려";
    exit;
  }
  file_put_contents($savefile,$_POST['msg']);
  echo "저장완료";
  header("Location: http://127.0.0.1/myphp/25filetodayborder_read.php");
} else{
$self = $_SERVER['SCRIPT_NAME'];
echo <<<FORM
<form method="POST" action="$self">
  <textarea name="msg" cols="60" rows="10">
    이곳에 메시지를 입력하시오.
  </textarea><br/>
  패스워드: <input type="password" name="pass"/>
  <input type="submit" value="기록"/>
</form>
FORM;
}
 ?>
