<?php
  $sql = "SELECT * FROM board WHERE idx = '{$idx}'";
  $row = fetch($sql);
?>
<!-- delete를 위한 form을 생성한다. -->
<form action="" method="post">
  <!-- 전송 시 $_POST['action']에 delete 할당. -->
  <input type="hidden" name="action" value="delete">
</form>
<ul>
  <li><?php echo $row->idx ?></li>
  <li><?php echo $row->writer ?></li>
  <li><?php echo $row->subject ?></li>
  <li><?php echo $row->reg_date ?></li>
  <li><?php echo $row->content ?></li>
</ul>
<p>
  <a href="./?page=update&amp;idx=<?php echo $row->idx?>">수정</a>
  <!-- javascript를 이용하여 '삭제'링크를 클릭 시, form을 전송하도록 한다. -->
  <a href="#" onclick="document.forms[0].submit(); return false;">삭제</a>
  <a href="./">목록</a>
</p>