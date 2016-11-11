<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      div{margin-left: 300px; margin-top: 100px;}
    </style>
  </head>
  <body>
    <div>
      <table>
        <tr height="20">
          <td width="152" align="center"><a href="gese.php">HOME</a></td>
          <td width="152" align="center"><a href="32login-test.php">LOGIN</a></td>
          <td width="152" align="center"><a href="insert.php">CREATE</a></td>
          <td width="152" align="center"><a href="#">DELETE</a></td></tr>
      </table>
      <br/><br/><br/><br/>
      <?php
      $connect = mysql_connect("127.0.0.1","root","");
      mysql_select_db("create",$connect);

      $query = "SELECT * FROM gesi";
      $result = mysql_query($query, $connect);
       ?>
    <table border="1">
      <tr height="20" bgcolor="#cccccc">
        <td width="100" align="center">날짜</td>
        <td width="80" align="center">제목</td>
        <td width="400" align="center">내용</td>
        <td width="80" align="center">조회수</td></tr>
        <?php
        while($row = mysql_fetch_array($result)){
         ?>
          <tr height="20">
            <td width="100" align="center"><?= $row['year_Day']; ?></td>
            <td width="80" align="center"><?= $row['title']; ?></td>
            <td width="400" align="center"><?= $row['naiyou']; ?></td>
          </tr>
          <?php
        }
           ?>
    </table>
    <?php
    mysql_close($connect);
     ?>
  </div>
  <div>
    <form action="http://127.0.0.1/MyPHP/insert.php" >
      <input type="submit" name="insert" value="작성">
      </form>
  </div>
  </body>
</html>
