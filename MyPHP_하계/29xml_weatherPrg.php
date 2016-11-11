<style>
  h3{
    background-color: red;
    color: white;
    padding: 8px;
  }
</style>
<?php
$weather_url = "http://weather.livedoor.com/forecast/rss/area/400010.xml";
$save_file = "comment.log";

$m = isset($_GET['m'])?$_GET['m']:"";
//m의 값이 set되있으면 m을 출력 아니면 default값을 출력한다.
switch ($m) {
  case "write": writeComment(); break;
  case "show": display(); break;
  default: display(); break;
}

function display(){
  global $weather_url;
  $info = load_log();
  $tag = date("Y-m-d");

  if(empty($info[$tag])){ //정보가 비어있다면 실행.
  //empty:http://php.net/manual/kr/function.empty.php
  //정보를 가져온다.
  $s = trim(@file_get_contents($weather_url));
  $xml = simplexml_load_string($s);
  $list = array();
    foreach($xml->channel->item as $var){
      $list[] = strval($val->title);
    }
    $info[$tag] = array("yohou"=>$list);
    save_log($info); //한번은 읽은적이 있음
  }
  //화면출력

  $info = array_reverse($info); //array_reverse는 거꾸로 정보를 만듦
  $self = $_SERVER["SCRIPT_NAME"];
  foreach($info as $key => $item){
    $yohou_h = htmlspecialchars(implode("\n",$item["yohou"]));
    //implode:http://php.net/manual/kr/function.implode.php
    //implode:http://php.net/manual/kr/function.explode.php
    //implode:http://php.net/manual/kr/function.split.php
    //문자열로 배열 원소를 결합
    echo "<h3>$key</h3>";
    echo "<pre>$yohou_h</pre>";
    echo "<form action='$self'>";
    echo "<input type='hidden' name='m' value='write'/>";
    echo "<input type='hidden' name='tag' value='$key'/>";
    echo "코멘트 : ";
    echo "<input type='text' name='memo' value=''/>";
    echo "<input type='submit' value='쓰기'/>";
    echo "</form>";

    $comment = isset($val["comment"])?$val["comment"]:array();
    foreach ($comment as $row) {
      //row 가 html로 변형됨
      $row_h = htmlspecialchars($row);
      echo "<div>→{$row_h}</div>";
  }
}

function writeComment()
{
  $info = load_log();
  $tag = isset($_GET["$tag"])?$_GET["$tag"]:"";
  $memo = isset($_GET["$memo"])?$_GET["$memo"]:"";

  if(empty($info[$tag]["comment"])){
    $info[$tag]["comment"]= array();
  }
  $info[$tag]["comment"][] = $memo;
  //배열의 요소의 제일 마지막에 입력되있는 메모리 정보를 문자열로 저장.
  save_log($info); //save_log로 info배열을 저장한다.

  header("location:".$_SERVER['SCRIPT_NAME']);
}

function save_log($info){
  global $save_file;
  file_put_contents($save_file,serialize($info));
}

function load_log(){
  global $save_file;
  $info = array();
  if(file_exists($save_file)){
    $info = unserialize(file_get_contents($save_file));

  }
  return $info;
}
?>
