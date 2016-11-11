var express = require('express'); //node에 있는 express를 가져온다. 제어, 사용하려면 require의 값을 변수에 담아준다.
var app = express(); //함수를 실행하면 app객체라는것을 return한다.
app.locals.pretty=true;
app.set('views','./views_file'); //views_file디렉토리에 템플릿파일을 넣겠다.
//앱에다가 설정을 할 때 set을 쓴다.
app.set('view engine','jade'); //어떠한 템플릿엔진을 쓸것인지 view engine을 하고 jade를 입력해 jade를 쓸 것이다.라고 입력해준다.
app.get('/topic/new',function(req,res) {
  res.render('new');
})
//app이 가지고 있는 메소드 중 listen을 통해 특정 포트를 listening할 수 있게 한다.
app.post('/topic', function(req, res) {
  res.send('Hi, post');
})
app.listen(3000, function() {
  console.log('Connected, 3000 port!'); //3000번 포트가 성공적으로 실행된다면 log의 내용이 실행된다.
});
//사용자가 post방식으로 서버로 데이터를 보내면 파일로 저장할 것이다.
//그러기위해선 폼이 필요한데 그것은 topic/new라는 디렉토리로 들어와 접속할것이다.
//라우팅 시작
