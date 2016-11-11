<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
// 1) 사용자명과 패스워드조사
// 2) 로그인 상태를 세션에 기록
// 3) 로그인 상태인지 조사하여 웹콘텐츠를 표시
// 4) 로그아웃 처리
// echo sha1("test")."<br/>";
// echo sha1("wd2j")."<br/>";
// echo sha1("qwert")."<br/>";
// a94a8fe5ccb19ba61c4c0873d391e987982fbbd3
// 50f4cb857bde1d3bc7b5e93c19f3a3eb126f6e80
// 19b58543c85b97c5498edfd89c11c3aa8cb5fe51
$users = array(
  "yjc"=> "a94a8fe5ccb19ba61c4c0873d391e987982fbbd3",
  "xmas"=> "50f4cb857bde1d3bc7b5e93c19f3a3eb126f6e80",
  "zinja"=> "19b58543c85b97c5498edfd89c11c3aa8cb5fe51"
);
$script = $_SERVER["SCRIPT_NAME"];

session_start();
if(isset($_SESSION['login'])){
  show_after_login_contents();
  exit;
}
if(isset($_POST['user'])){
  check_login();
}else{
  show_login_form();
}
function show_login_form(){
  global $script; //form태그로 액션을 하여 넘긴다.
  echo <<<LOGINFORM
<div id='loginform'>
  <form action="$script" method="POST">
  <h3>로그인 해 주세요.</h3>
  <label>사용자명</label><input type="text" name="user"/>
  <label>패스워드</label><input type="password" name="pass"/>
  <button type="submit">로그인</button>
  </form>
</div>
LOGINFORM;
}
function check_login(){
  global $script, $users;
  if(empty($_POST["pass"])){
    echo "비밀번호를 입력하지 않으셨습니다.";
    exit;
  }
  if(empty($_POST["user"])){
    echo "사용자명을 입력하지 않으셨습니다.";
    exit;
  }
  $realpass = $users[$_POST['user']]; //위의 users의 값들이 realpass에 들어가게 된다.
  if(sha1($_POST['pass'])!=$realpass){
    echo "패스워드 틀림.";
    exit;
  }
  $_SESSION['login']=array("user"=>$_POST['user']);
  //세션정보 기록
  echo "<a href='$script'>로그인 성공!</a>";
}
function show_after_login_contents(){
  $user = $_SESSION['login']['user'];

  echo "<h1>안녕하십니까 {$user}님!</h1>";
  echo "<p>이 내용은 비밀글입니다.</p>";

  echo "<input type='submit' name='logout'/>";
  unset($_SESSION['login']);
}
?>
