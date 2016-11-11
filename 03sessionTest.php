<?php
session_start();

$_SESSION['name']="김혜진"
$_SESSION['age']=20;

echo "<pre>";

print_r($_SESSION);
var_dump($_SESSION);

//unset($_SESSION['age']);

session_unset();
print_r($_SESSION);
echo session_id();

echo "<pre/>";
 ?>
