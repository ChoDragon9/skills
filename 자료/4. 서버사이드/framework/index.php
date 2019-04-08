<?php
session_start();
include('./util/db.php');
include('./util/common.php');

if(isset($_GET['url'])) {
    include('./' . $_GET['url'] . '.php');
} else {
    include('./page/home.php');
}
?>