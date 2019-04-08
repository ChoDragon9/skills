<?php
include("./fp.php");

show("<h3>Repeat</h3>");
$arr = [0, 1, 2];
repeat($arr, function ($value, $key) {
    show("key($key): value($value)<br>");
});

show("<h3>Match</h3>");
if (match('apple', 'apple')) {
    echo "Apple";
}

show("<h3>Every</h3>");
$arr = [true, '1', 1];
if (every($arr)) {
    show("Everything");
}

$arr = [false, '1', 1];
if (every($arr)) {
    show("Everything is okay");
} else {
    show("Something is wrong");
}

show("<h3>Some</h3>");
$arr = [false, false, '1'];
if (some($arr)) {
    show("Something");
}
?>