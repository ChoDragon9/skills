<div id="conr_area">
<?
if($_POST[schText]){
	/*seach_start
	-------------------------------------*/
	?>
	<div id="s_t"></div>
	<div id="s_m">
	<form action="" method="post">
		<ul class="s_1">
			<li><input type="text" name="schText" value="<?=$_POST[schText]?>" style="width:500px;height:17px;border:solid 1px #ccc" /></li>
			<li><input type="submit"  value="검색" style="width:50px; height:22px;" /></li>
		</ul>
	</form>
		<?include("../include/search.php");?>
	</div>
	<div id="s_b"></div>
<?
	/*seach_end
	-------------------------------------*/
}else{
?>
	<div id="open_t">&nbsp;</div>
	<div id="open_m">
		<ul class="open w100">
			<li class="ft12 fw w50"><a href="javascript:open('n')">목록열기/닫기</a></li>
			<?
			$session = iconv("euc-kr","utf-8",$_SESSION[name]);
			$mem = fetch("select * from member where name='$session' && type='$main_id'");
			if($mem || $_SESSION[lv] == "10"){
			?>
			<li class="w50 tr ft11 fw"><a href="javascript:open('write')" style="text-decoration:underline">글쓰기</a></li><?}?>
		</ul>
		<?
		if($_GET[page_num]){$dis = "display:inline";}else{$dis="display:none;";}
		?>
		<form action="<?=$index?>/<?=$main_id?>/<?=$sub_id?>//" method="get" id="page">
		<ul class="open1 ft12 w100" id="n" style="<?=$dis?>">
			<li><input type="hidden" value="1" name="page_num" id="page_num" /></li>
			<?
			$session = iconv("euc-kr","utf-8",$_SESSION[name]);
			if($sub_id){
				$where = "where main_id='$main_id' && sub_id='$sub_id' order by no desc";
			}else{
				$where = "where main_id='$main_id' order by no desc";
			}
			if(!$row2=fetch("select no from content $where")){echo '<li class="w100 cc">등록된게시물이 없습니다.</li>';}
			$page = 5;
			$page_num = $_GET[page_num];
			if(!$page_num)$page_num=1;
			$total = num("select no from content $where");
			$start = $page * ($page_num-1);
			$page_arr = ceil($total/$page);
			$res=sql("select sub_id,wdate,no,subject from content $where limit $start,$page");
			while($row=mysql_fetch_array($res)){
				echo '<li class="w80"><a href="'.$index.'/'.$main_id.'/'.$row[sub_id].'/view.php/'.$row[no].'">&nbsp;-&nbsp;'.text($row[subject],80).'</a></li><li class="w20 tr ft11 c9">'.$row[wdate].'</li>';
			}
			?>
			<li class="w100 ft11 tc"><?=page($page_num,$page_arr,"javascript:page");?></li>
		</ul>
		</form>
	</div>
	<div id="open_b">&nbsp;</div>
	<div id="write" style="display:none;">
		<form action="<?=$url?>/include/write_ok.php" method="post">
		<ul class="w100">
			<li class="w20">
				<input type="hidden" value="<?=$main_id?>" name="mainid" />
				<input type="hidden" value="<?=$session?>" name="name1" />
				<select name="sub_id" class="ft12" style="width:120px;height:20px;border:solid 1px #ccc;" id="sub_id">
				<?
					$res3=sql("select sub_id,title from cate where main_id='$main_id' order by no asc");
					while($row3=mysql_fetch_array($res3)){
						echo '<option value="'.$row3[sub_id].'">'.$row3[title].'</option>';
					}
				?>
				</select>
			</li>
			<li class="w80"><input type="text" value="" name="subject" id="subject" class="" maxlength="100" style="width:600px;height:16px;border:solid 1px #ccc;" /></li>
		</ul>
		<ul class="w100">
			<li class="w100"><textarea name="content" id="content" cols="92" rows="20"></textarea></li>
		</ul>
		<ul class="w100">
			<li class="w100 ft12 c6">태그&nbsp;<input type="text" name="tags" id="tags" value="" style="width:300px;" /><span class="cc ft11">&nbsp;쉼표(,)로 구분을 해주세요</span></li>
		</ul>
		<ul class="w100">
			<li class="w100 tc"><input type="submit" value="글쓰기" style="width:60px;height:30px;" /></li>
		</ul>
		</form>
	</div>
	<div id="con_t">&nbsp;</div>
	<div id="con_m">
	<?
		if($type){
			include("../include/".$type);
		}else{
			include("../include/content.php");
		}
	?>
	</div>
	<div id="con_b">&nbsp;</div>
<?
}
?>
</div>