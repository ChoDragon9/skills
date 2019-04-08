<?php
include("./fp.php");

// DB Data
$rows = [
    ["idx"=>0, "name"=>"Apple"],
    ["idx"=>1, "name"=>"Orange"],
    ["idx"=>2, "name"=>"Melon"],
];
?>

<ul>
    <?php
    foreach ($rows as $row) {
    ?>
    <li>
        <?php echo $row['name']?>
        <input type="button" value="삭제" onclick="removeItem(<?php echo $row['idx'];?>)">
    </li>
    <?
    }
    ?>
</ul>


<ul>
    <?php
    repeat($rows, function ($row){
    ?>
        <li>
            <?php echo $row['name']?>
            <input type="button" value="삭제" onclick="removeItem(<?php echo $row['idx'];?>)">
        </li>
    <?
    });
    ?>
</ul>
