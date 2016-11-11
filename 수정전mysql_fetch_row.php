<?php
require_once('/DBManager.php');

try {
  $db = connect();
  $stt= $db->prepare("SELECT * FROM membership WHERE address like '%서울%' order by age");
  $result = $stt->execute();
  $number = 1;
  $fields = mysql_num_fields($result);
  ?>
  <h2>▶ mysql_fetch_array()를 이용한 데이터 읽기</h2>
  <table widht="800" border="1" cellpadding="10">
    <tr align = "center">
      <td bgcolor="#cccccc">일련번호</td>
      <td bgcolor="#cccccc">아이디</td>
      <td bgcolor="#cccccc">이름</td>
      <td bgcolor="#cccccc">우편번호</td>
      <td bgcolor="#cccccc">주소</td>
      <td bgcolor="#cccccc">전화번호</td>
      <td bgcolor="#cccccc">나이</td>
    </tr>
  <?

$result_array = $stmt->fetchAll();

//레코드셋에 row가 있는지 확인
if(count($result_array)){

foreach($result_array as $row){

//여기서 필요한 처리를 진행...

}

}
  while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td> $number </td>";

    for ($i=0; $i < $fields; $i++) {
      echo "<td> $row[$i] </td>";
    }
    echo "<tr>";
    $number++;
  }
  if($result){
    print '데이터 입력 성공';
  }else{
    print '데이터 입력 실패';
  }
} catch (Exception $e) {
 exit("DB접속 불가 : {$e->getMessage()}");
}
$db=NULL;
?>
</table>
