<?php
$sum = 0;
for($free = 0; $free<=100; $free++){

if($free%5==0){
  $sum = $sum + $free;
  }

}
echo "1에서 100까지의 5의배수 합계 : $sum";
 ?>
