<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<?php
require_once('/DBManager.php');

try {
  $db = connect();
  $stt = $db->prepare("SELECT * FROM membership");
  $result = $stt->execute(
  // array(
  //   ':id'->$_POST['id'],
  //   ':name'->$_POST['name'],
  //   ':post_num'->$_POST['post_num'],
  //   ':address'->$_POST['address'],
  //   ':tel'->$_POST['tel'],
  //   ':age'->$_POST['age'])

  );
  $number = 1;
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
  <?php
  while ($row= $stt->fetch(PDO::FETCH_ASSOC)) {
    echo("
    <tr>
    <td>$number</td>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[post_num]</td>
    <td>$row[address]</td>
    <td>$row[tel]</td>
    <td>$row[age]</td>
    </tr>
    ");
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
