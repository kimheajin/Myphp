<?php
$connect = mysqli_connect("localhost","root","0000","wd2j_db");

$sql = "insert into biz_card (num, name, company, tel, hp, address) values(2, '원선우','미래전자','031-276-1829','010-8723-2837','경기도 용인시 번지')";
$result=mysqli_query($connect,$sql);

if($result){
  echo "레코드 삽입ok";
}else{
  echo "레코드 삽입no";
}
mysqli_close($connect);
 ?>
