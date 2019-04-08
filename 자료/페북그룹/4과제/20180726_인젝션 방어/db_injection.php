<?php
$db = new PDO(..생략..);
$sql = "INSERT INTO member set id = ?, pw = ?";
$res = $db->prepare($sql);
$res->execute([$id,$pw]);

or

$sql = "INSERT INTO member set id = :id, pw = :pw";
$res = $db->prepare($sql);
$res->execute([":id"=>$id,":pw"=>$pw]);
?>