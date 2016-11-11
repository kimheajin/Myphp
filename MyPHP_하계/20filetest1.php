<?php
$pass = file_get_contents("./pw.txt");
$hanshed_pw = sha1($pass); //sha1은 보안 알고리즘을 만들어주는 이름.
echo "<br/>$pass";
echo "<br/>$hashed_pw";
$salt = "eetsgfgwfenkglwg;nlkfv";
$pass_salt = $pass.$salt;
$hashed_pw2 = hash("sha512",$pass_salt);
echo "<br/>$hashed_pw2";
 ?>
