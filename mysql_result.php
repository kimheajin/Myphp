
<?php

  require_once "./DBManager.php";

  try{
    $db = connect();

    $stt = $db->prepare("select * from membership where address like '%서울%' order by age");

    $result = $stt -> execute();

    $records=$stt ->rowCount();

    $fileds = $stt->columnCount();

    //$records = mysql_num_rows($result);

    //$fields=mysql_num_fields($result);

    $number = 1;
?>
<h2>▶ mysql_result()를 이용한 데이터 읽기</h2>
<table width= "800" border="1" cellspacing="0" cellpadding="5">
<tr align="center">
  <td bgcolor="#cccccc">일련번호</td>
  <td bgcolor="#cccccc">아이디</td>
  <td bgcolor="#cccccc">이름</td>
  <td bgcolor="#cccccc">우편번호</td>
  <td bgcolor="#cccccc">주소</td>
  <td bgcolor="#cccccc">전화번호</td>
  <td bgcolor="#cccccc">나이</td>
</tr>
<?php

for ($i = 0; $i < $records; $i++)
{
   echo "<tr>";
   echo "<td> $number </td>";

   for ($j = 0; $j < $fields; $j++)
   {
       $data = fetchColumn($result, $i, $j);
       echo "<td> $data </td>";
   }

   echo "</tr>";

   $number++;
      }
  }

catch (Exception $e) {
  exit("예외발생 {$e->getMessage()}");
}
$db = null;
?>
</table>
