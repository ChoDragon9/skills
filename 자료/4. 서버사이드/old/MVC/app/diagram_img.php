<?php
session_start();

$realpath = realpath(__FILE__);
$basename = basename(__FILE__);
$path = str_replace($basename,'',$realpath);
include($path.'model.php');
$model = new Model();
$model->diagram_img();
?>