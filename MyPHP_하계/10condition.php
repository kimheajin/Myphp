<div style="font-size:32px;">
<?php
$na = rand(1,5);
//rand : http://php.net/manual/kr/function.rand.php
switch ($na) {
  case 1:
    $msg="사랑합니다";
    break;
  case 2:
    $msg="감사합니다";
    break;
  case 3:
    $msg="좋아합니다";
    break;
  case 4:
    $msg="행복합니다";
    break;

  default:
    $msg="잘 오셨습니다";
    break;
}
echo $msg;

$no = rand(1,3);

switch ($no) {
  case 1:
    $file="http://www3.hilton.com/resources/media/hi/FUKHIHI/en_US/img/shared/full_page_image_gallery/main/HL_exterior005_3_675x359_FitToBoxSmallDimension_Center.jpg";
    break;
  case 2:
    $file="http://1.bp.blogspot.com/-28RdGfSyxp4/VhyrBcFxudI/AAAAAAAAi6g/EuTe7gptXZs/s1600/Fukuoka%2BCherry%2BBlossoms.jpg";
    break;
  case 3:
    $file="http://www.travelko.com/element/hotel/universal/city_list/images/64099.jpg";
    break;
}
echo "<img src='$file' width='320' />";
 ?>
</div>
