<?php
    session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호 확인을 입력하세요");
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value !=
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";

      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?php
    require_once "./DBManager.php";

    try {

      $db = connect();

      $sql = "select * from member where id=':userid'";

      $stt = $db -> prepare($sql, [PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL]);
     $stt->excute([':userid'=>$_SESSON['userid']]);

     $row = $stt->fetch(PDO::FETCH_ASSOC);

     $hp = explode("-",$row['hp']);

     $email = explode("@",$row['email']);

     $db = null;

    } catch (Exception $e) {

    }
    $db = null;
?>
<body>
<div id="wrap">
  <div id="header">
    <?php require_once "./top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<?php require_once "./top_menu2.php"; ?>
  </div>  <!-- end of menu -->

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?php
			require_once "./left_menu.php";
?>
		</div>
	</div> <!-- end of col1 -->

	<div id="col2">
        <form  name="member_form" method="post" action="modify.php">
		<div id="title">
			<img src="./title_member_modify.gif">
		</div>


		<div id="form_join">
			<div id="join1">
			<ul>
			<li>* 아이디</li>
			<li>* 비밀번호</li>
			<li>* 비밀번호 확인</li>
			<li>* 이름</li>
			<li>* 닉네임</li>
			<li>* 휴대폰</li>
			<li>&nbsp;&nbsp;&nbsp;이메일</li>
			</ul>
			</div>
			<div id="join2">
			<ul>
			<li><?php= $row[id] ?></li>
			<li><input type="password" name="pass" value="<?php= $row[pass] ?>"></li>
			<li><input type="password" name="pass_confirm" value="<?php= $row[pass] ?>"></li>
			<li><input type="text" name="name" value="<?php= $row[name] ?>"></li>
			<li><div id="nick1"><input type="text" name="nick" value="<?php= $row[nick] ?>"></div><div id="nick2" ><a href="#"><img src="../img/check_id.gif" onclick="check_nick()"></a></div></li>
			<li><input type="text" class="hp" name="hp1" value="<?php= $hp[0] ?>">
             - <input type="text" class="hp" name="hp2" value="<?php= $hp[1] ?>"> -
             <input type="text" class="hp" name="hp3" value="<?= $hp[2] ?>"></li>
			<li><input type="text" id="email1" name="email1" value="<?php= $email[0] ?>"> @
         <input type="text" name="email2"value="<?php= $email[1] ?>"></li>
			</ul>
			</div>
			<div class="clear"></div>
			<div id="must"> * 는 필수 입력 항목입니다.^^</div>
		</div>

		<div id="button"><a href="#"><img src="./img/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
		                 <a href="#"><img src="./img/button_reset.gif" onclick="reset_form()"></a>
		</div>
	    </form>
	</div>
  </div>
</div>

</body>
</html>
