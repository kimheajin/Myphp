<?php
date_default_timezone_set("Asia/Seoul");
//php.ini파일 내의 [Date]항목
//date.timezon = Asia/Seoul 로 설정되어 있으면 생략가능
//현재 시각을 UNIX Epoch(POSIX)시간으로 알아내기
//초단위
$now = time();
//http://php.net/manual/kr/function.time.php
echo $now;

//date(서식[,타임스템프]);
//http://php.net/manual/kr/function.date.php
function show_div($color,$str){
  $str=htmlspecialchars($str); //이 htmlspecialchars는 호출해 주는 편이 좋다.
  echo "<div style='color:$color;'>$str</div>";
}
show_div("red",date("Y/m/d",$now));
show_div("red",date("H:i:s",$now));
show_div("blue",date("Y-m-d",$now));
show_div("blue",date("Y년m월d일",$now));
show_div("green",date("H시i분s초",$now));
show_div("cyan",date("Y년m월j일",$now));
show_div("cyan",date("Y/m/d l",$now));
show_div("brown",date("c",$now));
show_div("brown",date("r",$now));

//strftime(서식[,타임스탬프]);
//

echo date("Y-m-d H:i:s")."<br/>";
echo strftime("%Y-%m-%d %H:%M:%S")."<br/>";

$today = time();
$result = $now+3*24*60*60;
echo "오늘은 ".date("Y년 m월 d일", $today)."<br/>";
echo "3일 후는 ".date("Y년 m월 d일", $result)."<br/>";
$result = $today-5*24*60*60;
echo "5일 전은 ".date("Y년 m월 d일",$result)."<br/>";
//strtotime() : http://php.net/manual/kr/function.strtotime.php
//mktime(시,분,초,월,일,년) : http://php.net/manual/kr/function.mktime.php

$name = '현지학기 출발일';
$yotei = strtotime("2016-07-31");
$오늘 = time();

$interval = $yotei-$오늘;

$days = ceil($interval/(24*60*60));

//echo $days."<br/>";
echo "<p>오늘은 ".date("Y년 m월 d일",$오늘)."</p>";
echo "<p>출발일은 ".date("Y년 m월 d일",$yotei)."</p>";
echo "<p>{$name}까지 앞으로 앞으로 {$days}일 남았습니다."."</p>";

$t = strtotime("next monday",time());
echo "다음주 월요일은 ".date("Y년 m월 d일",$t)."<br/>";
 ?>
