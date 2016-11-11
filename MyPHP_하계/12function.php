<?php
function myAdd($a,$b)
{
$c = $a+$b;
return $c;
}

echo myAdd(4,6)."<br/>";
echo myAdd(5,5)."<br/>";
echo myAdd(2,8)."<br/>";

function set_cvalue(){
  $c=30;
}
$c=10;
set_cvalue();
echo $c."<br/>";

function set_cvalue2(){
  global $c;
  $c=30;
}
$c=25;
set_cvalue2();
echo $c."<br/>";
?>
