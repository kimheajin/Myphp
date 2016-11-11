<?php
function connect(){
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=wd2j_db';
$usr = 'root';
$pass = '';

try {
  $dbo=new PDO($dsn,$usr,$pass);
  print '접속성공!';
} catch (Exception $e) {
  //pdoexception설명
  //http://php.net/manual/kr/class.pdoexception.php
  exit("DB접속 불가 : {$e->getMessage()}");
  }
  return $dbo;
}
function data_seek($ress,$idx)
{
  return $ress[$idx];

}
 ?>
