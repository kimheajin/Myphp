<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>sql테스트</title>
    <style media="screen">
      body{background-color: #f0f0f0;}
    </style>
  </head>
  <body>
    <?php
    //PDO : PHP Data Object
    //PHP : 5.1버전 이후 표준
    //가볍고 고성능의 DB라이브러리
    //$DB객체명 = new PDO(접속문자열[,사용자명][,패스워드][,옵션]);
    //$결과 = $DB객체명(int) ->exec(SQL문장);
    //$결과() = $DB객체명(POSTtatement) ->query(SQL문장);
    $query = isset($_GET['query'])?$_GET['query']:"";
    $q_html = htmlspecialchars($query);
    echo <<<QUERYFORM
    <form>
      <div>
        SQL문장 기술;
      <textarea name="query" rows="7" cols="80">{$q_html}</textarea>
      </div>
      <div>
        <input type="submit" value="실행"/>
      </div>
    </form>
QUERYFORM;

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
  try {
    $html=$head ="";
    foreach ($db->query($query,PDO::FETCH_ASSOC) as $row){
      if ($head=""){
        $keys= arraykeys($row);
        //$row는 연관배열인 것으로 추정
        $head.="<tr>"; //$head=$head."<tr>";
        foreach ($keys as $c){
          $c_html = htmlspecialchars($c);
          $head.="<th>{$c_html}</th>";
          //<tr><th>user_id</th>
          //<th>name</th>
          //<th>email</th>
          //<th>memo</th>
        }
        $head.="</tr>";
        //<tr><th>user_id</th>
        //<th>name</th>
        //<th>email</th>
        //<th>memo</th></tr>
      }
      $html .="<tr>";
      foreach ($row as $c){
        $c_html = htmlspecialchars($c);
        $head.="<td>{$c_html}</td>";
      }
      $html .="</tr>";
    }
    echo "<p style='font-weight:bold; color:blue'>실행</p>";
    echo "<table border ='1' bgcolor='#fff' cellpadding='4'>";
    echo $head.$html;
    echo "</table>";
  } catch (Exception $e) {
    echo "<div style='color:red'>{$e->getMessage()}</div>";
  }


}
     ?>
  </body>
</html>
