<?php
$script_name = $_SERVER['SCRIPT_NAME'];
$db = null;
$page_max = 3;

if(isset($_GET['id'])){
  $log_id = $_GET['id'];
}else{
  $log_id=0;
}
if($query!=""){
  $host = "127.0.0.1";
  $db_name = "phptest";
  $user = "root";
  $pass = "";
try {
  $db = new PDO(
   "mysql:host=$host; dbname=$db_name",
        //mysql서버의 주소와 사용하려는 DB명을 지정
        $user,
        $pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
        //문자코드를 utf-8로 설정하여 접속
  );
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (Exception $e) {
  echo $e->getMessage();
}

$create_query= <<<CREATE_QUERY
    CREATE TABLE IF NOT EXISTS chatlog(
    log_id int(8) PRIMARY KEY,
    name varchar(30),
    body varchar(100),
    ctime int(30),
  );
CREATE_QUERY;
$db->exec($create_query);
echo <<<FORM
  <link tyoe='text/css' rel="stylesheet" href="chat.css">
  <h3>채팅예제</h3>
  <form action='$script_name' method='GET'>
    <div id='chatform'>
     이름 : <input type="text" name="name" size='8'/>
     내용 : <input type="text" name="name" size='40'/>
     <input type="hidden" name="id" value='$log_id'/>
     <input type="submit" value='쓰기'/>
    </div>
  </form>
FORM;

if(isset($_GET['name'])&& isset($_GET['body'])){
  if($_GET['name']=="" || $_GET['body']==""){
    echo "<p> 이름과 본문을 반드시 입력해주세요.";
    exit;
  }
  $insert_query="INSERT INTO chatlog(log_id, name, body, ctime)";
  $insert_query.="VALUES(?,?,?,?)";
  $stmt = $db->prepare($insert_query);
  $r=$stmt->execute(
  array($log_id, $_GET['name'], $_GET['body'],time())
);
if ($r ==false) {
  echo "insert 실패 : ".$db->errorInfo();
  exit;
}
  $log_id++;
  header("location:".$script_name."?id=$log_id");
  exit;
}
$offset = isset($_GET['offset'])?intval($_GET['offset']):0;
$limit = $page_max+1;
$select_query =<<<SQL
  SELECT * FROM chatlog
  ORDER BY log_id DESC
  LIMIT $limit OFFSET $offset;
SQL;

$stmt = $db->query($select_query);
$rows = $stmt->fetchAll();
$pager='';
if($offset>0){
  $prev=$offset-$page_max;
  $pager ="[<a href='$script_name?offset=$prev&id=$log_id'>←이전</a>]";
}
if(count($rows)>$page_max){
  array_pop($rows);
  $next=$offset+$page_max;
  $pager .="[<a href='$script_name?offset=$next&id=$log_id'>→다음</a>]";
}
foreach ($rows as $row) {
  $name = htmlspecialchars($row['name']);
  $body = htmlspecialchars($row['body']);
  $ctime = date("H:i:s",$row['ctime']);
  echo "<div class='log'>$ctime: $name &gt;&gt; $body</div>";
}
if($pager!=""){
  echo "<p>$pager</p>";
}
 ?>
