<?php
show_header();
show_form();
show_footer();

function show_header(){
  $color="#ffffff";
  if (isset($_GET['color'])) {
    $color= htmlspecialchars($_GET['color']);
  }
// $color = isset($_GET['color'])?htmlspecialchars($_GET['color']):$color;
//삼항연산자로 정의하는 방법
echo "<html><body bgcolor='$color'>";
}
function show_footer(){
//copyrighter 적어줘야 한다.
  echo "</body></html>";
}
function show_form(){
  $색깔배열 = array("붉은색"=>"#ff0000","녹색"=>"#00ff00",
                   "파랑색"=>"#0000ff","흰색"=>"#ffffff");
  echo "<form>";
  foreach($색깔배열 as $색깔명=>$색깔값){
    echo make_radio_btn($색깔명, $색깔값);
  }
  echo "<input type='submit' value='색변경' />";
  echo "</form>";
}
function make_Radio_btn($cname, $cvalue){
  return <<<RADIO
<input type='radio' id='$cname' name='color' value='$cvalue'/>
<label form='$cname'>$cname</label>
RADIO;
}
 ?>
