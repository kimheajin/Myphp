<?php
setcookie('php','Cool~');
echo $_COOKIE['php'];
//cookie사용 시 주의점. 첫번째 엑세스시점에서는 echo를 할 수 없다.
// cookie가 넘어가고 있는 시점이기 때문이다.
 ?>
