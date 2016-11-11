<?php
    require_once 'DBManager.php';

    try {
      $db = connect();
//       if(!isset($_GET['mode'])){
//          $_GET['mode']='big_first';
// }
      if(isset($_GET['mode'])=="insert"){

          $name = $_POST['name'];
          $sub1 = $_POST['sub1'];
          $sub2 = $_POST['sub2'];
          $sub3 = $_POST['sub3'];
          $sub4 = $_POST['sub4'];
          $sub5 = $_POST['sub5'];
          $sum = $sub1+$sub2+$sub3+$sub4+$sub5;
          $avg = $sum/5;

          $stt = $db->prepare("INSERT INTO stud_score (name, sub1, sub2, sub3, sub4, sub5, sum, avg) VALUES(:name, :sub1, :sub2, :sub3, :sub4, :sub5, :sum, :avg)");

          $result = $stt->execute(
           array(
             ':name'=>$name,
             ':sub1'=>$sub1,
              ':sub2'=>$sub2,
              ':sub3'=>$sub3,
              ':sub4'=>$sub4,
              ':sub5'=>$sub5,
              ':sum'=>$sum,
              ':avg'=>$avg
           )
          );
          // while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
          //    echo $row['$name'];
          //    echo $row['$sub1'];
          //    echo $row['$sub2'];
          //    echo $row['$sub3'];
          //    echo $row['$sub4'];
          //    echo $row['$sub5'];
          // }
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h3>1) 성적 입력 하기</h3>


<form action="score_list.php?mode=insert" method='post'>
   <!-- <input type="hidden" name="mode" value="insert"/> -->
  <table width="720" border="1" cellpadding="5">
    <tr><td> 이름 : <input type="text" size="6" name="name">&nbsp;
             sub1 : <input type="text" size="3" name="sub1">&nbsp;
             sub2 : <input type="text" size="3" name="sub2">&nbsp;
             sub3 : <input type="text" size="3" name="sub3">&nbsp;
             sub4 : <input type="text" size="3" name="sub4">&nbsp;
             sub5 : <input type="text" size="3" name="sub5">
   </td>
       <td align="center">
       <input type="submit" value="입력하기">
       </td>
    </tr>
 </table>
 </form>

<p>
<h3>2) 성적 출력 하기</h3>
<p><a href ="score_list.php?mode=big_first">[성적순 정렬]</a>
    <a href ="score_list.php?mode=small_first">[성적역순 정렬]</a></p>
<p>
 <!-- 제목 표시 시작-->
 <table width="720" border="1" cellpadding="5">
 <tr align="center" bgcolor="#eeeeee">
 <td>번호</td>
 <td>이름</td>
 <td>과목1</td>
 <td>과목2</td>
 <td>과목3</td>
 <td>과목4</td>
 <td>과목5</td>
 <td>합계</td>
 <td>평균</td>
 <td>&nbsp;</td>
 </tr>
 <!-- 제목 표시 끝 -->

 <?php
 //문제가 되는 곳.---
// db->prepare 로 $stt에 select 명령 저장
    // if ($_GET['mode'] == "big_first")          // 성적순 정렬(내림차순)
    //    $stt = $db->prepare("select * from stud_score order by sum desc");
    // else if ( $_GET['mode'] == "small_first")   // 성적순 정렬(오름차순)
    //    $stt = $db->prepare("select * from stud_score order by sum");
    // else
    //    $stt = $db->prepare("select * from stud_score"); //조회

    if (isset($_GET['mode'])=="big_first")
      $stt = 'SELECT * FROM stud_score WHERE order by sum desc';
    else if (isset($_GET['mode'])=="small_first")   // 성적순 정렬(오름차순)
       $stt = 'SELECT * FROM stud_score order by sum ';
    else
       $stt = 'SELECT * FROM stud_score'; //조회

    $result = $db->prepare($stt, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

       //  $result->execute(array(':calories' => 150, ':colour' => 'red'));
       //  $red = $result->fetchAll();
    $result ->execute(
        // array(
        //   ':sum' => $sum,
        // )
      );
    $count = 1;
                         // 성적 출력 하기의 번호
// $stmt->execute();
// while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
// $data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
// print $data;
// }
// $stmt = null;}
 //데이터베이스 데이터 출력 시작
 while ($row = $result->fetch(PDO::FETCH_ASSOC)){

   $avg = round($row['avg'], 1);

         $num = $row['num'];
   echo "<tr align='center'>";
   echo "<td> $count     </td>";
   echo "<td> $row[name] </td>";
   echo "<td> $row[sub1] </td>";
   echo "<td> $row[sub2] </td>";
   echo "<td> $row[sub3] </td>";
   echo "<td> $row[sub4] </td>";
   echo "<td> $row[sub5] </td>";
   echo "<td> $row[sum]  </td>";
   echo "<td> $avg  </td>";
   echo "<td> <a href='score_delete.php?num=$num'>[삭제]</a></td>";
   echo "</tr>";

   $count++;
 }
    if($result){
      print '데이터 입력 성공';
    }else{
      print '데이터 입력 실패';
    }
    //데이터 베이스 선택
 } catch (PDOException $e) {
    exit("DB접속 불가 : {$e->getMessage()}");
  }

   $db=NULL;        // 데이터베이스와의 접속 종료
 ?>
 </table>
