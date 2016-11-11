<?php
// 1) 파일열기
// - fopen()
// fopen:http://php.net/manual/kr/function.fopen.php
// 파일핸들 = fopen(파일명, 열기옵션);
// 열기옵션
// - r : 파일 읽기 모드
// - w : 파일 쓰기 모드 (이전 내용 덮어쓰기, 초기화됨.)
// - a : 파일 추가 모드 (파일 포인터가 EOF로 이동됨)
// - r+, w+ : 읽고 쓰기 모드(차이는 레퍼런스 참조)
// 반환값 : 파일 핸들
$handle_r = fopen("old.txt","r");
$handle_w = fopen("new.txt","r");
// 2) 파일 사용 : 파일 핸들을 사용함
while(!feof($handle_r)){
//feof:http://php.net/manual/kr/function.feof.php
$line=fgets($handle_r);
$line=str_replace("old@","new@",$line);
//fgets : http://php.net/manual/kr/function.fgets.php
fwrite($handle_w,$line);
//fwrite:http://php.net/manual/kr/function.fwrite.php
}
// 3) 파일 닫기
fclose($handle_r);
fclose($handle_w);
echo "파일처리종료<br/>";

 ?>
