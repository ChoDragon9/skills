<?php
$wfile = urldecode($_GET['wfile']);
$wfile_name = urldecode($_GET['wfile_name']);

header('Content-Type:application/octet-stream');
header('Content-Length:'.filesize($wfile));
header('Content-Disposition:attachment; filename='.$wfile_name);
header('Content-Transfer-Encoding:Binary');

$fp = fopen($wfile,"r");
fpassthru($fp);
fclose($fp);
?>