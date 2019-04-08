<?php
function get_session($key) {
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } else {
        return false;
    }
}

function get_post($key) {
    if (isset($_POST[$key])) {
        return $_POST[$key];
    } else {
        return false;
    }
}

$name = get_post('name');
if ($name) {
    echo 'true';
} else {
    echo 'false';
}

function getData ($type, $key) {
    $type = '_' . strtoupper($type);
    if (isset($$type[$key])) {
        return $$type[$key];
    } else {
        return null;
    }
}

function txt($txt) {
    echo $txt;
}
?>