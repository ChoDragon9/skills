<?php
if (isset($_GET['url'])) {
    include('./views/' . get_route($_GET['url']) . '.php');
} else {
    include('./views/home.php');
}
?>