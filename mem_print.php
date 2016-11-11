<?php
require_once('/DBManager.php');

$id = $_POST['id'];
$name = $_POST['name'];
$passwd = $_POST['passwd'];
$passwd_confirm = $_POST['passwd_confirm'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$phone3 = $_POST['phone3'];
$address = $_POST['address'];
$movie = $_POST['movie'];
$book = $_POST['book'];
$shop = $_POST['shop'];
$sport = $_POST['sport'];
$intro = $_POST['intro'];
$title = $_POST['title'];


try {
  echo
} catch (Exception $e) {

}



?>

<!-- $num = 1;
$id = $_POST['id'];$name = $_POST['name'];
$passwd = $_POST['passwd'];$passwd_confirm = $_POST['passwd_confirm'];
$gender = $_POST['gender'];
$address = $_POST['address'];$movie = $_POST['movie'];
$book = $_POST['book'];$shop = $_POST['shop'];
$sport = $_POST['sport'];$intro = $_POST['intro'];
$title = $_POST['title'];
$tel = $_POST['phone3'];

try {
  $db = connect();
  $stt = $db->prepare("INSERT INTO mem VALUES(:num, :id, :name, :gender, :address, :tel)");
  $result = $stt->execute(
  array(':num'=>$num,
   ':id'=>$id,
   ':name'=>$name,
   ':gender'=>$gender,
   ':address'=>$address,
   ':tel'=>$tel
   )
);
while ($row= $stt->fetch(PDO::FETCH_ASSOC)) {
  echo $row['$num'];
  echo $row['$id'];
  echo $row['$name'];
  echo $row['$gender'];
  echo $row['$address'];
  echo $row['$tel'];
}
 if($result){
   print '데이터 입력 성공';
 }else{
   print '데이터 입력 실패';
 }
} catch (Exception $e) {
exit("DB접속 불가 : {$e->getMessage()}");
}
$db=NULL; -->
