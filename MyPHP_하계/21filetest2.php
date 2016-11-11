<?php
echo "<br/>".__FILE__;
//현재 php파일의 경로를 가지고 있는 상수
echo "<br/>".dirname(__FILE__);
//dirname은 부모 디렉토리의 경로를 반환
$target_dir = dirname(__FILE__);
$target_file = $target_dir."/test.txt";
file_put_contents($target_file,"세월이아");
//file_put_contents(경로, 내용);
$STR = file_get_contents($target_file);

echo "<br/>파일로부터 읽는 내용: ".$str;

$txt = file_get_contents("old.txt");
echo "<br/>$txt";
$txt = str_replace("old@yjc.ac.kr","new@yjc.ac.kr",$txt);

echo "<br/>$txt";
file_put_contents("new.txt",$txt);
echo "<br/> ok!";
 ?>
