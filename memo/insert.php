<?php session_start(); ?>
<meta charset="euc-kr">
<?
if (!isset()) {
	# code...
}
	if(!$userid) {
		echo("
		<script>
	     window.alert('�α��� �� �̿��� �ּ���.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	if(!$content) {
		echo("
	   <script>
	     window.alert('������ �Է��ϼ���.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	$regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����

	require_once "../lib/dbconn.php";       // dconn.php ������ �ҷ���
	$db = connect();

try {
	$sql = "select * from member where id=:userid";
	$stt = $db ->prepare($sql,
	[
		PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL
	]
);

$stt ->execute([
	':userid'=>$_SESSION['userid'],
	':name'=>$_SESSION['name'],
	':nick'=>$_SESSION['nick'],
	':content'=>$_SESSION['content'],
	':regist_day'=>$regist_day
]);

$name = $row['name'];
$nick = $row['nick'];

$sql = "insert into memo (id, name, nick, content, regist_day) ";
$sql .= "values('$userid', '$name', '$nick', '$content', '$regist_day')";

mysql_query($sql, $connect);  // $sql �� ������ ���� ����

}
$db = null;
echo "
	 <script>
		location.href = 'memo.php';
	 </script>
";
catch (Exception $e) {
 exit("DB처리 에러: {$e->getMessage()}");
}

?>
