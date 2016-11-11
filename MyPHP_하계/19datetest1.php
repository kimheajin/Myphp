<?php
$year = 2016;
$mon = 8;
$cur = strtotime("$year-$mon-1");
for(;;){ //무한루프
  $cur_mon = intval(date("m",$cur));
  $d = date("d",$cur);
  if($cur_mon > $mon) break;
  echo "[$d]";
  $cur +=24*60*60;
}
 ?>
<h3>8월 예정</h3>
<?php
showStyleTag();
$yotei = array(13=>"조별문화체험", 14=>"조별문화체험",
               15=>"조별문화체험", 29=>"기업견학", 1=>"일본도착");
showCalendar(2016,8,$yotei);

function showCalendar($년, $월, $예정){
  $요일배열 = array("일","월", "화", "수", "목", "금", "토");
  $색깔배열 = array(0=>"#fff0f0", 6=>"#f0f0ff");
  $cur = strtotime("$년-$월-1");
  echo "<table>";
  for(;;){
    $cur_mon = intval(date("m",$cur));
    //$cur변수의 월번호 구하기
    if($cur_mon > $월) break;

    $d = date("d",$cur);
    //cur변수의 일자 구하기
    $w = date("w",$cur);
    //cur변수의 요일 구하기

    $요일명 = $요일배열[$w];
    $색깔 = isset($색깔배열[$w])?$색깔배열[$w]:"white";
    $i = intval($d);
    $예정문자열 = isset($예정[$i])?$예정[$i]:"없음";

    echo "<tr style='background-color:{$색깔}'>";
    echo "<td>$d</td><td>$요일명</td><td>$예정문자열</td>";
    echo "</tr>";
    $cur +=24*60*60;
  }
  echo "</table>";
}
function showStyleTag(){
  echo <<<MYSTYLE
  <style>
  table{
    border-top:solid 1px black;
    border-collapse:collapse;
    border-spacing:0;
  }
  td{
    border-bottom: solid 1px black;
    padding : 6px;
    margin : 0px;
  }
  </style>
MYSTYLE;
}
 ?>
<?php
$cur = strtotime("2016-8-1");
echo "<br/> 해당 월의 마지막 날: ".date("t",$cur);

$y=2017;
echo (date("L",strtotime("$y-1-1"))==1)?"<br/>윤년":"<br/>평년";
 ?>
