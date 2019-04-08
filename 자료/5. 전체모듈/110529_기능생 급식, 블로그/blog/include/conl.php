<div id="conl_area">
<!--cate-->
	<div id="cate_t">&nbsp;</div>
	<div id="cate_m">
		<ul class="w100">
		<?
		if($sub_id == "add"){
			$no = fetch("select no from cate where main_id='$main_id' order by no desc limit 1");
			if($no[no]){$no=$no[no];}else{$no=1;}
			$title = change($_POST[title]);
			sql("insert into cate(no,main_id,sub_id,title) values('','$main_id','$no','$title')");
			move(PAGE);
		}else if($sub_id == "del"){
			$ca = fetch("select sub_id from cate where no='$type'");
			$del = sql("select no from content where sub_id='$ca[sub_id]'");
			while($del1=mysql_fetch_array($del)){
				sql("delete from content where no='$del1[no]'");
			}
			sql("delete from cate where no='$type'");
			move(PAGE);
		}else if($sub_id == "mo"){
			$title1 = change($_POST[title1]);
			sql("update cate set title='$title1' where no='$type'");
			move(PAGE);
		}
		$session = iconv("euc-kr","utf-8",$_SESSION[name]);
		$mem = fetch("select * from member where name='$session' && type='$main_id'");
		?>
			<li class="ft13 fw c6">카테고리&nbsp;<?if($mem || $_SESSION[lv] == "10"){?><a href="javascript:open('input')" style="font:normal 12px dotum">추가</a><?}?></li>
			<form action="<?=PAGE?>/add" method="post" onsubmit="return cate()"><li style="display:none;" id="input"><input type="text" style="width:100px;" name="title" id="title" /><input type="submit" value="추가" /></li></form>
		</ul>
		<ul class="w100 ft12">
			<li class="w100"><a href="<?=PAGE?>"><img src="<?=$img?>/cate.jpg" style="width:10px;height:11px;" alt="-" />&nbsp;전체보기</a><span class="cc">(<?=num("select no from content where main_id='$main_id'");?>)</span></li>
			<?
			$res= sql("select sub_id,title,no from cate where main_id='$main_id' order by no desc");
			while($row=mysql_fetch_array($res)){
			?><li class="w100"><a href="<?=PAGE.'/'.$row[sub_id];?>"><img src="<?=$img;?>/cate.jpg" style="width:10px;height:11px;" alt="-" />&nbsp;<?=$row[title]?></a><span class="cc">(<?=num("select no from content where main_id='$main_id' && sub_id='$row[sub_id]'");?>)</span>
			<?
				if($mem || $_SESSION[lv] == "10"){
			?>
				&nbsp;<a onclick="if(confirm('삭제하시겠습니까?')){location.href='<?=PAGE?>/del/<?=$row[no]?>';}" class="cs" style="font:normal 11px dotum;color:#ccc;">삭제</a>&nbsp;<a href="javascript:open('<?=$row[no]?>')" style="font:normal 11px dotum;color:#ccc;">수정</a>
			<?
				}
				?>
				</li>
				<form action="<?=PAGE?>/mo/<?=$row[no]?>" method="post" onsubmit="return cate1()">
				<li class="w100" style="display:none;" id="<?=$row[no]?>"><input type="text" style="width:100px;" name="title1" id="title1" value="<?=$row[title]?>" /><input type="submit" value="수정" /></li>
				</form>
				<?
			}
			?>
		</ul>
	</div>
	<div id="cate_b">&nbsp;</div>
<!--calen-->
	<div id="calen_t">&nbsp;</div>
	<div id="calen_m">
		<ul class="w100 cel3">
			<li class="ft13 fw c6">캘린더</li>
		</ul>
		<?include("../include/calen.php");?>
	</div>
	<div id="calen_b">&nbsp;</div>
<!--new-->
	<div id="new_t">&nbsp;</div>
	<div id="new_m">
		<ul class="w100">
			<li class="ft13 fw c6">최근 글</li>
		</ul>
		<ul class="w100">
		<?
			if(!$row3=fetch("select no from content where main_id='$main_id'")){
				echo '<li class="ft12 cc">등록된 게시물이 없습니다.</li>';
			}
			$res2=sql("select subject,sub_id,no from content where main_id='$main_id' order by no desc limit 5");
			while($row2=mysql_fetch_array($res2)){
				echo '<li class="w100 ft12"><a href="'.$index.'/'.$main_id.'/'.$row2[sub_id].'/view.php/'.$row2[no].'">-&nbsp;'.text($row2[subject],10).'</a></li>';
			}
		?>
		</ul>
	</div>
	<div id="new_b">&nbsp;</div>
	<div id="search">
	<form action="" method="post">
		<ul>
			<li><input type="text" name="schText" value="" style="width:120px;border:solid 1px #ccc" /></li>
			<li><input type="submit" value="검색" style="width:32px;height:20px;font-size:12px;" /></li>
		</ul>
	</form>
	</div>
</div>