<?php
if(!defined("IN_SITE") or empty($_SESSION['ulv'])){
	move("/");
	exit;
}
if(!empty($type)){
	include("./include/board/{$type}.php");
}else{
	$_SESSION['token'] = time();
?>
<form action="<?php echo PAGE."/write_ok";?>" method="post">
<div class="content">
	<ul>
		<li><?php echo label("카테고리","name");?></li>
		<li>
		<select name="name" id="name">
		<?php
		$sql = "select sub_id,title from menu where type='board' order by no asc";
		$res = sql($sql);
		$name = isset($_POST['name']) ? $_POST['name'] : " ";
		while($row = fetch($res)){
			if($name == $row['sub_id']){
				echo '<option value="'.$row['sub_id'].'" selected="selected">'.$row['title'].'</option>';
			}else{
				echo '<option value="'.$row['sub_id'].'">'.$row['title'].'</option>';
			}
		}
		?>
		</select>
		</li>
	</ul>
	<ul>
		<li><?php echo label("제 목","subject");?></li>
		<li>
		<select name="wtype" id="wtype">
		<?php
		$wtypearr = array("","Interactions","Widgets","Effects","Utilities");
		foreach($wtypearr as $val) echo '<option value="'.$val.'">'.$val.'</option>';
		echo '</select>'.nb(2);
			echo $input->input("text","subject","","70");
		?>
		</li>
	</ul>
	<ul class="con">
		<li><?php echo label("내 용","content");?></li>
		<li><?php echo $input->input("textarea","content");?></li>
	</ul>
	<ul>
		<li><?php echo label("태 그","tags");?></li>
		<li><?php echo $input->input("text","tags","","40").$input->input("hidden","token",$_SESSION['token']).$input->input("hidden","state","write");?></li>
	</ul>
	<ul class="bt">
		<li><?php echo $input->input("submit","글쓰기").nb().$input->input("reset","리셋");?></li>
	</ul>
</div>
</form>
<?php
}
?>