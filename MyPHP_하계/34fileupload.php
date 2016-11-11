<?php
//$_FILES[] <클라이언트로부터 넘어온 파일들의 정보를 가지고 있음
//속성들
//<input name="upfile" type="file">
//1) $)FILES['upfile']['name']
//클라이언트(웹브라우저)로 부터 전해받은 파일명.
//클라우더 컴퓨터상의 파일명을 말함(업로드된 파일)
//2) $)FILES['upfile']['type']
//업로드된 파일의 MIME타입(신용불가능)
//3) $)FILES['upfile']['size']
//업로드된 파일의 크기(byte단위)
//4) $)FILES['upfile']['tmp_name']
//업로드된 파일이 보존되어있는 임시파일명(서버상의 )
//5) $)FILES['upfile']['error']
//업로드시에 발생된 에러정보 저장

//__FILE__ <경로를 가지고있음

if(isset($_FILES['upfile'])){
  save_file_func();
}else{
  show_form();
}
function show_form(){
  $script = $_SERVER['SCRIPT_NAME'];
  $max_size = 3*1024*1024; //3M bytes제한
  echo <<<UPLOADFORM
  <form action='$script' method="post" enctype="multipart/form-data">
  파일업로드: <br/>
  <input type='hidden' name='MAX_FILE_SIZE' value='$max_size'/>
  <!-- MAX_FILE_SIZE 생략하고자 한다면 php.ini에서 upload_max_filesize=5M으로도 설정가능
  최대 업로드 파일 크기 설정-->
  <input type='file' name='upfile'/> <br/>
  <input type='submit' value='업로드'/> <br/>
  </form>
UPLOADFORM;
}
function save_file_func(){
  $upload_filename=$_FILES['upfile']['name'];
  $tmp_file = $_FILES['upfile']['tmp_name'];

  $save_filename = dirname(__FILE__)."/".$upload_filename;
  //echo $save_filename;
  if(!is_uploaded_file($tmp_file)){
    echo "업로드를 실패하였습니다. 파일이 올바르지 않습니다.";
    exit;
  }
  // $type = $_FILES['upfile']['type'];
  //신뢰불가능
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $type = finfo_file($finfo, $tmp_file);

  echo $type;

  if($type == 'image/jpeg'){
    echo "업로드파일은 jpg입니다.";
  }else{
    echo "업로드파일이 jpg가 아닙니다.";
  }
  //임시로 저장된 파일을 실제로 내가 원하는 곳에 넣는다.
  //결과값은 bool형식으로 한다.
  if(!move_uploaded_file($tmp_file,$save_filename)){
    echo "本当に업로드를 실패하였습니다.";
    exit;
  }
  echo "<h1>업로드를 성공하였습니다.</h1>";
  $upload_fileurl = "http://127.0.0.1/MyPHP/".$upload_filename;
  echo "<a href='$upload_fileurl'>파일보기</a>";
}
 ?>
