<?
sql("delete from basket where no='$no'");
alert("삭제되었습니다.");
move(PAGE."/my");
?>