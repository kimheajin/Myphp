<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<link href="./css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="./css/member.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="wrap">
  <div id="header">
    <?php include "./top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<?php include "./top_menu2.php"; ?>
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
    <form action="login.php" name="member_form" method="post">
    <div id="title">
      <img src="./img/title_login.gif" alt="">
    </div>
    <div id="login_form">
      <img src="./img/login_msg.gif" alt="" id="login_msg">
    </div>
    <div id="login1">
      <img src="./img/login_key.gif" alt="">
    </div>
    <div id="login2"></div>
    <div id="id_input_button">
      <div id="id_pw_title">
        <ul>
        <li><img src="./img/id_title.gif"></li>
        <li><img src="./img/pw_title.gif"></li>
        </ul>
      </div>
      <div id="id_pw_input">
        <ul>
        <li><input type="text" name="id" class="login_input"></li>
        <li><input type="password" name="pass" class="login_input"></li>
        </ul>
      </div>
      <div id="login_button">
        <input type="image" src="./img/login_button.gif">
      </div>
    </div><!-- 끝 id_input_button -->
				<div class="clear"></div>
				<div id="login_line"></div>
				<div id="join_button">
          <img src="./img/no_join.gif">&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="./member/member_form.php">
            <img src="./img/join_button.gif">
          </a>
        </div>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
