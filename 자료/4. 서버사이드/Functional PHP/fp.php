<?php
function show ($txt) {
    echo "$txt<br>";
}

function repeat ($arr, $fn) {
    foreach ($arr as $key => $val) {
        $fn($val, $key);
    }
}

function match($a, $b) {
    return $a === $b;
}

function every ($arr) {
    $isOk = true;
    foreach ($arr as $key => $val) {
        if (!$val) {
            $isOk = false;
        }
    }
    return $isOk;
}

function some ($arr) {
    $isOk = false;
    foreach ($arr as $key => $val) {
        if ($val) {
            $isOk = true;
        }
    }
    return $isOk;
}
?>