<html>
<meta charset="utf-8">
<style>
  div{margin-left: 1200px;}
</style>
  <body>
      <center><h1>게시글 작성</h1>
        <div>
        <form action="gese.php">
          <input type="submit" value="이전">
        </form>
        </div>
      <p><hr>

        <form method="post" action="http://127.0.0.1/MyPHP/create.php">
        <table width="500" border="0" align="center">
          <tr><td>날짜 : </td>
          <td><input type="text" name="year_Day" size="10"></td></tr>
          <tr><td>제목 : </td>
          <td><input type="text" name="title" size="30"></td></tr>
          <tr><td>내용 : </td>
          <td><textarea name="naiyou" cols="50" rows="20"></textarea></td></tr>
        </table>
        <br/><br/>
        <input type="submit" value="저장">
        </form>
      </p><hr>
      </center>
    </body>
  </html>
      <?php
      // http://php.net/manual/function.serialize.php
      // http://php.net/manual/function.unserialize.php
      $savefile = dirname(__FILE__)."/bbslog.txt";
      $mode = isset($_GET['mode'])?$_GET['mode']: "show";
      switch ($mode) {
        case 'show':show();break;
        case 'write':write();break;
        case 'reset':reset_fun();break;
        default:show();break;
      }
      function reset_fun() {
        save_data(array());
        $self = $_SERVER["SCRIPT_NAME"];
        echo "<a href = '$self'> 게시판 초기화 완료! </a>";
      }
      function show() {
        show_form();
        $log = load_data();
        echo "<ul>";
        foreach ($log as $item) {
          $name = htmlspecialchars($item['namae']);
          $body = htmlspecialchars($item['body']);
          echo "<li><b style='color: red;'> $name </b>: $body</li>";
        }
      }
      function load_data() {
        global $savefile;
        $log = array();
        if (file_exists($savefile)) {
          $txt = file_get_contents($savefile);
          $log = unserialize($txt);
        }
        return $log;
      }
      function write() {
        if($_GET['namae']=="" || $_GET['body']=="") {
          echo "이름이나 본문이 비어있다. 다시 적으라!";
          exit;
        }
        $log = load_data();
        array_unshift($log, $_GET);
        save_data($log);
        $self = $_SERVER['SCRIPT_NAME'];
        echo "<a href ='$self'>저장</a>";
      }
      function save_data($savedata) {
        global $savefile;
        $txt = serialize($savedata);
        file_put_contents($savefile, $txt);
      }
function show_form() {
echo <<<FORM
        <form style='display: inline;'>
          ★이름: <input type='text' name='namae' size='8'><br/>
          ★댓글: <input type='text' name = 'body' size='30'>
          <input type='submit' value='쓰기'>
          <input type='hidden' name='mode' value='write'/>
        </form>
        <form style='display: inline;'>
          <input type='submit' value='초기화'>
          <input type='hidden' name='mode' value='reset'/>
        </form>
        <hr>
FORM;
}
?>
