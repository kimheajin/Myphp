<?php
$goods = array("치약","충전기","수건","우산",
                "여권","전원어댑터","ㅎ",
                "멀티탭","공유기","랜선","돈","식재");
if(isset($_GET['goods'])){
  show_item();
} else{
  show_form();
}
function show_item(){
    $goods = $_GET["goods"]; //지역변수 $goods
    $goods_html = htmlspecialchars($goods);
    echo "상품 <{$goods_html}>을/를 구매함.";
}

function show_form(){
  global $goods;//global로 쓰면 바깥에서도 변수를 사용할 수 있음
  $options="";
  foreach($goods as $value){ //goods라는 배열 안에 있는 자료들을 i로 뽑겠다.
    $options .= "<option value='$value'>$value</option>";
    //문자열을 더하는데 축약한것 '.='
  }
echo <<<EF
<form>
  <select name='goods'>
    <option>구매희망 상품상태</option>
    {$options}
  </select>
  <input type='submit' value="구매" />
</form>
EF;
}
 ?>
