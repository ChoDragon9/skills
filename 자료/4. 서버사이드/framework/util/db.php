<?php
$db = null;
initDB();

function initDB () {
    $username = "root";
    $password = "";
    $dbname = "skills";
    $GLOBALS['db'] = new PDO("mysql:host=localhost;dbname={$dbname};charset=utf8", $username, $password);
}

function sql($sql){ //SQL문을 써주세요.
    return $GLOBALS['db']->query($sql);
}

function fetarr($sql){
    return sql($sql)->fetchAll();
}

function num($sql){
    return sql($sql)->rowCount();
}
?>