<?php
//세션
//session_start : http://php.net/manual/kr/function.session-start.php
session_start(); //세션시작
//세션정보삭제
//unset($_SESSION["변수명"]);
//unset($_SESSION["history"]);


$list = array(
  "금가방"=>300,
  "은지갑"=>150,
  "진주피어스"=>120,
  "다이아반지"=>250
);
echo "<h3>상품리스트</h3><ul>";
$self = $_SERVER['SCRIPT_NAME'];
foreach($list as $key => $val){
  $p = urlencode($key);
  //urlencode:http://php.net/manual/kr/function.urlencode.php
  echo "<li><a href='$self?p=$p'>$key({$val} 만원)</a></li>";
}
echo"</ul>";

  if(isset($_GET['p'])){
    $item = $_GET['p'];
    if(!isset($list[$item])){
      echo "선택한 상품은 구매할 수 없음.";
      exit;
    }
    $history = array(); //숫자로 index된 배열
    if(isset($_SESSION['history'])){
      $history = $_SESSION['history'];
    }
    $history[]=array("item"=>$item, "time"=>time()); //연관배열
    //$history[0]=>item:item명, time:시간
    $_SESSION['history']=$history;
    echo "<h2>구매 상품: $item</h2>";
  }
  if(isset($_SESSION['history'])){
    echo "<h3>구매이력</h3>";
    $history=$_SESSION['history'];
    foreach($history as $val){
      $name = $val["item"];
      $time = date("m/d H:i:s", $val["time"]);
      $price = $list[$name];
      echo "<li>$time: $name({$price}만원) 구매</li>";
    }
    echo "</ul>";
  }
 ?>
