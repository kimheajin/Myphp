<?php
function man($year,$month,$day,$b_year, $b_month, $b_day)
{
  if($b_month<$month)
    $age=$year-$b_year;
  else if($b_month==$month)
  {
    if($birth_day<=$now_day)
      $age=$year-$b_year;
    else
      $age=$year-$b_year -1;
  }
  else{
    $age=$year-$b_year-1;
  }
  return $age;
}
$now_year=2016;
$now_month=09;
$now_day=29;

$birth_year=1993;
$birth_month=2;
$birth_day=9;

$your_age=man_age($now_year, $now_month,$now_day,$birth_year,$birth_month
,$birth_day);

echo "오늘 날짜 : ".date("Y년 m 월 d 일")."<br>";
echo "생년 월일 : $birth_year년 $birth_month 월 $birth_day 일생<br/>";
echo "만 나이 : $year_age 세";
 ?>
