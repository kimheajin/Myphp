    <div id="logo">
      <a href="index.php">
        <img src="./img/logo.gif" border="0">
      </a>
    </div>
	<div id="moto">
    <img src="./img/moto.gif">
  </div>
  <?php
if(!isset($_SESSION['userid'])){

?>
  <a href="./login_form.php">로그인</a> |
  <a href="./member_form.php">회원가입</a>
<?php
}
else
{
?>
		<?php=$_SESSION['usernick'] ?> (level:<?php=$_SESSION['userlevel']?>)|
		<a href="./logout.php">로그아웃</a> |
    <a href="./member_form_modify.dphp">정보수정</a>
  <?php
  }
   ?>
