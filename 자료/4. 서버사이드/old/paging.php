<?
//mysql����
/*$mysql=mysql_connect("localhost","root","apmsetup");
mysql_select_db("board");*/
include("./lib.php");

$page = 5;
$page_num = $_GET[page_num];
if(!$_GET[page_num]){$page_num=1;}
$total_sql="select * from board";
$total_res=mysql_query($total_sql);
$total=mysql_num_rows($total_res);

$start=$page * ($page_num-1);

$page_arr = ceil($total/$page);

$sql="select * from board order by no desc limit $start,$page";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)){
	echo $row[name];
}
echo"<br />";
for($i=1;$i<=$page_arr;$i++)
{
	if($page_num == $i){
		echo"<b>[".$i."]</b>";
	}else{
		echo"<a href='?page_num=".$i."'>[".$i."]</a>";
	}
}
?>