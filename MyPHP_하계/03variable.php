<?php

$a = 100;
$b = 200;
echo $a."<br/>";
$a = $b+1;
echo $a."<br/>";
//php는 변수에 $가 있어야 한다. _또한 쓸 수 있으며 숫자는 쓸 수 없다.
$a=300;
echo $a."<br/>";

$message = "하이루!";
echo $message."<br/>";

$message= $message."테스트";
echo $message."<br/>";

$사과값 = 1600;
$사과갯수 = 3;
$바나나값 = 1200;
$바나나갯수 = 6;
$사람수 = 3;
$세율 = 0.07;
$계산값 = $사과값*$사과갯수+$바나나값*$바나나갯수;
$세금=$계산값*$세율;

$총금액 = $계산값+$세금;
$와리깡=$총금액/$사람수;

echo "합계는 {$총금액}원, 일인당 {$와리깡}원입니다.";

$str = '3.14';
$v = 2*$str;
echo $v;
 ?>

<!-- php에서는 변수 선언 없음.
바로 정의한 뒤 사용.
변수 이름 앞에는 $가 있어야 한다.
$+변수이름 : 변수로 사용된다.-->
<?php
$name="김영진";
$age=20;
$hobby="소설을 쓴다.";
$image="http://www.oyegraphics.com/o/babies/babies_069.jpg";

echo "<html><body style='font-size:26px;'>\n";
echo "<h3>자기소개</h3>\n";
echo "<img src='$image' width='300'/><br/>";
echo "<ul>";
echo "<li>이름: {$name}</li>";
echo "<li>나이: {$age}</li>";
echo "<li>취미: {$hobby}</li>";
echo "</ul>";
echo "</body>";
echo "</html>";
 ?>
