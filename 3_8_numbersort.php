<?php
$a = 2;
$b = 6;
$c = 9;

if($a>$b) //$a가 $b보다 큰 경우
{
  if($a>$c){ //$a가 $c보다 큰 경우
    $max1=$a; //$a는 제일 큰 수를 담는 $max1에 저장된다.
    if($b>$c){ //남은 $b와 $c를 비교하는 식.
      $max2=$b; //b가 더 클경우 max2 = b
      $max3=$c; //max3 = c 를 해준다.
    }
    else{
      $max2=$c; //c가 b보다 클경우이다. 이런경우 max2에 c를 넣고
      $max3=$b; // max3에 b를 넣었다.
    }
  }
  else{ //위의 조건도 아닐 경우 마지막 경우의 수인 c>a>b를 해준다.
    $max1=$c;
    $max2=$a;
    $max3=$b;
  }
}
else{ //아예 a>b가 아닐경우
  if($a>$c){ //a>c일 때
    $max1=$b; //max1에 b
    $max2=$a; //max2에 a
    $max3=$c; //max3에 c를 넣어준다.
  }
  else{ //a>c가 아닐경우 a>b는 위에서 하였으니 b>c를 해준다.
    if($b>$c){
      $max1=$b; //max1에 b
      $max2=$c; //max2에 c
      $max3=$a; //max3에 a
    }
    else{
      $max1=$c; //위의 조건 그 무엇도 아닐경우 나머지 경우의 수인 c>b>a를 넣어준다.
      $max2=$b;
      $max3=$a;
    }
  }
}

//출력!
echo "입력된 세 정수 : $a $b $c<br>";
echo "입력된 정수를 큰 순서대로 정렬 : $max1 $max2 $max3<br>";
//하지만 비효율적. sort방법이 더 나음.
 ?>
