<?php
//include, include_once, require, require_once
require_once 'DBManager.php';

try {
  $db=connect();
  $sql="INSERT INTO user_data VALUES(:id, :name, :zipcode, :address)"
  //prepared SQL문(place holder)

  $pdoSstt=$db->prepare(
  $sql,
  array(PDOl::ATTR_CURSOR=>PDO::CURSOR_SCROLL)
);
$res = $pdoStt->excute(
 array(':id'=>$_POST['id'],
  ':name'=>$_POST['name'],
  ':zipcode'=>$_POST['zipcode'],
  ':address'=>$_POST['address']
  )
);
$db=NULL;
if($res){
  print '데이터 입력 성공';
}else{
  print '데이터 입력 실패'
}
} catch (Exception $e) {
  exit("DB접속 불가 : {$e->getMessage()}");
}

 ?>


<?php
require_once 'DBManager.php/'
try {
  $db = connect();
  $stt=$db->prepare('쿼리문');
  $stt=execute();
  while ($row= $stt->fetch(PDO::FETCH_ASSCO)) {
    $row['컬럼명'];

  }
} catch (Exception $e) {

}

 ?>
