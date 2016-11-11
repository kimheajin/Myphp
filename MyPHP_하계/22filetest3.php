<?php
// [파일쓰기]
// 1) 경로에 파일쓰기 가능여부 조사
// 2) 파일이 이미 존재하는지 조사
// 3) 파일쓰기 가능여부 조사
// 4) 파일 쓰기
// [파일읽기]
// 1) 파일 존재여부 조사
// 2) 파일 읽기 가능한지 조사
// 3) 파일 읽기
$target_dir = dirname(__FILE__);
$target_file = $target_dir."/test.txt";
//현재 dir를 읽어오고 거기에 test.txt가 있는지 조사

if(!is_writable($target_dir)){
  echo "이 경로에는 파일 쓰기가 불가능합니다 : $target_dir";
  exit;
  //http://php.net/manual/kr/function.is-writable.php
}
if(file_exists($target_file)){
  if(!is_writable($target_file)){
    echo "파일은 존재하나 쓰기가 불가능합니다 : $target_file";
    exit;
  }
}
file_put_contents($target_file,"세월을 아껴라");

if(!file_exists($target_file)){
  echo "파일이 존재하지 않습니다 : $target_file";
  exit;
}
if(!is_readable($target_file)){
  echo "파일을 읽을 수 없음 : $target_file";
  exit;
}
$result = file_get_contents($target_file);

echo "읽은 내용입니다 : $result";
 ?>
