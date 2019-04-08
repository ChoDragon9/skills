<?php
$json_data = file_get_contents('./data.json');
$json_data = json_decode($json_data)->data;

foreach($json_data as $data){
    echo "{$data->idx}/{$data->name}<br>";
}
?>