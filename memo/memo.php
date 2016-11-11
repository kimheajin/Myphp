<?php
   session_start();

   $scale=5;         // 한 화면에 표시되는 글 수

   require_once('DBManager.php');

   try { //try문 PDO시작
     $db = connect();

     $sql = "select * from memo order by num desc";
     //그냥 내림차순을 해야하기 때문에 플레이스홀더를 해주지 않아도 된다.
     $stt = $db -> prepare($sql,
     [PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL]
   );
   //$result = mysql_query($sql, $connect);

   $total_record=$stt ->rowCount();
   //$total_record = mysql_num_rows($result); // 전체 글 수

   } catch (Exception $e) {
     exit("DB처리 에러: {$e->getMessage()}");
   }

   // 전체 페이지 수($total_page) 계산
   if ($total_record % $scale == 0)
      $total_page = floor($total_record/$scale);
   else
      $total_page = floor($total_record/$scale) + 1;

// 표시할 페이지($page)에 따라 $start 계산

    if(!isset($_GET['page'])){
      $page = 1;
    }else{
      $page = $_GET['page'];
    }

   if (!$page)                 // 페이지번호($page)가 0 일 때
      $page = 1;              // 페이지 번호를 1로 초기화


  //  $start = ($page - 1) * $scale;

   $number = $total_record - $start;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="kor">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/memo.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="wrap">
  <div id="header">
    <?php include ".top_login2.php"; ?>
  </div>  <!-- header끝 -->

  <div id="menu">
   <?php include "./top_menu2.php"; ?>
 </div>  <!-- menu끝 -->

  <div id="content">
   <div id="col1">
      <div id="left_menu">
<?php
         include "./left_menu.php";
?>
      </div>
   </div>
   <div id="col2">
      <div id="title">
         <img src="../img/title_memo.gif">
      </div>

      <div id="memo_row1">
          <form  name="memo_form" method="post" action="insert.php">
         <div id="memo_writer">
           <span >▷ <?php= $_SESSION['usernick'] ?></span>
         </div>
         <div id="memo1">
           <textarea rows="6" cols="95" name="content"></textarea>
         </div>
         <div id="memo2">
           <input type="image" src="../img/memo_button.gif">
         </div>
      </form>
    </div> <!-- memo_row1 끝-->
<?php

  try {
    $results = $stt -> fetchAll();
    for ($i=$start; $i<$start+$scale && $i < $total_record; $i++) //total_record의 끝까지 표시를 한다.
    {

      // mysql_data_seek($result, $i);
      // $row = mysql_fetch_array($result);  PDO로 구할날 수 없음.
      /*pdo를 실행할 시 stt안에 들어가는데 null처리를 하지 않으면 아래에서도 사용가능하다. 그러므로 data_seek보다
      * execute로 하는것이 좋다.*/

      //$row = data_seek($results, $i); //이렇게도 되고,

      $row = $results[$i];//이렇게도 된다.

      $memo_id      = $row['id'];
      $memo_num     = $row['num'];
       $memo_date    = $row['regist_day'];
      $memo_nick    = $row['nick'];

      $memo_content = str_replace("\n", "<br>", $row['content']);
      $memo_content = str_replace(" ", "&nbsp;", $memo_content);
  ?>

      <div id="memo_writer_title">
      <ul>
      <li id="writer_title1"><?php= $number ?></li>
      <li id="writer_title2"><?php= $memo_nick ?></li>
      <li id="writer_title3"><?php= $memo_date ?></li>
      <li id="writer_title4">
            <?php
               if($_SESSION['userid']=="admin" || $userid==$memo_id)
                   echo "<a href='delete.php?num=$memo_num'>[삭제]</a>";
           ?>
      </li>
      </ul>
      </div>
      <div id="memo_content"><?php= $memo_content ?>
      </div>
      <div id="ripple">
         <div id="ripple1">덧글</div>
         <div id="ripple2">
<?php

      $sql = "select * from memo_ripple where parent=:memo_num";

      $db -> prepare($sql, [PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL]);
      $stt ->execute([':memo_num'=>$memo_num]);


      // $sql = "select * from memo_ripple where parent=:memo_num";
      // $ripple_result = mysql_query($sql);

      //while ($row_ripple = mysql_fetch_array($ripple_result))
      while($row_ripple = $row ->fetch(PDO::FETCH_ASSOC))
      {
         $ripple_num     = $row_ripple['num'];
         $ripple_id      = $row_ripple['id'];
         $ripple_nick    = $row_ripple['nick'];
         $ripple_content = str_replace("\n", "<br>", $row_ripple['content']);
         $ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
         $ripple_date    = $row_ripple['regist_day'];
?>
            <div id="ripple_title">
            <ul>
            <li><?php= $ripple_nick ?> &nbsp;&nbsp;&nbsp; <?php= $ripple_date ?></li>
            <li id="mdi_del">
               <?php
                  if($userid=="admin" || $userid==$ripple_id)
                        echo "<a href='delete_ripple.php?num=$ripple_num'>삭제</a>";
               ?>
            </li>
            </ul>
            </div>
            <div id="ripple_content"> <?php= $ripple_content ?></div>
<?php
      }
?>
            <form  name="ripple_form" method="post" action="insert_ripple.php">
            <input type="hidden" name="num" value="<?php= $memo_num ?>">
            <div id="ripple_insert">
                <div id="ripple_textarea">
                  <textarea rows="3" cols="80" name="ripple_content"></textarea>
               </div>
               <div id="ripple_button"><input type="image" src="../img/memo_ripple_button.png"></div>
            </div>
            </form>

         </div> <!-- ripple2 -->
            <div class="clear"></div>
         <div class="linespace_10"></div>
<?php
      $number--; //for문 종료
    }
    $db = null;
  } catch (Exception $e) {
    //pdoexception설명
    //http://php.net/manual/kr/class.pdoexception.php
    exit("DB접속 불가 : {$e->getMessage()}");
  }
    //mysql_close();
?>
         <div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;
<?php
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
      if ($page == $i)     // 현재 페이지 번호 링크 안함
      {
         echo "<b> $i </b>";
      }
      else
      {
         echo "<a href='memo.php?page=$i'> $i </a>";
      }
   }
?>
         &nbsp;&nbsp;&nbsp;&nbsp;다음 ▶</div>
       </div> <!-- ripple -->
   </div> <!--col2 -->
  </div> <!--content -->
</div> <!--wrap -->

</body>
</html>
