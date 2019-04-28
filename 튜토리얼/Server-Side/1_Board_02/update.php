<?php
  // 기존의 입력 정보 가져오기
  $sql = "SELECT * FROM board WHERE idx = '{$idx}'";
  $row = $db->query($sql)->fetch(PDO::FETCH_OBJ);
?>
<form action="./update_ok.php?idx=<?php echo $idx?>" method="post">
  <fieldset>
    <legend>글작성</legend>
    <ul>
      <li>
        <label>
          제목
          <input type="text" name="subject" value="<?php echo $row->subject?>">
        </label>
      </li>
      <li>
        <label>
          작성자
          <input type="text" name="writer" value="<?php echo $row->writer?>">
        </label>
      </li>
      <li>
        <label>
          내용
          <input type="text" name="content" value="<?php echo $row->content?>" size="80">
        </label>
      </li>
      <li>
        <button type="submit">완료</button>
        <button type="button" onclick="location.href = './?page=view&amp;idx=<?php echo $row->idx?>'">취소</button>
      </li>
    </ul>
  </fieldset>
</form>