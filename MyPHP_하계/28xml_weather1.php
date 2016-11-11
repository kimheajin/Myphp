<?php
$weather_data_url = "http://weather.livedoor.com/forecast/rss/area/400010.xml";
$s = trim(@file_get_contents($weather_data_url));
//http://php.net/manual/kr/function/trim.php
//@에러 발생시 오류 메시지 표시 안함.
//echo $s;
$xml = simplexml_load_string($s);
//http://php.net/manual/kr/function.simplexml-load-string.php
//print_r($xml);
//http://php.net/manual/kr/function.simplexml-load-string.php
$title = $xml->channel->title;
echo "※ $title<br/>";
//php내에서 xml객체에 요소 접근법
//$XML객체명->엘리먼트->엘리먼트
//$xml->channel->item[4]
foreach($xml->channel->item as $val){
  $val_title = strval($val->title);
  echo "  -  $val_title<br/>";
}
 ?>
