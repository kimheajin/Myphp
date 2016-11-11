<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body{font-size: 28px;}
    </style>
  </head>
  <body>
    <?php
    $q=$_GET["q"]; //클라이언트가 GET방식으로 요청하면 클라이언트의 요청정보를
                  //저장한 배열
                  //$_GET[];
                  //$_POST[];
    $q_html = htmlspecialchars($q);
    //http://php.net/manual/kr/function.htmlspecialchars.php
    //htmlspecialchars : 특수문자를 HTML엔터티로 변환. &는 &emp;가 되고 <는 &lt가 되듯이 html엔터티로 변환해준다.

    echo "<div>{$q_html}씨, 안녕하세요?</div>"

     ?>
  </body>
</html>
