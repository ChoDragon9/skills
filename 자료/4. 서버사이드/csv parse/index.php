<?php
$csv_data = array_map('str_getcsv', file('./data.csv'));
foreach ($csv_data as $csv) {
    list($idx, $name) = $csv;
    echo "{$idx}/{$name}<br>";
}
?>