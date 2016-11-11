<!-- array
data를 연속적으로 저장하여 다루는 data type
특성
1)value, index
2)[]
3)array 생성 : array() -->
<?php
  //배열의 선언과 초기화
  $배열 = array(100,101,102);
  $과일들 = array('사과','배','포도','수박');

  //배열의 사용
  //1. 쓰기
  $숫자들[1]=201;
  $과일들[4] = '복숭아';
  //2. 읽기 : 배열이름[인덱스];
  echo "니가 먹고 싶은 과일은? ".$과일들[3]."<br/>";
//for과 섞어서 사용하기..
//foreach($배열이름 as $변수명){}
foreach($과일들 as $과일변수){
  echo "우리가 먹고픈 과일은 {$과일변수}입니다. <br/>";
}
//특이한 배열 : 연관 배열(연상 배열)
//1.인덱스가 문자열(key)
//2. key안에 value를 저장하는 형태
//(key -> value)
//$학생배열
//=array('학번'=>'1500000','이름'=>"홍길동");
//http://php.net/manual/kr/ref.array.php
//count(), array_push(), shuffle()
//array_unshift(), array_shift(), array_slice()
//array_splice(), sort();
//연관배열 중요
 ?>
<?php
$색깔들 = array("빨간색"=>'#ff0000',
"녹색"=>'#00FF00',
"파란색"=> '#0000ff',
"회색"=> '#807790',
"갈색"=> '#59172C');

foreach($색깔들 as $키=>$값){
echo "<div style='color:$값'>$키($값)</div>";
}
 ?>
