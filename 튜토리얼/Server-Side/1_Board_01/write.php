<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>게시물 작성</title>
</head>
<body>
  <form action="./write_ok.php" method="post">
    <fieldset>
      <legend>글작성</legend>
      <ul>
        <li>
          <label>
            제목
            <input type="text" name="subject">
          </label>
        </li>
        <li>
          <label>
            작성자
            <input type="text" name="writer">
          </label>
        </li>
        <li>
          <label>
            내용
            <input type="text" name="content" size="80">
          </label>
        </li>
        <li>
          <button type="submit">완료</button>
          <button type="button" onclick="location.href = './list.php'">취소</button>
        </li>
      </ul>
    </fieldset>
  </form>
</body>
</html>