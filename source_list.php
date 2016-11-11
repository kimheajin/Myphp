<?php

 ?>
 <h3>1) 성적 입력 하기</h3>

 <form action="source_list.php?mode=insert" method="post">
   <table width="720" border="1" cellpadding="5">
     <tr><td> 이름 : <input type="text" size="6" name="name">&nbsp;
       과목1 : <input type="text" size="3" name="sub1">&nbsp;
       과목2 : <input type="text" size="3" name="sub2">&nbsp;
       과목3 : <input type="text" size="3" name="sub3">&nbsp;
       과목4 : <input type="text" size="3" name="sub4">&nbsp;
       과목5 : <input type="text" size="3" name="sub5">
     </td>
       <td align="center">
         <input type="submit" value="입력하기">
       </td>
     </tr>
   </table>
 </form>

 <p>
   <h3>2) 성적 출력 하기</h3>
   <p><a href="source_list.php?mode=big_first">[성적순 정렬]</a>
      <a href="source_list.php?mode=small_first">[성적역순 정렬]</a></p>
 </p>
 <!-- 제목 표시 시작 -->
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
  if($mode=="big_first")
    $sql= "쿼리문";
    else if ($mode=="small_first") {
      $sql="쿼리문"
    }
    else{
      $sql="쿼리문"
    }
  $result=$sql
   ?>
 </table>
