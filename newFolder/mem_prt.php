<meta http-equiv="Content-Type" content="text/html; charset=kor" />
<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $pass = $_POST['passwd'];
  $passcon=$_POST['passwd_confirm'];
  $gender = $_POST['gender'];
  $p1=  $_POST['phone1'];
  $p2= $_POST['phone2'];
  $p3= $_POST['phone3'];
  $address = $_POST['address'];
  $movie = $_POST['movie'];
  $book = $_POST['book'];
  $shop = $_POST['shop'];
  $sport = $_POST['sport'];
  $intro=$_POST['intro'];
  $title=$_POST['title'];

   echo "아이디   : $id<br>";
   echo "이름     : $name<br>";
   echo "비밀번호 : $pass<br>";
   echo "비밀번호 확인 : $passcon<br>";
   echo "성별     : $gender<br>";
   echo "휴대번호 : $p1 - $p2 - $p3<br>";
   echo "주소     : $address<br>";
   echo "영화감상 : $movie<br>";
   echo "독서     : $book<br>";
   echo "쇼핑     : $shop<br>";
   echo "운동     : $sport<br>";
   echo "자기소개 : $intro<br>";
   echo "제목(hidden 타입에서 전달) : $title<br>";
?>
