<?php
  $sql = "SELECT * FROM board WHERE idx = '{$_GET['idx']}'";
  $row = $db->query($sql)->fetch(PDO::FETCH_OBJ);
?>
<ul>
  <li><?php echo $row->idx ?></li>
  <li><?php echo $row->writer ?></li>
  <li><?php echo $row->subject ?></li>
  <li><?php echo $row->reg_date ?></li>
  <li><?php echo $row->content ?></li>
</ul>
<p>
  <a href="./?page=update&amp;idx=<?php echo $row->idx?>">수정</a>
  <a href="./delete.php?idx=<?php echo $row->idx?>">삭제</a>
  <a href="./">목록</a>
</p>