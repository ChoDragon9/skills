<?php
  $rows = fetchAll("SELECT * FROM board");
  foreach ($rows as $row) {
?>
  <li>
    <?php echo $row->idx ?> /
    <a href="/view/<?php echo $row->idx?>"><?php echo $row->subject ?></a> /
    <?php echo $row->writer?> /
    <?php echo $row->reg_date?>
  </li>
<?php
  }
?>
</ul>
<p>
  <a href="/write">글작성</a>
</p>