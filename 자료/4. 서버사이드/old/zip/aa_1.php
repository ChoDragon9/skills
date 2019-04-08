<?
@include("./lib.php");
@include("./zip.lib.php");

$file1="자기소개".$_GET[m_idx].".txt";
$file2="user".$_GET[m_idx].".csv";
$file3_sql="select c_file from joining where idx='$_GET[idx]'";
$file3_res=mysql_query($file3_sql);
if($file3_row=mysql_fetch_array($file3_res)){
	$file3=$file3_row[c_file];
}

//첨부파일 압축(phpMyAdmin/libraries/zip.lib.php을 활용한 방법임)
$zip = new zipfile();  

if($file1){
	$filename = "../down/".$file1;
	$fsize = @filesize($filename);
	$fh = fopen($filename, 'rb', false);
	$data = fread($fh, $fsize);              
	$zip->addFile($data,$file1);
}
if($file2){
	$filename = "../down/".$file2;
	$fsize = @filesize($filename);
	$fh = fopen($filename, 'rb', false);
	$data = fread($fh, $fsize);              
	$zip->addFile($data,$file2);
}
if($file3){
	$filename = "../down/".$file3;
	$fsize = @filesize($filename);
	$fh = fopen($filename, 'rb', false);
	$data = fread($fh, $fsize);              
	$zip->addFile($data,$file3);
}
$zipfilename = date("YmdHis")."_".$_GET[idx]."_".$_GET[m_idx]. "_zip.zip"; 
$fd = fopen ("../down/" . $zipfilename, "wb");  //파일생성
fwrite ($fd, $zip->file()); 
fclose ($fd);

Header("Content-Type: application/octet-stream");
Header("Content-Disposition: attachment;; filename=$zipfilename");
Header("Content-Transfer-Encoding: binary");
Header("Content-Length: ".@filesize("../down/".$zipfilename) );
Header("Cache-Control: cache, must-revalidate");
Header("Pragma: no-cache");
Header("Expires: 0"); 
$fp = fopen("../down/".$zipfilename, "rb");
while(!feof($fp)){
	echo fread($fp, 1048576*2);     
	flush();
}
fclose ($fp);

/*
//echo
"<script>
location.href='./down/$zipfilename';
</script>";
*/

?>