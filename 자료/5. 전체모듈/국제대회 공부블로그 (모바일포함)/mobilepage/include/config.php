<?php
/* Header Start
---------------------------------------------------------*/
header("Cache-Control:no-cache");
header("Pragma:no-cache");
/* Header End
---------------------------------------------------------*/

/* Session Start
---------------------------------------------------------*/
session_start();
session_cache_expire(3000); 
/* Session End
---------------------------------------------------------*/

/* Mysql Connect Start
---------------------------------------------------------*/
define("DB_HOST","localhost");
define("DB_ID","dydrn33");
define("DB_PWD","skstlsdlek11");
define("DB_NAME","dydrn33");


@mysql_connect(DB_HOST,DB_ID,DB_PWD);
@mysql_select_db(DB_NAME);
@mysql_query("set names utf8");

/* Mysql Connect End
---------------------------------------------------------*/
?>