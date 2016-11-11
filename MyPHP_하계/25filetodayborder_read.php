<h1>주인장 추천메뉴</h1>
<?php
$savefile=dirname(__FILE__)."/msg.txt";
if(!file_exists($savefile)){
  echo "아직 저장된 파일이 없음";
  exit;
}
$msg = file_get_contents($savefile);
$msg_html=htmlspecialchars($msg);
$msg_html=str_replace("\n","<br/>",$msg_html);

echo <<<HTML
<div style='border:dashed 3px red; padding:12px;'>
<div style='font-size:26px; color:blue;'>
$msg_html
</div>
</div>
HTML;
 ?>
