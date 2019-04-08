<?php
$current_dir = $_SERVER['PHP_SELF'];
$host = $_SERVER['HTTP_HOST'];
$home = str_replace("index.php","","http://{$host}{$current_dir}");

define('HOME', $home);
define('PAGE', HOME.'page');
?>