<?
$n = change($_POST[name]);
$id = change($_POST[id]);
$pwd = change($_POST[pwd]);
$job = change($_POST[job]);
if(empty($n) || empty($id) || empty($pwd) || empty($job)){
	alert("정확히 입력을 해주세요");
	back();
}else{
	$row=fetch("select name,id from member where id='$id' || name='$n'");
	if($row){
		alert("이미 가입하신 아이디와 패스워드 입니다.");
		back();
	}else{
		mysql_query("insert into member(no,name,id,pwd,type,lv,stay) values('','$n','$id',password('$pwd'),'$job','1','1');");
		move($index);
	}
}
?>