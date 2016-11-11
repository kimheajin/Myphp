<?php
echo ("
<html>
  <body>
  <h5>▶별찍기</h5>
  <table border='1' width='300'>
  <tr align='center'></tr>
  ");

  for($c=1; $c<=5; $c++)
  {
    echo "<tr align='center'>";
    for($d=1; $d<=5; $d++){
      if($d<=5&&$d<=$c)
        echo "<td bgcolor='#ff0000'>*</td>";
      else
        echo "<td bgcolor='#00ff00'> </td>";
    }
    echo "</tr>";
  }
  echo("
  </body>
</html>
")
 ?>
