<?php
Class Test{
Public $num;
Public function calc($p1, $p2){
$this->num=$p1+$p2;
//sum으로 하지 않음.
}

$obj1 = new Test();
$sob2 = &obj1;

 ?>
