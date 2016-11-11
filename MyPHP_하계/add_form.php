<?php
$sql = "select * from user where userid='$sesiion_userid'";
$res = mysql_query($sql);
if ($res) $re_user = mysql_fetch_array($res);

 ?>
