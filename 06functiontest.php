<?php
$output = 0;
  function setValue($input){
    return ($output=$input);
  }
  echo setValue(100);
  $gValue=0;//전역변수
  function setGValue_n(){
    $gValue=30; //지역변수
    return $gValue;
  }
  setGValue();
  echo "<br/>".$gValue;

  function setGValue_n()
  {
    global $gValue;
    $gValue=30;
  }
  setGValue_n();
  echo "<br/>".$gValues

 ?>
