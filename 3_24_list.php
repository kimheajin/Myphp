<html>
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
  </head>
  <body>
    <h3>게시판 목록 보기</h3>
    <table border="1">
      <tr bgcolor='#cccc' align='center'>
        <td>번호</td><td>제목</td><td>글쓴이</td><td>날짜</td>
      </tr>
      <?php
      $day="2016_09_27";
      for($count=0; $count<10; $count++){
        echo "<tr align='center'><td>".($count+1)."</td><td width=300>게시판 제목</td><td width=100>글쓴이</td><td width=100>$day</td></tr>";
      }

       ?>
    </table>
  </body>
</html>
