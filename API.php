 <?php
 //―＞：객체멤버참조 연산자
//왼쪽은 컨테이너고 오른쪽은 왼쪽 컨테이너
//속에 들어 있는 물건 정도가 되겠습니다
 require_once('/DBManager.php');
 $num=1;
 $name="원선우";
 $company="미래전자";
 $tel="031-276-1829";
 $hp="010-8723-2837";
 $address="경기도 용인시 신갈동 388-23번지";
 try {
   $db = connect();
   $stt=$db->prepare("INSERT INTO biz_card VALUES(:num, :name, :company, :tel, :hp, :address)");
   //값부분에 매개변수와 함께 실행 대기
   $result = $stt->execute(
   array(':num'=>$num,
    ':name'=>$name,
    ':company'=>$company,
    ':tel'=>$tel,
    ':hp'=>$hp,
    ':address'=>$address
    )
 );//준비된 prepare문에 들어있는 sql을 실행.
   while ($row= $stt->fetch(PDO::FETCH_ASSOC)) {
     /*PDO::FETCH_ASSOC은 mysqli_fetch_array() 랑 같은 뜻입니다. fetch를
      사용하였을 때는 $row = $select_pstmt->fetch(PDO::FETCH_ASSOC);
    이것을 여러번 실행하면 각 줄의 배열을 반환합니다.*/
    /*array mysql_fetch_array ( resource $result [, int $result_type ] )
    인출된 행을 배열로 반환하고, 앞으로 내부 데이터 포인터를 이동한다.*/
      echo $row['$num'];
      echo $row['$name'];
      echo $row['$company'];
      echo $row['$tel'];
      echo $row['$hp'];
      echo $row['$address'];
    }
     if($result){
       print '데이터 입력 성공';
     }else{
       print '데이터 입력 실패';
     }
  } catch (Exception $e) {
    exit("DB접속 불가 : {$e->getMessage()}");
  }
   $db=NULL;
  ?>
