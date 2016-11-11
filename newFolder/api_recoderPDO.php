<?php
$dns = 'mysql:host=127.0.0.1;port=3306;dbname=wd2j_db';
$usr='root'; $pass='0000';
//$connect = mysqli_connect("localhost","root","0000","wd2j_db");

try {

  $db = new PDO($dns, $usr, $pass);
  print '성공!';

  $stt = $db->prepare("insert into biz_card values(num, name, company, tel, hp, address)");
  //$sql = "insert into biz_card (num, name, company, tel, hp, address) values(2, '원선우','미래전자','031-276-1829','010-8723-2837','경기도 용인시 번지')";
  //$result=mysqli_query($connect,$sql);
  $result = $stt -> execute(
    array(
      ':num'=>"3",
      ':name'=>"원선우",
      ':company'=>"미래전자",
      ':tel'=>"031-276-1829",
      ':hp'=>"010-8888-7907",
      ':address'=>"경기도 용인시 번지")
);

  if($result){
    echo "레코드 삽입ok";
  }else{
    echo "레코드 삽입no";
  }
} catch (PDOException $e) {
    exit("접속불가:{$e->getMessage()}");
}
$db=NULL;
//mysqli_close($connect);
 ?>
