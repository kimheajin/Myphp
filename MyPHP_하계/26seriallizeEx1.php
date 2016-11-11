<?php
// http://php.net/manual/function.serialize.php
// http://php.net/manual/function.unserialize.php


$savefile = dirname(__FILE__)."/bbslog.txt";

$mode = isset($_GET['mode'])?$_GET['mode']: "show";
switch ($mode) {
  case 'show':
    show();
    break;
  case 'write':
    write();
    break;
  case 'reset':
    reset_fun();
    break;
  default:
    show();
    break;
}

function reset_fun() {
  save_data(array());
  $self = $_SERVER["SCRIPT_NAME"];
  echo "<a href = '$self'> 게시판 초기화 완료! </a>";
}


function show() {
  show_form();
  $log = load_data();
  echo "<ul>";
  foreach ($log as $item) {
    $name = htmlspecialchars($item['namae']);
    $body = htmlspecialchars($item['body']);
    echo "<li><b style='color: red;'> $name </b>: $body</li>";
  }
}

function load_data() {
  global $savefile;
  $log = array();
  if (file_exists($savefile)) {
    $txt = file_get_contents($savefile);
    $log = unserialize($txt);
  }
  return $log;
}



function write() {
  if($_GET['namae']=="" || $_GET['body']=="") {
    echo "이름이나 본문이 비어있다. 다시 적으라!";
    exit;
  }
  $log = load_data();
  array_unshift($log, $_GET);
  save_data($log);
  $self = $_SERVER['SCRIPT_NAME'];
  echo "<a href ='$self'>저장</a>";
}



function save_data($savedata) {
  global $savefile;
  $txt = serialize($savedata);
  file_put_contents($savefile, $txt);
}



function show_form() {

  echo <<<FORM

  <form style='display: inline;'>
    ★이름: <input type='text' name='namae' size='8'>
    본문: <input type='text' name = 'body' size='30'>

    <input type='submit' value='쓰기'>
    <input type='hidden' name='mode' value='write'/>
  </form>
  <form style='display: inline;'>
    <input type='submit' value='초기화'>
    <input type='hidden' name='mode' value='reset'/>
  </form>
  <hr>

FORM;

}



 ?>
