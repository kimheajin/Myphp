<?php
require_once 'DBManager.php';

try {
  $db=connect();
  // $sql='DELETE FROM stud_score where num=$num';
  $num = $_POST['num'];
  $stt = $db->prepare('DELETE FROM stud_score where num=$num');
  $result = $stt->execute();
  if($result){
    print '데이터 입력 성공';
  }else{
    print '데이터 입력 실패';
  }
  // 데이터 베이스 선택
} catch (PDOException $e) {
  exit("DB접속 불가 : {$e->getMessage()}");
}

header("Location:score_list.php");
 $db=NULL;        // 데이터베이스와의 접속 종료
 ?>
