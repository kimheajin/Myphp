<?php
$self = $_SERVER['SCRIPT_NAME'];
if(isset($_GET['size'])){
  $size = intval($_GET['size']);
  if($size<12 || $size >72){
    echo "사이즈가 오류났습니다.";
    exit;
  }
  //setcookie(변수명, 값
  //          [,유효기간][,경로]
  //          [,도메인][,보안][,http만사용여부]);
  //setcookie:http://php.net/manual/kr/function.setcookie.php
  $expire = time()+(24*60*60)*365; //유효기간 1년 지정

  setcookie("size",$size,$expire); //쿠키 지정
  //setcookie(변수명,"",time()-3600);
  //쿠키 삭제는 expire(유효기간)를 과거로 설정하면 된다.
  //쿠키의 특징 :  (브라우저별로 다름 대체로 아래와 같은 특지이 있음)
  //1. 대게 4096 bytes만 기록 가능
  //2. 저장가능 쿠키 정보 갯수 제한(20개)
  //3. 보안에 취약(위조 가능성 높음.)
  header("location:".$self); //F5와 같은 역활을 한다.(웹하면 RELOAD)
  exit;
}
$size = 26;
if(isset($_COOKIE['size'])){
  $size = intval($_COOKIE['size']);
}
echo <<<FORM
<html><body style='font-size:$size'>
  <div style='background-color:yello; text-align:right;'>
    문자크기 : [<a href='$self?size=70'>대</a>]
    [<a href='$self?size=40'>중</a>]
    [<a href='$self?size=13'>소</a>]
  </div>
FORM;
 ?>
<p><은하철도의 밤>의 주인공은 조반니다.</p>
<p>그는 알고 있는 문제도 제대로 답하지 못하는 내성적인 아이이다.</p>
<p>아버지는 원양어업에 나가서 돌아오지 않고 있고,</p>
<p>어머니는 병중이다.</p>
<p>우유역시 은하수의 이미지와 겹쳐진다. </p>
<p>그는 약자중의 약자로 아이들에게도 놀림감이 된다.</p>
<p>미야자와 겐지는 부잣집 도련님으로 태어나 가난한 자들의 희생으로</p>
<p>호의호식하는 것을 부끄럽게 여겼다.</p>
<p>그는 부유한 아버지를 떠나 농민들 곁에서 살았다.</p>
</body></html>
