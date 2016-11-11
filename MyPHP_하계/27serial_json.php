<?php
//----serialize예제
  $list = array("애플"=>300,"바나나"=>130,"오렌지"=>200);
  // file_put_contents("fruits.txt",$list);
  // $read_list = file_put_contents("fruits.txt");
  // echo $read_list["바나나"];
  //php에서 데이터 특히 객체를 파일에 저장할 때에는 시리얼라이즈(serialize)
  //를 해서 저장해야 하고, serialize하여 저장한 데이터는 읽어서 사용하려면
  //언시리얼라이즈 해야한다.
  $serial_list= serialize($list);
  file_put_contents("fruits.txt",$serial_list);
  $read_list = file_get_contents("fruits.txt");
  $unserial_list = unserialize($read_list);
  //$읽을려했던 데이터 = unserialize($읽어온데이터);
  //$원본 데이터 = unserialize($보존데이터);


//----json예제
  echo "시리얼예제:".$unserial_list["바나나"]."<br/>";
  $jsondata = json_encode($list);
  //json_encode:http://php.net/manual/kr/function.json-encode.php
  file_put_contents("fruits1.txt",$jsondata);
  $readdata = file_get_contents("fruits1.txt");
  $json_decode_data = json_decode($readdata);
  //json_decode:http://php.net/manual/kr/function.json-decode.php
  echo "JSON예제:".$json_decode_data->{"애플"}."<br>";

 ?>
