<?php
$score=array(array(88, 98, 96, 77, 63),array(86, 77, 66, 86, 93),
array(74, 83, 95, 86, 97));
//학생 점수를 배열에 담는다. 2차원배열!

//입력된 점수와 배열의 인덱스 출력
for($loop=0; $loop<3; $loop++){ //각각의 배열에 있는 학생 점수를 출력
  for($re=0; $re<5; $re++){ //5명씩 출력하기 위해 이중for문을 쓴다.
    echo "\$score[$loop][$re]=".$score[$loop][$re]."<br/>";
  }
  echo "<br/>";
}

//위와 같은 방식으로 한번 더
for($loop=0; $loop<3; $loop++){
  $sum=0;
  for($re=0; $re<5; $re++){
    $sum=$sum+$score[$loop][$re];
  }
  $avg=$sum/5;
  echo "$loop번째 학생의 점수 => 합계 : $sum, 평균 : $avg <br/>";
}
 ?>
