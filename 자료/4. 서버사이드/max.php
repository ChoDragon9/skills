<?php
function echoArr($arr, $msg) {
    echo "---------{$msg}----------<br>";
    foreach ($arr as $product => $count) {
        echo $product . '/' . $count . '<br>';
    }
}
$arr = [
    "에어컨" => 3,
    "모니터" => 6,
    "냉장고" => 5,
    "마우스" => 10,
    "선풍기" => 1,
    "청소기" => 3
];
echoArr($arr, "배열 출력");

asort($arr);
echoArr($arr, "낮은 순서로 정렬");

arsort($arr);
echoArr($arr, "높은 순서로 정렬");

$arr_five = array_slice($arr, 0, 5);
echoArr($arr_five, "5개만 가져오기");

$total = array_sum($arr_five);
echo "---------총 갯수: {$total}----------<br>";
?>