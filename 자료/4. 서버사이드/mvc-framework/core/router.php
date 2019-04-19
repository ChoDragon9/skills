<?php
$route_table = [];

function set_route ($url, $view) {
    $GLOBALS['route_table'][$url] = $view;
}
function get_route ($url) {
    return $GLOBALS['route_table'][$url];
}
?>