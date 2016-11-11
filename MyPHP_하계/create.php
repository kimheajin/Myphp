<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <center><h1>게시글 작성</h1>
<?php

// if(!(isset($_POST["title"]) && isset($_POST["name"]) && isset($_POST["pw"]))){
// 	echo "Invalid value input";
// 	exit();
// }
//
// if((empty($_POST["title"]) || empty($_POST["name"]) || empty($_POST["pw"]))){
// 	echo "Invalid value input";
// 	exit();
// }
$connect = mysql_connect("127.0.0.1","root","");
mysql_select_db("create", $connect);

$year_Day = $_POST["year_Day"];
$title = $_POST["title"];
$naiyou = $_POST["naiyou"];

mysql_query("INSERT INTO gesi(year_Day, title, naiyou) VALUES('$year_Day','$title','$naiyou')", $connect);
mysql_close($connect);

echo "<p>글이 저장되었습니다.</p>";
 ?>

<hr>
  <form action="gese.php">
    <input type="submit" value="돌아가기">
  </form>
</center>
  </body>
</html>
